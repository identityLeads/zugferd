<?php

namespace App\Notifications\Sale;

use App\Abstracts\Notification;
use App\Models\Setting\EmailTemplate;
use App\Models\Document\Document;
use App\Traits\Documents;
use Dompdf\Dompdf;
use Dompdf\Options;
use horstoeko\zugferd\ZugferdDocumentBuilder;
use horstoeko\zugferd\ZugferdDocumentPdfMerger;
use horstoeko\zugferd\ZugferdProfiles;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use setasign\Fpdi\Fpdi;
use Illuminate\Mail\Attachment;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

class Invoice extends Notification
{
    use Documents;

    /**
     * The invoice model.
     *
     * @var Document
     */
    public $invoice;

    /**
     * The email template.
     *
     * @var EmailTemplate
     */
    public $template;

    /**
     * Should attach pdf or not.
     *
     * @var bool
     */
    public $attach_pdf;

    /**
     * List of document attachments to attach when sending the email.
     *
     * @var array
     */
    public $attachments;

    /**
     * Create a notification instance.
     */
    public function __construct(Document $invoice = null, string $template_alias = null, bool $attach_pdf = false, array $custom_mail = [], $attachments = [])
    {
        parent::__construct();

        $this->invoice = $invoice;
        $this->template = EmailTemplate::alias($template_alias)->first();
        $this->attach_pdf = $attach_pdf;
        $this->custom_mail = $custom_mail;
        $this->attachments = $attachments;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     */
    public function toMail($notifiable): MailMessage
    {
        if (!empty($this->custom_mail['to'])) {
            $notifiable->email = $this->custom_mail['to'];
        }

        $message = $this->initMailMessage();

        $func = is_local_storage() ? 'fromPath' : 'fromStorage';

        // Attach the custom PDF file
        if ($this->attach_pdf) {
            $path = $this->generateCustomPdfWithZugferd($this->invoice);
            $file = Attachment::$func($path)->withMime('application/pdf');

            $message->attach($file);
        }

        // Attach selected attachments
        if (!empty($this->invoice->attachment)) {
            foreach ($this->invoice->attachment as $attachment) {
                if (!in_array($attachment->id, $this->attachments)) {
                    continue;
                }

                $path = is_local_storage() ? $attachment->getAbsolutePath() : $attachment->getDiskPath();
                $file = Attachment::$func($path)->withMime($attachment->mime_type);

                $message->attach($file);
            }
        }

        return $message;
    }

    private function generateCustomPdfWithZugferd(Document $invoice): string
    {
        $invoice->load('items');

        // HTML data
        $data = [
            $invoice->type => $invoice,
            'currency_style' => true,
        ];
        $view = view($invoice->template_path, $data)->render();

        // Paths
        $tempDir = storage_path('app/tmp');
        $dompdfPath = $tempDir . '/dompdf_generated.pdf';
        $xmlPath = $tempDir . '/generated_invoice.xml';
        $finalPdfPath = $tempDir . '/final_invoice.pdf';

        // Generate PDF
        $this->generatePdfWithDompdf($view, $dompdfPath);

        // Generate and shorten URL for QR code
        $portalLink = URL::signedRoute('signed.invoices.show', [
            'company_id' => $invoice->company_id,
            'invoice' => $invoice->id,
        ]);
        $shortenedLink = $this->shortenUrlWithYourls($portalLink);

        // Add QR code to PDF
        $this->addQrCodeToPdfWithFpdi($dompdfPath, $shortenedLink);

        // Generate ZUGFeRD XML
        $this->generateXmlWithZugferd($invoice, $xmlPath);

        // Merge PDF and XML
        (new ZugferdDocumentPdfMerger($xmlPath, $dompdfPath))->generateDocument()->saveDocument($finalPdfPath);

        return $finalPdfPath;
    }

    private function generatePdfWithDompdf($html, $pdfPath)
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        file_put_contents($pdfPath, $dompdf->output());
    }

    private function addQrCodeToPdfWithFpdi($pdfPath, $portalLink)
    {
        $qrImagePath = storage_path('app/tmp/qr_code.png');

        // Generate QR Code
        QrCode::format('png')->size(200)->errorCorrection('H')->generate($portalLink, $qrImagePath);

        if (!file_exists($qrImagePath) || mime_content_type($qrImagePath) !== 'image/png') {
            throw new \Exception('QR-Code-Bild konnte nicht korrekt generiert werden.');
        }

        $fpdi = new Fpdi();
        $pageCount = $fpdi->setSourceFile($pdfPath);
        $outputPath = storage_path('app/tmp/modified_pdf.pdf');

        for ($i = 1; $i <= $pageCount; $i++) {
            $templateId = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($templateId);
            $fpdi->addPage($size['orientation'], [$size['width'], $size['height']]);
            $fpdi->useTemplate($templateId);

            if ($i === $pageCount) {
                $fpdi->Image($qrImagePath, 10, $size['height'] - 30, 20, 20);
            }
        }

        $fpdi->Output($outputPath, 'F');

        copy($outputPath, $pdfPath);
    }

