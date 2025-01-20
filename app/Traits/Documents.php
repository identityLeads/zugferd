<?php

namespace App\Traits;

use App\Interfaces\Utility\DocumentNumber;
use App\Models\Document\Document;
use App\Abstracts\View\Components\Documents\Document as DocumentComponent;
use App\Utilities\Date;
use App\Traits\Transactions;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Mpdf\Mpdf;

trait Documents
{
    use Transactions;

    public function isRecurringDocument(): bool
    {
        $type = $this->type ?? $this->document->type ?? $this->model->type ?? 'invoice';

        return Str::endsWith($type, '-recurring');
    }

    public function isNotRecurringDocument(): bool
    {
        return ! $this->isRecurring();
    }

    public function getRecurringDocumentTypes() : array
    {
        $types = array_keys(config('type.document'));

        $recurring_types = [];

        foreach ($types as $type) {
            if (Str::endsWith($type, '-recurring')) {
                $recurring_types[] = $type;
            }
        }

        return $recurring_types;
    }

    /**
     * Deprecated. Use the DocumentNumber::getNextNumber() method instead.
     *
     * @deprecated This method is deprecated and will be removed in future versions.
     */
    public function getNextDocumentNumber(string $type): string
    {
        return app(DocumentNumber::class)->getNextNumber($type, null);
    }

    /**
     * Deprecated. Use the DocumentNumber::increaseNextNumber() method instead.
     *
     * @deprecated This method is deprecated and will be removed in future versions.
     */
    public function increaseNextDocumentNumber(string $type): void
    {
        app(DocumentNumber::class)->increaseNextNumber($type, null);
    }

    public function getDocumentStatuses(string $type): Collection
    {
        $list = [
            'invoice' => [
                'draft',
                'sent',
                'viewed',
                'approved',
                'partial',
                'paid',
                'overdue',
                'unpaid',
                'cancelled',
            ],
            'bill'    => [
                'draft',
                'received',
                'partial',
                'paid',
                'overdue',
                'unpaid',
                'cancelled',
            ],
        ];

        // @todo get dynamic path
        //$trans_key = $this->getTextDocumentStatuses($type);
        $trans_key = 'documents.statuses.';

        $statuses = collect($list[$type])->each(function ($code) use ($type, $trans_key) {
            $item = new \stdClass();
            $item->code = $code;
            $item->name = trans($trans_key . $code);

            return $item;
        });

        return $statuses;
    }

    public function getDocumentStatusesForFuture()
    {
        return [
            'draft',
            'sent',
            'received',
            'viewed',
            'partial',
        ];
    }

    public function getDocumentFileName(Document $document, string $separator = '-', string $extension = 'pdf'): string
    {
        return $this->getSafeDocumentNumber($document, $separator) . $separator . time() . '.' . $extension;
    }

    public function getSafeDocumentNumber(Document $document, string $separator = '-'): string
    {
        return Str::slug($document->document_number, $separator, language()->getShortCode());
    }

    protected function getTextDocumentStatuses($type)
    {
        $default_key = config('type.document.' . $type . '.translation.prefix') . '.statuses.';

        $translation = DocumentComponent::getTextFromConfig($type, 'document_status', $default_key);

        if (!empty($translation)) {
            return $translation;
        }

        $alias = config('type.document.' . $type . '.alias');

        if (!empty($alias)) {
            $translation = $alias . '::' . config('type.document.' . $type . '.translation.prefix') . '.statuses';

            if (is_array(trans($translation))) {
                return $translation . '.';
            }
        }

        return 'documents.statuses.';
    }

    // This function will be remoed in the future
    protected function getSettingKey($type, $setting_key)
    {
        return $this->getDocumentSettingKey($type, $setting_key);
    }

    protected function getDocumentSettingKey($type, $setting_key)
    {
        $key = '';
        $alias = config('type.document.' . $type . '.alias');

        if (! empty($alias)) {
            $key .= $alias . '.';
        }

        $prefix = config('type.document.' . $type . '.setting.prefix');

        if (! empty($prefix)) {
            $key .= $prefix . '.' . $setting_key;
        } else {
            $key .= $setting_key;
        }

        return $key;
    }

