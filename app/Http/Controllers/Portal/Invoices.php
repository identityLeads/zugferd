<?php

namespace App\Http\Controllers\Portal;

use App\Abstracts\Http\Controller;
use App\Http\Requests\Portal\InvoiceShow as Request;
use App\Models\Document\Document;
use App\Traits\Currencies;
use App\Traits\DateTime;
use App\Traits\Documents;
use App\Traits\Uploads;
use App\Utilities\Modules;
use Illuminate\Support\Facades\URL;use App\Abstracts\Notification;
use App\Models\Setting\EmailTemplate;
use Dompdf\Dompdf;
use Dompdf\Options;
use horstoeko\zugferd\ZugferdDocumentBuilder;
use horstoeko\zugferd\ZugferdDocumentPdfMerger;
use horstoeko\zugferd\ZugferdProfiles;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use setasign\Fpdi\Fpdi;
use Illuminate\Mail\Attachment;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Http;

class Invoices extends Controller
{
    use DateTime, Currencies, Documents, Uploads;

    /**
     * @var string
     */
    public $type = Document::INVOICE_TYPE;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $invoices = Document::invoice()->with('contact', 'histories', 'items', 'payments')
            ->accrued()->where('contact_id', user()->contact->id)
            ->collect(['document_number'=> 'desc']);