    private function shortenUrlWithYourls($url)
    {
        $shortCode = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);
        $yourlsApiEndpoint = 'https://short.mk-pages.com/yourls-api.php';
        $username = 'username';
        $password = 'password';

        $postData = [
            'action'   => 'shorturl',
            'url'      => $url,
            'keyword'  => $shortCode,
            'format'   => 'json',
            'username' => $username,
            'password' => $password,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $yourlsApiEndpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            $responseBody = json_decode($response, true);
            if (isset($responseBody['shorturl'])) {
                return $responseBody['shorturl'];
            } else {
                throw new \Exception('YOURLS konnte die Kurz-URL nicht generieren. Antwort: ' . $response);
            }
        }

        throw new \Exception('Fehler beim Aufruf der YOURLS-API. HTTP-Code: ' . $httpCode);
    }

    private function generateXmlWithZugferd(Document $document, $xmlPath)
    {
        $documentBuilder = ZugferdDocumentBuilder::CreateNew(ZugferdProfiles::PROFILE_BASIC);

        $documentBuilder->setDocumentInformation(
            $document->document_number,
            "380",
            $document->issued_at,
            $document->currency_code
        );

        $documentBuilder->addDocumentNote(
            "Rechnung gemäß Bestellung vom " . $document->created_at->format('d.m.Y')
        );

        $documentBuilder->setDocumentSeller(
            setting('company.name'),
            setting('company.tax_number')
        );
        $documentBuilder->addDocumentSellerTaxRegistration("FC", setting('company.tax_number'));
        $documentBuilder->setDocumentSellerAddress(
            setting('company.address'),
            "",
            "",
            setting('company.zip_code'),
            setting('company.city'),
            setting('company.country')
        );

        $documentBuilder->setDocumentBuyer(
            $document->contact_name,
            $document->contact_tax_number
        );
        $documentBuilder->setDocumentBuyerAddress(
            $document->contact_address,
            "",
            "",
            $document->contact_zip_code,
            $document->contact_city,
            $document->contact_country
        );

        foreach ($document->totals as $total) {
            if ($total['code'] === 'tax') {
                $documentBuilder->addDocumentTax("S", "VAT", $total['amount'], $document->amount_without_tax, 19.0);
            }
        }

        $documentBuilder->setDocumentSummation(
            $document->amount_without_tax,
            $document->amount,
            $document->amount_without_tax,
            0.0,
            0.0,
            $document->amount_without_tax,
            $document->amount - $document->amount_without_tax
        );

        foreach ($document->items as $item) {
            $documentBuilder->addNewPosition((string)$item['id'])
                ->setDocumentPositionProductDetails(
                    $item['name'],
                    $item['description'],
                    $item['sku'] ?? null,
                    null,
                    "0160",
                    $item['item_id']
                )
                ->setDocumentPositionNetPrice($item['price'])
                ->setDocumentPositionQuantity($item['quantity'], "H87")
                ->addDocumentPositionTax("S", "VAT", 19.0)
                ->setDocumentPositionLineSummation($item['total']);
        }

        $documentBuilder->writeFile($xmlPath);
    }

    public function toArray($notifiable): array
    {
        $this->initArrayMessage();

        return [
            'template_alias' => $this->template->alias,
            'title' => trans('notifications.menu.' . $this->template->alias . '.title'),
            'description' => trans('notifications.menu.' . $this->template->alias . '.description', $this->getTagsBinding()),
            'invoice_id' => $this->invoice->id,
            'invoice_number' => $this->invoice->document_number,
            'customer_name' => $this->invoice->contact_name,
            'amount' => $this->invoice->amount,
            'invoiced_date' => company_date($this->invoice->issued_at),
            'invoice_due_date' => company_date($this->invoice->due_at),
            'status' => $this->invoice->status,
        ];
    }

    public function getTags(): array
    {
        return [
            '{invoice_number}',
            '{invoice_total}',
            '{invoice_amount_due}',
            '{invoiced_date}',
            '{invoice_due_date}',
            '{invoice_guest_link}',
            '{invoice_admin_link}',
            '{invoice_portal_link}',
            '{customer_name}',
            '{company_name}',
            '{company_email}',
            '{company_tax_number}',
            '{company_phone}',
            '{company_address}',
        ];
    }

    public function getTagsReplacement(): array
    {
        $route_params = [
            'company_id'    => $this->invoice->company_id,
            'invoice'       => $this->invoice->id,
        ];

        return [
            $this->invoice->document_number,
            money($this->invoice->amount, $this->invoice->currency_code),
            money($this->invoice->amount_due, $this->invoice->currency_code),
            company_date($this->invoice->issued_at),
            company_date($this->invoice->due_at),
            URL::signedRoute('signed.invoices.show', $route_params),
            route('invoices.show', $route_params),
            route('portal.invoices.show', $route_params),
            $this->invoice->contact_name,
            $this->invoice->company->name,
            $this->invoice->company->email,
            $this->invoice->company->tax_number,
            $this->invoice->company->phone,
            nl2br(trim($this->invoice->company->address)),
        ];
    }
}
