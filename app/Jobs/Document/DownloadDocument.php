<?php

namespace App\Jobs\Document;
use App\Abstracts\Job;
use App\Events\Document\DocumentPrinting;
use App\Traits\Documents;
use Dompdf\Dompdf;
use Dompdf\Options;
use horstoeko\zugferd\ZugferdDocumentBuilder;
use horstoeko\zugferd\ZugferdDocumentPdfMerger;
use horstoeko\zugferd\ZugferdProfiles;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

class DownloadDocument extends Job
{
    use Documents;

    public $document;
    public $folder_path;
    public $zip_archive;
    public $close_zip;
    public $method;

    public function __construct($document, $folder_path = null, $zip_archive = null, $close_zip = false, $method = 'save')
    {
        $this->document = $document;
        $this->folder_path = $folder_path;
        $this->zip_archive = $zip_archive;
        $this->close_zip = $close_zip;
        $this->method = $method;
    }

    public function handle()
    {
        // Stelle sicher, dass die Items geladen werden
        $this->document->load('items');

        event(new DocumentPrinting($this->document));
        
        // Debugge das Dokument mit Items

        $data = [
            $this->document->type => $this->document,
            'currency_style' => true,
        ];

        $view = view($this->document->template_path, $data)->render();

        // Temporäre Dateien
        $tempDir = storage_path('app/tmp');
        $dompdfPath = $tempDir . '/dompdf_generated.pdf';
        $xmlPath = $tempDir . '/generated_invoice.xml';
        $finalPdfPath = $tempDir . '/final_invoice.pdf';

        // PDF mit Dompdf erstellen
        $this->generatePdfWithDompdf($view, $dompdfPath);

        // Portal-Link generieren und kürzen
        $portalLink = URL::signedRoute('signed.invoices.show', [
            'company_id' => $this->document->company_id,
            'invoice' => $this->document->id,
        ]);

        $shortenedLink = $this->shortenUrlWithYourls($portalLink);

        // QR-Code generieren und ins PDF einfügen
        $this->addQrCodeToPdfWithFpdi($dompdfPath, $shortenedLink);

        // XML-Datei mit horstoeko/zugferd erstellen
        $this->generateXmlWithZugferd($xmlPath);

        // PDF und XML zusammenführen
        (new ZugferdDocumentPdfMerger($xmlPath, $dompdfPath))->generateDocument()->saveDocument($finalPdfPath);

        switch ($this->method) {
            case 'download':
                // PDF herunterladen
                return response()->download($finalPdfPath, $this->getDocumentFileName($this->document));

            default:
                if (empty($this->zip_archive)) {
                    return;
                }

                $this->zip_archive->addFile($finalPdfPath, $this->getDocumentFileName($this->document));

                if ($this->close_zip) {
                    $this->zip_archive->close();
                }

                return;
        }
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

        // QR-Code generieren und als PNG speichern
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

        // Überschreibe das Original-PDF mit dem modifizierten PDF
        copy($outputPath, $pdfPath);
    }

    private function shortenUrlWithYourls($url)
    {
        // Generate a random 6-character string (alphanumeric, case-sensitive)
        $shortCode = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);

        // Define your YOURLS API endpoint, username, and password
        $yourlsApiEndpoint = 'https://short.mk-pages.com/yourls-api.php'; // Replace with your YOURLS API URL
        $username = 'username'; // Replace with your YOURLS username
        $password = 'password'; // Replace with your YOURLS password

        // Prepare the POST data
        $postData = [
            'action'   => 'shorturl',
            'url'      => $url,
            'keyword'  => $shortCode, // Use the generated shortcode
            'format'   => 'json',
            'username' => $username,
            'password' => $password,
        ];

        // Make the POST request using CURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $yourlsApiEndpoint);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        // Fetch the response
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Check for successful response
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

    private function generateXmlWithZugferd($xmlPath)
{
    $documentBuilder = ZugferdDocumentBuilder::CreateNew(ZugferdProfiles::PROFILE_BASIC);

    // Dokumentinformationen
    $documentBuilder->setDocumentInformation(
        $this->document->document_number,
        "380",
        $this->document->issued_at,
        $this->document->currency_code
    );

    // Notizen hinzufügen
    $documentBuilder->addDocumentNote(
        "Rechnung gemäß Bestellung vom " . $this->document->created_at->format('d.m.Y')
    );

    // Verkäuferinformationen
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

    // Käuferinformationen
    $documentBuilder->setDocumentBuyer(
        $this->document->contact_name,
        $this->document->contact_tax_number
    );
    $documentBuilder->setDocumentBuyerAddress(
        $this->document->contact_address,
        "",
        "",
        $this->document->contact_zip_code,
        $this->document->contact_city,
        $this->document->contact_country
    );

    // Steuern hinzufügen
    foreach ($this->document->totals as $total) {
        if ($total['code'] === 'tax') {
            $documentBuilder->addDocumentTax("S", "VAT", $total['amount'], $this->document->amount_without_tax, 19.0);
        }
    }

    // Gesamtsummen
    $documentBuilder->setDocumentSummation(
        $this->document->amount_without_tax,
        $this->document->amount,
        $this->document->amount_without_tax,
        0.0,
        0.0,
        $this->document->amount_without_tax,
        $this->document->amount - $this->document->amount_without_tax
    );

    // Positionen hinzufügen
    foreach ($this->document->items as $item) {
        $documentBuilder->addNewPosition((string) $item['id'])
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

    // XML-Datei speichern
    $documentBuilder->writeFile($xmlPath);
}

}

