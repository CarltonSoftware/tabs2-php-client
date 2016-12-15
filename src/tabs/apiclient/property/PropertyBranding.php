<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\branding\Branding;
use tabs\apiclient\branding\BrandingGroup;
use tabs\apiclient\property\PropertyBookingBrand;
use tabs\apiclient\property\PropertyMarketingBrand;
use tabs\apiclient\core\Status;

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
 * @method Branding getBranding() Returns the branding
 * @method BrandingGroup getBrandinggroup() Returns the brandinggroup
 * @method PropertyBookingBrand getBookingbrand() Returns the bookingbrand
 * @method PropertyMarketingBrand getMarketingbrand() Returns the marketingbrand
 * @method boolean getPrimarybookingbrand() Returns the primarybookingbrand
 * @method PropertyBranding setPrimarybookingbrand(boolean $var) Sets the primarybookingbrand
 * 
 * @method boolean getPromote() Returns the promote
 * @method PropertyBranding setPromote(boolean $var) Sets the promote
 * 
 * @method Status getStatus() Returns the status
 */
class PropertyBranding extends Builder
{
    /**
     * Branding
     *
     * @var Branding
     */
    protected $branding;

    /**
     * Brandinggroup
     *
     * @var BrandingGroup
     */
    protected $brandinggroup;

    /**
     * Bookingbrand
     *
     * @var PropertyBookingBrand
     */
    protected $bookingbrand;

    /**
     * Marketingbrand
     *
     * @var PropertyMarketingBrand
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

    // -------------------- Public Functions -------------------- //

    /**
     * Set the branding
     *
     * @param stdclass|array|Branding $branding The Branding
     *
     * @return PropertyBranding
     */
    public function setBranding($branding)
    {
        $this->branding = Branding::factory($branding);

        return $this;
    }

    /**
     * Set the brandinggroup
     *
     * @param stdclass|array|BrandingGroup $brandinggroup The Brandinggroup
     *
     * @return PropertyBranding
     */
    public function setBrandinggroup($brandinggroup)
    {
        $this->brandinggroup = BrandingGroup::factory($brandinggroup);

        return $this;
    }

    /**
     * Set the bookingbrand
     *
     * @param stdclass|array|PropertyBookingBrand $bookingbrand The Bookingbrand
     *
     * @return PropertyBranding
     */
    public function setBookingbrand($bookingbrand)
    {
        $this->bookingbrand = PropertyBookingBrand::factory($bookingbrand);

        return $this;
    }

    /**
     * Set the marketingbrand
     *
     * @param stdclass|array|PropertyMarketingBrand $marketingbrand The Marketingbrand
     *
     * @return PropertyBranding
     */
    public function setMarketingbrand($marketingbrand)
    {
        $this->marketingbrand = PropertyMarketingBrand::factory($marketingbrand);

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