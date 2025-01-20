<?php

namespace horstoeko\zugferd\entities\extended\ram;

/**
 * Class representing SupplyChainTradeLineItemType
 *
 * XSD Type: SupplyChainTradeLineItemType
 */
class SupplyChainTradeLineItemType
{

    /**
     * @var \horstoeko\zugferd\entities\extended\ram\DocumentLineDocumentType $associatedDocumentLineDocument
     */
    private $associatedDocumentLineDocument = null;

    /**
     * @var \horstoeko\zugferd\entities\extended\ram\TradeProductType $specifiedTradeProduct
     */
    private $specifiedTradeProduct = null;

    /**
     * @var \horstoeko\zugferd\entities\extended\ram\LineTradeAgreementType $specifiedLineTradeAgreement
     */
    private $specifiedLineTradeAgreement = null;

    /**
     * @var \horstoeko\zugferd\entities\extended\ram\LineTradeDeliveryType $specifiedLineTradeDelivery
     */
    private $specifiedLineTradeDelivery = null;

    /**
     * @var \horstoeko\zugferd\entities\extended\ram\LineTradeSettlementType $specifiedLineTradeSettlement
     */
    private $specifiedLineTradeSettlement = null;

    /**
     * Gets as associatedDocumentLineDocument
     *
     * @return \horstoeko\zugferd\entities\extended\ram\DocumentLineDocumentType
     */
    public function getAssociatedDocumentLineDocument()
    {
        return $this->associatedDocumentLineDocument;
    }

    /**
     * Sets a new associatedDocumentLineDocument
     *
     * @param  \horstoeko\zugferd\entities\extended\ram\DocumentLineDocumentType $associatedDocumentLineDocument
     * @return self
     */
    public function setAssociatedDocumentLineDocument(\horstoeko\zugferd\entities\extended\ram\DocumentLineDocumentType $associatedDocumentLineDocument)
    {
        $this->associatedDocumentLineDocument = $associatedDocumentLineDocument;
        return $this;
    }

    /**
     * Gets as specifiedTradeProduct
     *
     * @return \horstoeko\zugferd\entities\extended\ram\TradeProductType
     */
    public function getSpecifiedTradeProduct()
    {
        return $this->specifiedTradeProduct;
    }

    /**
     * Sets a new specifiedTradeProduct
     *
     * @param  \horstoeko\zugferd\entities\extended\ram\TradeProductType $specifiedTradeProduct
     * @return self
     */
    public function setSpecifiedTradeProduct(\horstoeko\zugferd\entities\extended\ram\TradeProductType $specifiedTradeProduct)
    {
        $this->specifiedTradeProduct = $specifiedTradeProduct;
        return $this;
    }

    /**
     * Gets as specifiedLineTradeAgreement
     *
     * @return \horstoeko\zugferd\entities\extended\ram\LineTradeAgreementType
     */
    public function getSpecifiedLineTradeAgreement()
    {
        return $this->specifiedLineTradeAgreement;
    }

    /**
     * Sets a new specifiedLineTradeAgreement
     *
     * @param  \horstoeko\zugferd\entities\extended\ram\LineTradeAgreementType $specifiedLineTradeAgreement
     * @return self
     */
    public function setSpecifiedLineTradeAgreement(\horstoeko\zugferd\entities\extended\ram\LineTradeAgreementType $specifiedLineTradeAgreement)
    {
        $this->specifiedLineTradeAgreement = $specifiedLineTradeAgreement;
        return $this;
    }

    /**
     * Gets as specifiedLineTradeDelivery
     *
     * @return \horstoeko\zugferd\entities\extended\ram\LineTradeDeliveryType
     */
    public function getSpecifiedLineTradeDelivery()
    {
        return $this->specifiedLineTradeDelivery;
    }

    /**
     * Sets a new specifiedLineTradeDelivery
     *
     * @param  \horstoeko\zugferd\entities\extended\ram\LineTradeDeliveryType $specifiedLineTradeDelivery
     * @return self
     */
    public function setSpecifiedLineTradeDelivery(\horstoeko\zugferd\entities\extended\ram\LineTradeDeliveryType $specifiedLineTradeDelivery)
    {
        $this->specifiedLineTradeDelivery = $specifiedLineTradeDelivery;
        return $this;
    }

    /**
     * Gets as specifiedLineTradeSettlement
     *
     * @return \horstoeko\zugferd\entities\extended\ram\LineTradeSettlementType
     */
    public function getSpecifiedLineTradeSettlement()
    {
        return $this->specifiedLineTradeSettlement;
    }

    /**
     * Sets a new specifiedLineTradeSettlement
     *
     * @param  \horstoeko\zugferd\entities\extended\ram\LineTradeSettlementType $specifiedLineTradeSettlement
     * @return self
     */
    public function setSpecifiedLineTradeSettlement(\horstoeko\zugferd\entities\extended\ram\LineTradeSettlementType $specifiedLineTradeSettlement)
    {
        $this->specifiedLineTradeSettlement = $specifiedLineTradeSettlement;
        return $this;
    }
}