        return $this->response('portal.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param  Document $invoice
     *
     * @return Response
     */
    public function show(Document $invoice, Request $request)
    {
        $payment_methods = Modules::getPaymentMethods();

        event(new \App\Events\Document\DocumentViewed($invoice));

        return view('portal.invoices.show', compact('invoice', 'payment_methods'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param  Document $invoice
     *
     * @return Response
     */
    public function finish(Document $invoice, Request $request)
    {
        $layout = $request->isPortal($invoice->company_id) ? 'portal' : 'signed';

        return view('portal.invoices.finish', compact('invoice', 'layout'));
    }

    /**
     * Show the form for viewing the specified resource.
     *
     * @param  Document $invoice
     *
     * @return Response
     */
    public function printInvoice(Document $invoice, Request $request)
{
    // Stelle sicher, dass die Items geladen werden
    $invoice->load('items');

    event(new \App\Events\Document\DocumentPrinting($invoice));

    // HTML-Inhalt vorbereiten
    $currency_style = true;
    $view = view($invoice->template_path, compact('invoice', 'currency_style'))->render();
    $html = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

    // Temporäre Dateien
    $tempDir = storage_path('app/tmp');
    $dompdfPath = $tempDir . '/dompdf_generated_print.pdf';
    $xmlPath = $tempDir . '/generated_invoice_print.xml';
    $finalPdfPath = $tempDir . '/final_invoice_print.pdf';

    // PDF mit Dompdf erstellen
    $this->generatePdfWithDompdf($html, $dompdfPath);

    // Portal-Link generieren und kürzen
    $portalLink = URL::signedRoute('signed.invoices.show', [
        'company_id' => $invoice->company_id,
        'invoice' => $invoice->id,
    ]);

    $shortenedLink = $this->shortenUrlWithYourls($portalLink);

    // QR-Code generieren und ins PDF einfügen
    $this->addQrCodeToPdfWithFpdi($dompdfPath, $shortenedLink);

    // ZUGFeRD-XML-Datei generieren
    $this->generateXmlWithZugferd($invoice, $xmlPath);

    // PDF und XML zusammenführen
    (new ZugferdDocumentPdfMerger($xmlPath, $dompdfPath))->generateDocument()->saveDocument($finalPdfPath);

    // PDF wird direkt an den Browser zurückgegeben
    return response()->file($finalPdfPath, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $this->getDocumentFileName($invoice) . '"',
    ]);
}


    /**
     * Show the form for viewing the specified resource.
     *
     * @param  Document $invoice
     *
     * @return Response
     */
    public function pdfInvoice(Document $invoice, Request $request)
{
    // Stelle sicher, dass die Items geladen werden
    $invoice->load('items');

    event(new \App\Events\Document\DocumentPrinting($invoice));

    // HTML-Inhalt vorbereiten
    $currency_style = true;
    $view = view($invoice->template_path, compact('invoice', 'currency_style'))->render();
    $html = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

    // Temporäre Dateien
    $tempDir = storage_path('app/tmp');
    $dompdfPath = $tempDir . '/portal_generated.pdf';
    $xmlPath = $tempDir . '/portal_invoice.xml';
    $finalPdfPath = $tempDir . '/portal_final_invoice.pdf';

    // PDF mit Dompdf erstellen
    $this->generatePdfWithDompdf($html, $dompdfPath);

    // Portal-Link generieren und kürzen
    $portalLink = URL::signedRoute('signed.invoices.show', [
        'company_id' => $invoice->company_id,
        'invoice' => $invoice->id,
    ]);

    $shortenedLink = $this->shortenUrlWithYourls($portalLink);

    // QR-Code generieren und ins PDF einfügen
    $this->addQrCodeToPdfWithFpdi($dompdfPath, $shortenedLink);

    // XML-Datei mit ZUGFeRD-Daten erstellen
    $this->generateXmlWithZugferd($invoice, $xmlPath);

    // PDF und XML zusammenführen
    (new ZugferdDocumentPdfMerger($xmlPath, $dompdfPath))->generateDocument()->saveDocument($finalPdfPath);

    // Dateiname für den Download
    $file_name = $this->getDocumentFileName($invoice);

    // PDF zurückgeben
    return response()->download($finalPdfPath, $file_name);
}


    public function preview(Document $invoice)
    {
        if (empty($invoice)) {
            return redirect()->route('login');
        }

        $payment_actions = [];

        $payment_methods = Modules::getPaymentMethods();

        foreach ($payment_methods as $payment_method_key => $payment_method_value) {
            $codes = explode('.', $payment_method_key);

            if (!isset($payment_actions[$codes[0]])) {
                $payment_actions[$codes[0]] = URL::signedRoute('signed.' . $codes[0] . '.invoices.show', [$invoice->id]);
            }
        }

        return view('portal.invoices.preview', compact('invoice', 'payment_methods', 'payment_actions'));
    }

    public function signed(Document $invoice)
    {
        if (empty($invoice)) {
            return redirect()->route('login');
        }

        $payment_actions = [];

        $payment_methods = Modules::getPaymentMethods();

        foreach ($payment_methods as $payment_method_key => $payment_method_value) {
            $codes = explode('.', $payment_method_key);

            if (!isset($payment_actions[$codes[0]])) {
                $payment_actions[$codes[0]] = URL::signedRoute('signed.' . $codes[0] . '.invoices.show', [$invoice->id]);
            }
        }

        $print_action = URL::signedRoute('signed.invoices.print', [$invoice->id]);
        $pdf_action = URL::signedRoute('signed.invoices.pdf', [$invoice->id]);

        // Guest or Invoice contact user track the invoice viewed.
        if (empty(user()) || user()->id == $invoice->contact->user_id) {
            event(new \App\Events\Document\DocumentViewed($invoice));
        }

        return view('portal.invoices.signed', compact('invoice', 'payment_methods', 'payment_actions', 'print_action', 'pdf_action'));
    }
    private function generatePdfWithDompdf($html, $pdfPath)
{
    $options = new Options();
    $options->set('isRemoteEnabled', true); // Aktiviert das Laden externer Ressourcen (z. B. Bilder)
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait'); // Papierformat und Ausrichtung
    $dompdf->render();

    file_put_contents($pdfPath, $dompdf->output()); // Speichert das generierte PDF
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
    $pageCount = $fpdi->setSourceFile($pdfPath); // Bestehendes PDF laden
    $outputPath = storage_path('app/tmp/modified_pdf.pdf');

    for ($i = 1; $i <= $pageCount; $i++) {
        $templateId = $fpdi->importPage($i);
        $size = $fpdi->getTemplateSize($templateId);
        $fpdi->addPage($size['orientation'], [$size['width'], $size['height']]);
        $fpdi->useTemplate($templateId);

        // QR-Code auf der letzten Seite platzieren
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
    // Generiere einen zufälligen 6-stelligen Code
    $shortCode = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6);

    // YOURLS API-Konfiguration
    $yourlsApiEndpoint = 'https://short.mk-pages.com/yourls-api.php';
    $username = 'username'; // Ersetze durch deinen YOURLS-Benutzernamen
    $password = 'password'; // Ersetze durch dein YOURLS-Passwort

    // POST-Daten
    $postData = [
        'action'   => 'shorturl',
        'url'      => $url,
        'keyword'  => $shortCode,
        'format'   => 'json',
        'username' => $username,
        'password' => $password,
    ];

    // CURL-Anfrage
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

    // Dokumentinformationen
    $documentBuilder->setDocumentInformation(
        $document->document_number,
        "380",
        $document->issued_at,
        $document->currency_code
    );

    // Notizen hinzufügen
    $documentBuilder->addDocumentNote(
        "Rechnung gemäß Bestellung vom " . $document->created_at->format('d.m.Y')
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

    // Steuern hinzufügen
    foreach ($document->totals as $total) {
        if ($total['code'] === 'tax') {
            $documentBuilder->addDocumentTax("S", "VAT", $total['amount'], $document->amount_without_tax, 19.0);
        }
    }

    // Gesamtsummen
    $documentBuilder->setDocumentSummation(
        $document->amount_without_tax,
        $document->amount,
        $document->amount_without_tax,
        0.0,
        0.0,
        $document->amount_without_tax,
        $document->amount - $document->amount_without_tax
    );

    // Positionen hinzufügen
    foreach ($document->items as $item) {
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
