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
 * @method BookingBrand getBookingbrand() Returns the bookingbrand
 * @method MarketingBrand getMarketingbrand() Returns the marketingbrand
 * @method boolean getPrimarybookingbrand() Returns the primarybookingbrand
 * @method Branding setPrimarybookingbrand(boolean $var) Sets the primarybookingbrand
 * 
 * @method boolean getPromote() Returns the promote
 * @method Branding setPromote(boolean $var) Sets the promote
 * 
 * @method \tabs\apiclient\Status getStatus() Returns the status
 * 
 * @method Collection|Price[] getPrices() Returns the property brand prices
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
    protected $marketingbrand;

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

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->prices = Collection::factory('price', new Price, $this);
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
        
        parent::__construct($id);
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
        }
        
        if ($includechangedays) {
            $this->availableDays->getPagination()->addParameter(
                'includechangedays',
                $this->boolToStr($includechangedays)
            );
        }
        
        return $this->availableDays->fetch();
    }
    
    /**
     * Get a calendar object with availability for a specific month
     * 
     * @param \DateTime $fromDate Fromdate
     * 
     * @return Calendar
     */
    public function getCalendar(\DateTime $fromDate = null)
    {
        if (!$fromDate) {
            $fromDate = new \DateTime('first day of this month');
        }
        
        $fromDate->setTime(0, 0, 0);
        $toDate = clone $fromDate;
        $toDate->modify('last day of this month');
        
        $days = $this->getAvailableDays($fromDate, $toDate);
        
        $cal = new Calendar();
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
            'statusid' => $this->getStatus()->getId()
        );
    }
}