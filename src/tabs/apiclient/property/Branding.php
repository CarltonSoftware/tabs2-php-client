<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\property\BookingBrand;
use tabs\apiclient\property\MarketingBrand;
use tabs\apiclient\property\price\Price;
use tabs\apiclient\property\branding\AvailableDay;
use tabs\apiclient\property\branding\Status;
use tabs\apiclient\property\branding\Calendar;
use tabs\apiclient\extra\branding\Pricing;
use tabs\apiclient\extra\branding\Configuration;

/**
 * Tabs Rest API PropertyBranding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\Branding getBranding() Returns the branding
 * @method \tabs\apiclient\BrandingGroup getBrandinggroup() Returns the brandinggroup
 * @method boolean getPrimarybookingbrand() Returns the primarybookingbrand
 * @method Branding setPrimarybookingbrand(boolean $var) Sets the primarybookingbrand
 * 
 * @method boolean getPromote() Returns the promote
 * @method Branding setPromote(boolean $var) Sets the promote
 * 
 * @method \DateTime getAllowbookingonwebuntil() Returns the allowbookingonwebuntil
 * @method Branding setAllowbookingonwebuntil(\DateTime $var) Sets the allowbookingonwebuntil
 * 
 * @method \DateTime getShowpricingonwebuntil() Returns the showpricingonwebuntil
 * @method Branding setShowpricingonwebuntil(\DateTime $var) Sets the showpricingonwebuntil
 * 
 * @method \tabs\apiclient\Status getStatus() Returns the status
 * 
 * @method Collection|Pricing[] getExtraprices() Returns the property extra prices
 * @method Collection|Configuration[] getExtraconfigurations() Returns the property extra configurations
 */
class Branding extends Builder
{
    /**
     * Branding
     *
     * @var \tabs\apiclient\Branding
     */
    protected $branding;

    /**
     * Branding group
     *
     * @var \tabs\apiclient\BrandingGroup
     */
    protected $brandinggroup;

    /**
     * Booking brand
     *
     * @var BookingBrand
     */
    protected $bookingbrand;

    /**
     * Marketing brand
     *
     * @var MarketingBrand
     */
    public $marketingbrand;

    /**
     * Primarybookingbrand
     *
     * @var boolean
     */
    protected $primarybookingbrand;

    /**
     * Promote
     *
     * @var boolean
     */
    protected $promote;

    /**
     * Status
     *
     * @var \tabs\apiclient\Status
     */
    protected $status;
    
    /**
     * Collection of prices
     * 
     * @var Collection|Price[]
     */
    protected $prices;
    
    /**
     * Collection of extra prices
     * 
     * @var Collection|Pricing[]
     */
    protected $extraprices;    
    
    /**
     * Collection of extra configurations
     * 
     * @var Collection|Configuration[]
     */
    protected $extraconfigurations;    
    
    /**
     * Collection of availability
     * 
     * @var Collection|AvailableDay[]
     */
    protected $availableDays;
    
    /**
     * Status history
     * 
     * @var Collection|Status[]
     */
    protected $statuses;
    
    /**
     * Allowbookingonwebuntil
     *
     * @var \DateTime
     */
    protected $allowbookingonwebuntil;
    
    /**
     * Showpricingonwebuntil
     *
     * @var \DateTime
     */
    protected $showpricingonwebuntil;
    

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->prices = Collection::factory('price', new Price, $this);
        
        $this->extraprices = Collection::factory(
            'extrapricing', 
            new Pricing(), 
            $this
        );
        
        $this->extraconfigurations = Collection::factory(
            'extraconfiguration', 
            new Configuration(), 
            $this
        );
        
        $this->availableDays = Collection::factory(
            'availability',
            new AvailableDay(),
            $this
        );
        $this->status = Collection::factory(
            'status',
            new Status(),
            $this
        );
        
        $this->allowbookingonwebuntil = new \DateTime();
        $this->showpricingonwebuntil = new \DateTime();
        
