<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\Status;
use tabs\apiclient\property\BookingBrand;
use tabs\apiclient\property\MarketingBrand;
use tabs\apiclient\property\price\Price;

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
 * @method Status getStatus() Returns the status
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
     * @var Status
     */
    protected $status;
    
    /**
     * Collection of prices
     * 
     * @var Collection|Price[]
     */
    protected $prices;

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->prices = Collection::factory('price', new Price, $this);
        
        parent::__construct($id);
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