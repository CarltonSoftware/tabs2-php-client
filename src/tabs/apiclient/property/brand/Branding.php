<?php

/**
 * Tabs Rest API Property Brand object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\property\brand;
use tabs\apiclient\brand\Branding as CoreBrandingGroup;
use tabs\apiclient\property\brand\BrandingGroup as PropertyBrandingGroup;
use tabs\apiclient\property\brand\MarketingBrand as PropertyMarketingBrand;
use tabs\apiclient\property\brand\BookingBrand as PropertyBookingBrand;

/**
 * Tabs Rest API Property Brand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Branding setBranding(string|CoreBrandingGroup $grp) Sets the branding group object
 * @method Branding setBrandinggroup(string|PropertyBrandingGroup $grp) Sets the property branding group object
 * @method Branding setMarketingbrand(string|PropertyMarketingBrand $grp) Sets the marketing branding group object
 * @method Branding setBookingbrand(string|PropertyBookingBrand $grp) Sets the booking branding group object
 */
class Branding extends BrandStatus
{
    /**
     * Branding group base object
     * 
     * @var CoreBrandingGroup
     */
    protected $branding;
    
    /**
     * 
     * Property Branding group base object
     * 
     * @var PropertyBrandingGroup
     */
    protected $brandinggroup;
    
    /**
     * Marketing brand associated with this branding group
     * 
     * @var MarketingBrand
     */
    protected $marketingbrand;
    
    /**
     * Booking brand associated with this branding group
     * 
     * @var BookingBrand
     */
    protected $bookingbrand;
    
    /**
     * Fetch and return the branding group
     * 
     * @return CoreBrandingGroup
     */
    public function getBranding()
    {
        if (is_string($this->branding)) {
            $this->branding = CoreBrandingGroup::_get($this->branding);
        }
        
        return $this->branding;
    }
    
    /**
     * Return the properties marketing brand
     * 
     * @return PropertyMarketingBrand
     */
    public function getMarketingbrand()
    {
        if (is_string($this->marketingbrand)) {
            $this->marketingbrand = PropertyMarketingBrand::_get(
                $this->marketingbrand
            );
            $this->updatePropertyParent();
        }
        
        return $this->marketingbrand;
    }
    
    /**
     * Return the properties booking brand
     * 
     * @return PropertyBookingBrand
     */
    public function getBookingbrand()
    {
        if (is_string($this->bookingbrand)) {
            $this->bookingbrand = PropertyBookingBrand::_get(
                $this->bookingbrand
            );
            $this->updatePropertyParent();
        }
        
        return $this->bookingbrand;
    }
    
    /**
     * Return the properties branding group
     * 
     * @return PropertyBrandingGroup
     */
    public function getBrandinggroup()
    {
        if (is_string($this->brandinggroup)) {
            $this->brandinggroup = PropertyBrandingGroup::_get(
                $this->brandinggroup
            );
            $this->updatePropertyParent();
        }
        
        return $this->brandinggroup;
    }
    
    /**
     * Update the property parent on the property group
     * 
     * @return \tabs\apiclient\property\brand\Branding
     */
    public function updatePropertyParent()
    {
        $prop = $this->getParentProperty();
        if ($this->bookingbrand) {
            $this->bookingbrand->setParent($prop);
        }
        
        if ($this->marketingbrand) {
            $this->marketingbrand->setParent($prop);
        }
        
        if ($this->brandinggroup) {
            $this->brandinggroup->setParent($prop);
        }
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'brandingid' => $this->getBrandinggroup()->getId(),
            'status' => $this->getStatus()->getName()
        );
    }
}
