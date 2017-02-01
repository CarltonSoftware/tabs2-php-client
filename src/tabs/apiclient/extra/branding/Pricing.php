<?php

namespace tabs\apiclient\extra\branding;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API Pricing object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getPricingperiod() Returns the pricingperiod
 * @method Pricing setPricingperiod(string $var) Sets the pricingperiod
 * 
 * @method \tabs\apiclient\Property getProperty() Returns the property
 * @method \DateTime getFromdate() Returns the fromdate
 * @method Pricing setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method Pricing setTodate(\DateTime $var) Sets the todate
 * 
 * @method \tabs\apiclient\Currency getCurrency() Returns the currency
 * @method string getPricingtype() Returns the pricingtype
 * @method Pricing setPricingtype(string $var) Sets the pricingtype
 * 
 * @method boolean getPerperiod() Returns the perperiod
 * @method Pricing setPerperiod(boolean $var) Sets the perperiod
 * 
 * @method float getPrice() Returns the price
 * @method Pricing setPrice(float $var) Sets the price
 * 
 * @method float getPercentage() Returns the percentage
 * @method Pricing setPercentage(float $var) Sets the percentage
 * 
 * @method string getBasedon() Returns the basedon
 * @method Pricing setBasedon(string $var) Sets the basedon
 * 
 * @method integer getMinimum() Returns the minimum
 * @method Pricing setMinimum(integer $var) Sets the minimum
 * 
 * @method integer getMaximum() Returns the maximum
 * @method Pricing setMaximum(integer $var) Sets the maximum
 * 
 * @method boolean getPeradult() Returns the peradult
 * @method Pricing setPeradult(boolean $var) Sets the peradult
 * 
 * @method boolean getPerchild() Returns the perchild
 * @method Pricing setPerchild(boolean $var) Sets the perchild
 * 
 * @method boolean getPerinfant() Returns the perinfant
 * @method Pricing setPerinfant(boolean $var) Sets the perinfant
 * 
 * @method Collection|pricing\PriceType[] getDailyprices() Returns the dailyprices
 * @method Collection|pricing\RangeElement[] getRanges()   Returns the range prices
 */
class Pricing extends Builder
{
    /**
     * Pricingperiod
     *
     * @var string
     */
    protected $pricingperiod = 'Week';

    /**
     * Property
     *
     * @var \tabs\apiclient\Property
     */
    protected $property;

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
     * Currency
     *
     * @var \tabs\apiclient\Currency
     */
    protected $currency;

    /**
     * Pricingtype
     *
     * @var string
     */
    protected $pricingtype;

    /**
     * Perperiod
     *
     * @var boolean
     */
    protected $perperiod = false;

    /**
     * Price
     *
     * @var float
     */
    protected $price = 0;

    /**
     * Percentage
     *
     * @var float
     */
    protected $percentage = 0;

    /**
     * Percentage based on
     *
     * @var string
     */
    protected $basedon = 'Brochure';

    /**
     * Minimum
     *
     * @var integer
     */
    protected $minimum = 0;

    /**
     * Maximum
     *
     * @var integer
     */
    protected $maximum = 9999;

    /**
     * Peradult
     *
     * @var boolean
     */
    protected $peradult = false;

    /**
     * Perchild
     *
     * @var boolean
     */
    protected $perchild = false;

    /**
     * Perinfant
     *
     * @var boolean
     */
    protected $perinfant = false;

    /**
     * Dailyprices
     *
     * @var Collection|pricing\PriceType[]
     */
    protected $dailyprices;

    /**
     * Ranges
     *
     * @var Collection|pricing\RangeElement[]
     */
    protected $ranges;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->dailyprices = Collection::factory(
            'pricetype',
            new pricing\PriceType(),
            $this
        );
        $this->ranges = Collection::factory(
            'rangeelement',
            new pricing\RangeElement(),
            $this
        );
        parent::__construct($id);
    }

    /**
     * Set the property
     *
     * @param stdclass|array|\tabs\apiclient\Property $property The Property
     *
     * @return Pricing
     */
    public function setProperty($property)
    {
        $this->property = \tabs\apiclient\Property::factory($property);

        return $this;
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|\tabs\apiclient\Currency $currency The Currency
     *
     * @return Pricing
     */
    public function setCurrency($currency)
    {
        $this->currency = \tabs\apiclient\Currency::factory($currency);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'pricingperiod' => $this->getPricingperiod(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'currencycode' => $this->getCurrency()->getCode(),
            'pricingtype' => $this->getPricingtype(),
            'perperiod' => $this->boolToStr($this->getPerperiod())
        );
        
        if ($this->getProperty()) {
            $arr['propertyid'] = $this->getProperty()->getId();
            $arr['propertypricing'] = $this->boolToStr(true);
        }
        
        if ($this->getPricingtype() == 'Amount') {
            $arr['price'] = $this->getPrice();
            $arr['peradult'] = $this->boolToStr($this->getPeradult());
            $arr['perchild'] = $this->boolToStr($this->getPerchild());
            $arr['perinfant'] = $this->boolToStr($this->getPerinfant());
        }
        
        if ($this->getPricingtype() == 'Percentage') {
            $arr['percentage'] = $this->getPercentage();
            $arr['basedon'] = $this->getBasedon();
            $arr['minimumprice'] = $this->getMinimum();
            $arr['maximumprice'] = $this->getMaximum();
        }
        
        if ($this->getPricingtype() == 'Range') {
            $arr['basedon'] = $this->getBasedon();
        }
        
        return $arr;
    }
}