    public function storeDocumentPdfAndGetPath($document)
{
    event(new \App\Events\Document\DocumentPrinting($document));

    // XML-Datei generieren
    $xmlContent = $this->generateInvoiceXml($document);
    $xmlPath = storage_path('app/temp/ZUGFeRD-invoice.xml');
    file_put_contents($xmlPath, $xmlContent);

    // HTML-Inhalt aus der Vorlage rendern
    $view = view($document->template_path, ['invoice' => $document, 'document' => $document])->render();
    $html = mb_convert_encoding($view, 'HTML-ENTITIES', 'UTF-8');

    // mPDF-Instanz erstellen
    $mpdf = new Mpdf([
        'tempDir' => storage_path('app/tmp'), // Temporäres Verzeichnis
        'PDFA' => true,                      // PDF/A-3 Unterstützung
        'PDFAauto' => true,                  // Automatische Anpassung
    ]);

    // Zusätzliche XMP-RDF-Metadaten hinzufügen
    $rdf = '<rdf:Description rdf:about="" 
                   xmlns:pdfaid="http://www.aiim.org/pdfa/ns/id/" 
                   xmlns:zf="urn:ferd:pdfa:CrossIndustryDocument:invoice:1p0#">
            <pdfaid:part>3</pdfaid:part>
            <pdfaid:conformance>B</pdfaid:conformance>
            <zf:DocumentType>INVOICE</zf:DocumentType>
            <zf:DocumentFileName>ZUGFeRD-invoice.xml</zf:DocumentFileName>
            <zf:Version>1.0</zf:Version>
            <zf:ConformanceLevel>BASIC</zf:ConformanceLevel>
        </rdf:Description>';
    $mpdf->SetAdditionalXmpRdf($rdf);

    // XML-Anhang hinzufügen
    $mpdf->SetAssociatedFiles([
        [
            'name' => 'ZUGFeRD-invoice.xml',
            'mime' => 'text/xml',
            'description' => 'ZUGFeRD-konforme XML-Rechnung',
            'AFRelationship' => 'Alternative',
            'path' => $xmlPath,
        ]
    ]);

    // HTML in PDF schreiben
    $mpdf->WriteHTML($html);

    // Dateiname generieren
    $file_name = $this->getDocumentFileName($document);

    // Speicherpfad definieren
    $pdf_path = storage_path('app/temp/' . $file_name);

    // PDF speichern
    $mpdf->Output($pdf_path, 'F');

    return $pdf_path;
}

/**
 * Generiere eine XML-Datei basierend auf dem Document-Objekt.
 */
private function generateInvoiceXml($document): string
{
    // XML-Vorlage mit Platzhaltern
    $xmlTemplate = <<<'XML'
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<rsm:CrossIndustryInvoice xmlns:rsm="urn:un:unece:uncefact:data:standard:CrossIndustryInvoice:100" xmlns:qdt="urn:un:unece:uncefact:data:standard:QualifiedDataType:100" xmlns:ram="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:udt="urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100">
  <rsm:ExchangedDocumentContext>
    <ram:GuidelineSpecifiedDocumentContextParameter>
      <ram:ID>urn:cen.eu:en16931:2017#compliant#urn:factur-x.eu:1p0:basic</ram:ID>
    </ram:GuidelineSpecifiedDocumentContextParameter>
  </rsm:ExchangedDocumentContext>
  <rsm:ExchangedDocument>
    <ram:ID>$documentNumber</ram:ID>
    <ram:TypeCode>380</ram:TypeCode>
    <ram:IssueDateTime>
      <udt:DateTimeString format="102">$issueDate</udt:DateTimeString>
    </ram:IssueDateTime>
    <ram:IncludedNote>
      <ram:Content>Rechnung gemäß Bestellung vom $orderDate.</ram:Content>
    </ram:IncludedNote>
    <ram:IncludedNote>
      <ram:Content>$supplierDetails</ram:Content>
    </ram:IncludedNote>
    <ram:IncludedNote>
      <ram:Content>$paymentTerms</ram:Content>
    </ram:IncludedNote>
  </rsm:ExchangedDocument>
  <rsm:SupplyChainTradeTransaction>
    <ram:IncludedSupplyChainTradeLineItem>
      <ram:AssociatedDocumentLineDocument>
        <ram:LineID>1</ram:LineID>
      </ram:AssociatedDocumentLineDocument>
      <ram:SpecifiedTradeProduct>
        <ram:GlobalID schemeID="0160">$productGlobalID</ram:GlobalID>
        <ram:Name>$productName</ram:Name>
      </ram:SpecifiedTradeProduct>
      <ram:SpecifiedLineTradeAgreement>
        <ram:NetPriceProductTradePrice>
          <ram:ChargeAmount>$productNetPrice</ram:ChargeAmount>
        </ram:NetPriceProductTradePrice>
      </ram:SpecifiedLineTradeAgreement>
      <ram:SpecifiedLineTradeDelivery>
        <ram:BilledQuantity unitCode="H87">$productQuantity</ram:BilledQuantity>
      </ram:SpecifiedLineTradeDelivery>
      <ram:SpecifiedLineTradeSettlement>
        <ram:ApplicableTradeTax>
          <ram:TypeCode>VAT</ram:TypeCode>
          <ram:CategoryCode>S</ram:CategoryCode>
          <ram:RateApplicablePercent>$taxRate</ram:RateApplicablePercent>
        </ram:ApplicableTradeTax>
        <ram:SpecifiedTradeSettlementLineMonetarySummation>
          <ram:LineTotalAmount>$lineTotalAmount</ram:LineTotalAmount>
        </ram:SpecifiedTradeSettlementLineMonetarySummation>
      </ram:SpecifiedLineTradeSettlement>
    </ram:IncludedSupplyChainTradeLineItem>
    <ram:ApplicableHeaderTradeAgreement>
      <ram:SellerTradeParty>
        <ram:Name>$supplierName</ram:Name>
        <ram:PostalTradeAddress>
          <ram:PostcodeCode>$supplierPostcode</ram:PostcodeCode>
          <ram:LineOne>$supplierStreet</ram:LineOne>
          <ram:CityName>$supplierCity</ram:CityName>
          <ram:CountryID>$supplierCountry</ram:CountryID>
        </ram:PostalTradeAddress>
        <ram:SpecifiedTaxRegistration>
          <ram:ID schemeID="FC">$supplierTaxID</ram:ID>
        </ram:SpecifiedTaxRegistration>
        <ram:SpecifiedTaxRegistration>
          <ram:ID schemeID="VA">$supplierVATID</ram:ID>
        </ram:SpecifiedTaxRegistration>
      </ram:SellerTradeParty>
      <ram:BuyerTradeParty>
        <ram:Name>$buyerName</ram:Name>
        <ram:PostalTradeAddress>
          <ram:PostcodeCode>$buyerPostcode</ram:PostcodeCode>
          <ram:LineOne>$buyerStreet</ram:LineOne>
          <ram:LineTwo>$buyerAdditionalInfo</ram:LineTwo>
          <ram:CityName>$buyerCity</ram:CityName>
          <ram:CountryID>$buyerCountry</ram:CountryID>
        </ram:PostalTradeAddress>
      </ram:BuyerTradeParty>
    </ram:ApplicableHeaderTradeAgreement>
    <ram:ApplicableHeaderTradeDelivery>
      <ram:ActualDeliverySupplyChainEvent>
        <ram:OccurrenceDateTime>
          <udt:DateTimeString format="102">$deliveryDate</udt:DateTimeString>
        </ram:OccurrenceDateTime>
      </ram:ActualDeliverySupplyChainEvent>
    </ram:ApplicableHeaderTradeDelivery>
    <ram:ApplicableHeaderTradeSettlement>
      <ram:InvoiceCurrencyCode>$currencyCode</ram:InvoiceCurrencyCode>
      <ram:ApplicableTradeTax>
        <ram:CalculatedAmount>$taxAmount</ram:CalculatedAmount>
        <ram:TypeCode>VAT</ram:TypeCode>
        <ram:BasisAmount>$taxBasis</ram:BasisAmount>
        <ram:CategoryCode>S</ram:CategoryCode>
        <ram:RateApplicablePercent>$taxRate</ram:RateApplicablePercent>
      </ram:ApplicableTradeTax>
      <ram:SpecifiedTradePaymentTerms>
        <ram:DueDateDateTime>
          <udt:DateTimeString format="102">$dueDate</udt:DateTimeString>
        </ram:DueDateDateTime>
      </ram:SpecifiedTradePaymentTerms>
      <ram:SpecifiedTradeSettlementHeaderMonetarySummation>
        <ram:LineTotalAmount>$lineTotalAmount</ram:LineTotalAmount>
        <ram:ChargeTotalAmount>$chargeTotalAmount</ram:ChargeTotalAmount>
        <ram:AllowanceTotalAmount>$allowanceTotalAmount</ram:AllowanceTotalAmount>
        <ram:TaxBasisTotalAmount>$taxBasis</ram:TaxBasisTotalAmount>
        <ram:TaxTotalAmount currencyID="$currencyCode">$taxTotalAmount</ram:TaxTotalAmount>
        <ram:GrandTotalAmount>$grandTotalAmount</ram:GrandTotalAmount>
        <ram:DuePayableAmount>$duePayableAmount</ram:DuePayableAmount>
      </ram:SpecifiedTradeSettlementHeaderMonetarySummation>
    </ram:ApplicableHeaderTradeSettlement>
  </rsm:SupplyChainTradeTransaction>
</rsm:CrossIndustryInvoice>
XML;

    // Platzhalter und ihre Werte
    $placeholders = [
        '$documentNumber' => $document->document_number,
        '$issueDate' => date('Ymd', strtotime($document->issued_at)),
        '$orderDate' => date('d.m.Y', strtotime($document->created_at)),
        '$supplierDetails' => "Lieferant GmbH\nLieferantenstraße 20\n80333 München\nDeutschland\nGeschäftsführer: Hans Muster\nHandelsregisternummer: H A 123",
        '$paymentTerms' => "Unsere GLN: 4000001123452\nIhre GLN: 4000001987658\nIhre Kundennummer: GE2020211\n\nZahlbar innerhalb 30 Tagen netto bis 25.12.2024, 3% Skonto innerhalb 10 Tagen bis 25.11.2024.",
        '$productGlobalID' => '4012345001235',
        '$productName' => 'GTIN: 4012345001235',
        '$productNetPrice' => '9.90',
        '$productQuantity' => '20.0000',
        '$taxRate' => '19',
        '$lineTotalAmount' => '198.00',
        '$supplierName' => 'Lieferant GmbH',
        '$supplierPostcode' => '80333',
        '$supplierStreet' => 'Lieferantenstraße 20',
        '$supplierCity' => 'München',
        '$supplierCountry' => 'DE',
        '$supplierTaxID' => '201/113/40209',
        '$supplierVATID' => 'DE123456789',
        '$buyerName' => $document->contact_name,
        '$buyerPostcode' => $document->contact_zip_code,
        '$buyerStreet' => $document->contact_address,
        '$buyerAdditionalInfo' => '',
        '$buyerCity' => $document->contact_city,
        '$buyerCountry' => $document->contact_country,
        '$deliveryDate' => '20241114',
        '$currencyCode' => $document->currency_code,
        '$taxAmount' => '37.62',
        '$taxBasis' => '198.00',
        '$dueDate' => '20241215',
        '$chargeTotalAmount' => '0.00',
        '$allowanceTotalAmount' => '0.00',
        '$taxTotalAmount' => '37.62',
        '$grandTotalAmount' => '235.62',
        '$duePayableAmount' => '235.62',
    ];

    // Platzhalter im Template ersetzen
    $xmlContent = str_replace(array_keys($placeholders), array_values($placeholders), $xmlTemplate);

    return $xmlContent;
}



