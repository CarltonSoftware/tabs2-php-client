<?php

namespace tabs\apiclient\property\price;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\PriceType;
use tabs\apiclient\SalesChannel;
use tabs\apiclient\property\price\PriceTypeBranding;
use tabs\apiclient\property\price\PartySizePrice;

/**
 * Tabs Rest API PriceTypeBranding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PriceTypeBranding setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method PriceTypeBranding setTodate(\DateTime $var) Sets the todate
 * 
 * @method PriceTypeBranding setType(string $var) Sets the type
 * 
 * @method PriceTypeBranding setDecimalplaces(integer $var) Sets the decimalplaces
 * 
 * @method PriceTypeBranding setPrice(float $var) Sets the price
 * 
 * @method PriceTypeBranding setPercentage(integer $var) Sets the percentage
 * 
 */
class PriceTypeBranding extends Builder
{
    /**
     * Pricetype
     *
     * @var PriceType
     */
    protected $pricetype;

    /**
     * Saleschannel
     *
     * @var SalesChannel
     */
    protected $saleschannel;

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
     * Type
     *
     * @var string
     */
    protected $type;

    /**
     * Decimalplaces
     *
     * @var integer
     */
    protected $decimalplaces;

    /**
     * Price
     *
     * @var float
     */
    protected $price;

    /**
     * Percentage
     *
     * @var integer
     */
    protected $percentage;

    /**
     * Percentages
     *
     * @var Collection|PriceTypeBranding[]
     */
    protected $percentages;

    /**
     * Partysizeprices
     *
     * @var Collection|PartySizePrice[]
     */
    protected $partysizeprices;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->percentages = Collection::factory('', $this, $this);
        $this->partysizeprices = Collection::factory('', new PartySizePrice, $this);
        parent::__construct($id);
    }

    /**
     * Set the pricetype
     *
     * @param stdclass|array|PriceType $pricetype The Pricetype
     *
     * @return PriceTypeBranding
     */
    public function setPricetype($pricetype)
    {
        $this->pricetype = PriceType::factory($pricetype);

        return $this;
    }

    /**
     * Set the saleschannel
     *
     * @param stdclass|array|SalesChannel $saleschannel The Saleschannel
     *
     * @return PriceTypeBranding
     */
    public function setSaleschannel($saleschannel)
    {
        $this->saleschannel = SalesChannel::factory($saleschannel);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            
        );
    }

    /**
     * Returns the pricetype
     *
     * @return PriceType
     */
    public function getPricetype()
    {
        return $this->pricetype;
    }

    /**
     * Returns the saleschannel
     *
     * @return SalesChannel
     */
    public function getSaleschannel()
    {
        return $this->saleschannel;
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
     * Returns the type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the decimalplaces
     *
     * @return integer
     */
    public function getDecimalplaces()
    {
        return $this->decimalplaces;
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
     * Returns the percentage
     *
     * @return integer
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Returns the percentages
     *
     * @return Collection|PriceTypeBranding[]
     */
    public function getPercentages()
    {
        return $this->percentages;
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
}