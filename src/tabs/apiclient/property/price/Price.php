<?php

namespace tabs\apiclient\property\price;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\property\price\PartySizePrice;
use tabs\apiclient\Currency;
use tabs\apiclient\property\price\PriceTypeBranding;

/**
 * Tabs Rest API Price object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Price setType(string $var) Sets the type
 *
 * @method Price setFromdate(\DateTime $var) Sets the fromdate
 *
 * @method Price setTodate(\DateTime $var) Sets the todate
 *
 * @method Price setBand(string $var) Sets the band
 *
 * @method Price setDescription(string $var) Sets the description
 *
 * @method Price setPrice(float $var) Sets the price
 *
 */
class Price extends Builder
{
    /**
     * Type
     *
     * @var string
     */
    protected $type;

    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;

    /**
     * Band
     *
     * @var string
     */
    protected $band;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Price
     *
     * @var float
     */
    protected $price;

    /**
     * Partysizeprices
     *
     * @var Collection|\tabs\apiclient\property\price\PartySizePrice[]
     */
    protected $partysizeprices;

    /**
     * Currency
     *
     * @var \tabs\apiclient\Currency
     */
    protected $currency;

    /**
     * Pricetypebranding
     *
     * @var \tabs\apiclient\property\price\PriceTypeBranding
     */
    protected $pricetypebranding;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->partysizeprices = Collection::factory(
            '',
            new PartySizePrice,
            $this
        );

        parent::__construct($id);
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|Currency $currency The Currency
     *
     * @return Price
     */
    public function setCurrency($currency)
    {
        $this->currency = Currency::factory($currency);

        return $this;
    }

    /**
     * Set the pricetypebranding
     *
     * @param stdclass|array|PriceTypeBranding $pricetypebranding The Pricetypebranding
     *
     * @return Price
     */
    public function setPricetypebranding($pricetypebranding)
    {
        $this->pricetypebranding = PriceTypeBranding::factory($pricetypebranding);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'type' => $this->getType(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'band' => $this->getBand(),
            'description' => $this->getDescription(),
            'price' => $this->getPrice(),
            'currencycode' => $this->getCurrency() ? $this->getCurrency()->getCode() : null,
            'pricetypebrandingid' => $this->getPricetypebranding() ? $this->getPricetypebranding()->getId() : null,
        );
    }

    /**
     * Returns the type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the fromdate
     *
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the todate
     *
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Returns the band
     *
     * @return string
     */
    public function getBand()
    {
        return $this->band;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the partysizeprices
     *
     * @return Collection|PartySizePrice[]
     */
    public function getPartysizeprices()
    {
        return $this->partysizeprices;
    }

    /**
     * Returns the currency
     *
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Returns the pricetypebranding
     *
     * @return PriceTypeBranding
     */
    public function getPricetypebranding()
    {
        return $this->pricetypebranding;
    }
}