    public function getTotalsForFutureDocuments($type = 'invoice', $documents = null)
    {
        $totals = [
            'overdue'   => 0,
            'open'      => 0,
            'draft'     => 0,
        ];

        $today = Date::today()->toDateString();

        $documents = $documents ?: Document::type($type)->with('transactions')->future();

        $documents->each(function ($document) use (&$totals, $today) {
            if (! in_array($document->status, $this->getDocumentStatusesForFuture())) {
                return;
            }

            $payments = 0;

            if ($document->status == 'draft') {
                $totals['draft'] += $document->getAmountConvertedToDefault();

                return;
            }

            if ($document->status == 'partial') {
                foreach ($document->transactions as $transaction) {
                    $payments += $transaction->getAmountConvertedToDefault();
                }
            }

            // Check if the document is open or overdue
            if ($document->due_at > $today) {
                $totals['open'] += $document->getAmountConvertedToDefault() - $payments;
            } else {
                $totals['overdue'] += $document->getAmountConvertedToDefault() - $payments;
            }
        });

        return $totals;
    }

    public function canNotifyTheContactOfDocument(Document $document): bool
    {
        $config = config('type.document.' . $document->type . '.notification');

        if (! $config['notify_contact']) {
            return false;
        }

        if (! $document->contact || ($document->contact->enabled == 0)) {
            return false;
        }

        if (empty($document->contact_email)) {
            return false;
        }

        // Check if ietf.org has MX records signaling a server with email capabilites
        $validator = new EmailValidator();
        $validations = new MultipleValidationWithAnd([
            new RFCValidation(),
            new DNSCheckValidation(),
        ]);
        if (! $validator->isValid($document->contact_email, $validations)) {
            return false;
        }

        return true;
    }

    public function getRealTypeOfRecurringDocument(string $recurring_type): string
    {
        return Str::replace('-recurring', '', $recurring_type);
    }
}