        parent::__construct($id);
    }
    
    /**
     * Get some prices for the property brand
     * 
     * @param \DateTime $fromDate Start date of price range
     * @param \DateTime $toDate   End date of price range
     * 
     * @return Collection|Price[]
     */
    public function getPrices(
        \DateTime $fromDate = null,
        \DateTime $toDate = null
    ) {
        if ($fromDate && $toDate) {
            $this->prices->getPagination()
                ->addParameter('fromdate', $fromDate->format('Y-m-d'))
                ->addParameter('todate', $toDate->format('Y-m-d'));
        } else {
            $this->prices->getPagination()->removeParameter('fromdate')
                ->removeParameter('todate');
        }
        
        return $this->prices->fetch();
    }
    
    /**
     * Get some availability for the brand
     * 
     * @param \DateTime $fromDate          Start date of availability range
     * @param \DateTime $toDate            End date of availability range
     * @param boolean   $includechangedays Include change day information
     * 
     * @return Collection|AvailableDay[]
     */
    public function getAvailableDays(
        \DateTime $fromDate = null,
        \DateTime $toDate = null,
        $includechangedays = true
    ) {
        if ($fromDate && $toDate) {
            $this->availableDays->getPagination()
                ->addParameter('fromdate', $fromDate->format('Y-m-d'))
                ->addParameter('todate', $toDate->format('Y-m-d'));
        } else {
            $this->availableDays->getPagination()->removeParameter('fromdate')
                ->removeParameter('todate');
        }
        
        $this->availableDays->getPagination()->addParameter(
            'includechangedays',
            $this->boolToStr($includechangedays)
        );
        
        return $this->availableDays->fetch();
    }
    
    /**
     * Get a calendar object with availability for a specific month
     * 
     * @param \DateTime $fromDate Fromdate
     * @param array     $options  Calendar options
     * 
     * @return Calendar
     */
    public function getCalendar(
        \DateTime $fromDate = null,
        $options = array()
    ) {
        if (!$fromDate) {
            $fromDate = new \DateTime('first day of this month');
        }
        
        $fromDate->setTime(0, 0, 0);
        $toDate = clone $fromDate;
        $toDate->modify('last day of this month');
        
        $days = $this->getAvailableDays($fromDate, $toDate);
        
        $cal = new Calendar($options);
        $cal->setAvailableDays($days)
            ->setTargetMonth($fromDate);
        
        return $cal;
    }

    /**
     * Set the branding
     *
     * @param stdclass|array|\tabs\apiclient\Branding $branding The Branding
     *
     * @return PropertyBranding
     */
    public function setBranding($branding)
    {
        $this->branding = \tabs\apiclient\Branding::factory($branding);

        return $this;
    }

    /**
     * Set the brandinggroup
     *
     * @param stdclass|array|\tabs\apiclient\BrandingGroup $brandinggroup The Brandinggroup
     *
     * @return PropertyBranding
     */
    public function setBrandinggroup($brandinggroup)
    {
        $this->brandinggroup = \tabs\apiclient\BrandingGroup::factory($brandinggroup);

        return $this;
    }

    /**
     * Set the bookingbrand
     *
     * @param stdclass|array|BookingBrand $bookingbrand The Bookingbrand
     *
     * @return PropertyBranding
     */
    public function setBookingbrand($bookingbrand)
    {
        $this->bookingbrand = BookingBrand::factory($bookingbrand);
        
        // Fix for the non hateoas urls in the api
        if ($this->getParentProperty()) {
            $prop = $this->getParentProperty();
            $this->bookingbrand->setParent($prop);
        }

        return $this;
    }

    /**
     * Set the marketingbrand
     *
     * @param stdclass|array|MarketingBrand $marketingbrand The Marketingbrand
     *
     * @return PropertyBranding
     */
    public function setMarketingbrand($marketingbrand)
    {
        $this->marketingbrand = MarketingBrand::factory($marketingbrand);
        
        // Fix for the non hateoas urls in the api
        if ($this->getParentProperty()) {
            $prop = $this->getParentProperty();
            $this->marketingbrand->setParent($prop);
        }

        return $this;
    }

    /**
     * Set the status
     *
     * @param stdclass|array|Status $status The Status
     *
     * @return PropertyBranding
     */
    public function setStatus($status)
    {
        $this->status = Status::factory($status);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'brandingid' => $this->getBranding()->getId(),
            'brandinggroupid' => $this->getBrandinggroup()->getId(),
            'bookingbrandid' => $this->getBookingbrand()->getId(),
            'marketingbrandid' => $this->getMarketingbrand()->getId(),
            'primarybookingbrand' => $this->boolToStr($this->getPrimarybookingbrand()),
            'promote' => $this->boolToStr($this->getPromote()),
            'statusid' => $this->getStatus()->getId(),
            'allowbookingonwebuntildate' => $this->getAllowbookingonwebuntil()->format('Y-m-d'),
            'showpricingonwebuntildate' => $this->getShowpricingonwebuntil()->format('Y-m-d'),
            'extraconfigurations' => $this->getExtraconfigurations()->toArray(),
            'extraprices' => $this->getExtraprices()->toArray(),
        );
    }
    
    /**
     * For serialisation
     * 
     * @return array
     */
    public function __sleep()
    {
        return array(
            'id',
            'marketingbrand',
            'bookingbrand',
            'promote',
            'status',
            'allowbookingonwebuntil',
            'showpricingonwebuntil'
        );
    }
}