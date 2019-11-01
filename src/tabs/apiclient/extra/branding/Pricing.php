<?php

namespace tabs\apiclient\extra\branding;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\Extra;

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
 * @method Pricing setPricingperiod(string $var) Sets the pricingperiod
 * 
 * @method Pricing setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method Pricing setTodate(\DateTime $var) Sets the todate
 * 
 * @method Pricing setPricingtype(string $var) Sets the pricingtype
 * 
 * @method Pricing setPerperiod(boolean $var) Sets the perperiod
 * 
 * @method Pricing setPrice(float $var) Sets the price
 * 
 * @method Pricing setPercentage(float $var) Sets the percentage
 * 
 * @method Pricing setBasedon(string $var) Sets the basedon
 * 
 * @method Pricing setMinimum(integer $var) Sets the minimum
 * 
 * @method Pricing setMaximum(integer $var) Sets the maximum
 * 
 * @method Pricing setPeradult(boolean $var) Sets the peradult
 * 
 * @method Pricing setPerchild(boolean $var) Sets the perchild
 * 
 * @method Pricing setPerinfant(boolean $var) Sets the perinfant
 * 
 * 
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
     * Bookingbookedfromdate
     * 
     * @var \DateTime
     * 
     */

    protected $bookingbookedfromdate;

    /**
     * Bookingbookedtodate 
     * 
     */ 

     protected $bookingbookedtodate;

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
    
    /**
     * extradetails
     *
     * @var Extra
     */
    protected $extradetails;      

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
     * Set the extradetails
     *
     * @param stdclass|array|Extra $extradetails The extra details
     *
     * @return Pricing
     */
    public function setExtradetails($extradetails)
    {
        $this->extradetails = Extra::factory($extradetails);

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
            'bookingbookedfromdate' => $this->getBookingbookedfromdate(),
            'bookingbookedtodate'=> $this->getBookingbookedtodate(),
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

    /**
     * Returns the pricingperiod
     *
     * @return string
     */
    public function getPricingperiod()
    {
        return $this->pricingperiod;
    }

    /**
     * Returns the property
     *
     * @return \tabs\apiclient\Property
     */
    public function getProperty()
    {
        return $this->property;
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
     * Returns the bookingbookedfromdate
     *
     * @return \DateTime
     */
    public function getBookingbookedfromdate()
    {
        return $this->bookingbookedfromdate;
    }

    /**
     * Returns the bookingbookedtodate
     *
     * @return \DateTime
     */
    public function getBookingbookedtodate()
    {
        return $this->bookingbookedtodate;
    }

    /**
     * Returns the currency
     *
     * @return \tabs\apiclient\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Returns the pricingtype
     *
     * @return string
     */
    public function getPricingtype()
    {
        return $this->pricingtype;
    }

    /**
     * Returns the perperiod
     *
     * @return boolean
     */
    public function getPerperiod()
    {
        return $this->perperiod;
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
     * @return float
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Returns the basedon
     *
     * @return string
     */
    public function getBasedon()
    {
        return $this->basedon;
    }

    /**
     * Returns the minimum
     *
     * @return integer
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * Returns the maximum
     *
     * @return integer
     */
    public function getMaximum()
    {
        return $this->maximum;
    }

    /**
     * Returns the peradult
     *
     * @return boolean
     */
    public function getPeradult()
    {
        return $this->peradult;
    }

    /**
     * Returns the perchild
     *
     * @return boolean
     */
    public function getPerchild()
    {
        return $this->perchild;
    }

    /**
     * Returns the perinfant
     *
     * @return boolean
     */
    public function getPerinfant()
    {
        return $this->perinfant;
    }

    /**
     * Returns the dailyprices
     *
     * @return Collection|pricing\PriceType[]
     */
    public function getDailyprices()
    {
        return $this->dailyprices;
    }

    /**
     * Returns the range prices
     *
     * @return Collection|pricing\RangeElement[]
     */
    public function getRanges()
    {
        return $this->ranges;
    }

    /**
     * Returns the extra details
     *
     * @return Extra
     */
    public function getExtradetails()
    {
        return $this->extradetails;
    }
}