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
     * Set the branding group
     * 
     * @param string|stdClass|CoreBrandingGroup $brd Brand object
     * 
     * @return \tabs\apiclient\property\brand\Branding
     */
    public function setBranding($brd)
    {
        $this->branding = CoreBrandingGroup::factory($brd);
        
        return $this;
    }
    
    /**
     * Return the branding group
     * 
     * @return CoreBrandingGroup
     */
    public function getBranding()
    {
        try {
            $parent = $this->getParentProperty();
            $this->branding->setParent($parent);
        } catch (\tabs\apiclient\client\Exception $ex) {}
        
        return $this->branding;
    }
    
    /**
     * Set the property's marketing brand
     * 
     * @param string|stdClass|PropertyMarketingBrand $brd Brand object
     * 
     * @return \tabs\apiclient\property\brand\Branding
     */
    public function setMarketingbrand($brd)
    {
        $this->marketingbrand = PropertyMarketingBrand::factory($brd);
        
        return $this;
    }
    
    /**
     * Return the property's marketing brand
     * 
     * @return PropertyMarketingBrand
     */
    public function getMarketingbrand()
    {
        try {
            $parent = $this->getParentProperty();
            $this->marketingbrand->setParent($parent);
        } catch (\tabs\apiclient\client\Exception $ex) {}
        
        return $this->marketingbrand;
    }
    
    /**
     * Set the property's booking brand
     * 
     * @param string|stdClass|PropertyBookingBrand $brd Brand object
     * 
     * @return \tabs\apiclient\property\brand\Branding
     */
    public function setBookingbrand($brd)
    {
        $this->bookingbrand = PropertyBookingBrand::factory($brd);
        
        return $this;
    }
    
    /**
     * Return the property's booking brand
     * 
     * @return PropertyMarketingBrand
     */
    public function getBookingbrand()
    {
        try {
            $parent = $this->getParentProperty();
            $this->bookingbrand->setParent($parent);
        } catch (\tabs\apiclient\client\Exception $ex) {}
        
        return $this->bookingbrand;
    }
    
    /**
     * Set the property's branding group
     * 
     * @param string|stdClass|PropertyBrandingGroup $brd Brand object
     * 
     * @return \tabs\apiclient\property\brand\Branding
     */
    public function setBrandinggroup($brd)
    {
        $this->brandinggroup = PropertyBrandingGroup::factory($brd);
        
        return $this;
    }
    
    /**
     * Return the property's branding group
     * 
     * @return PropertyMarketingBrand
     */
    public function getBrandinggroup()
    {
        try {
            $parent = $this->getParentProperty();
            $this->brandinggroup->setParent($parent);
        } catch (\tabs\apiclient\client\Exception $ex) {}
        
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
        if (is_object($this->bookingbrand)) {
            $this->bookingbrand->setParent($prop);
        }
        
        if (is_object($this->marketingbrand)) {
            $this->marketingbrand->setParent($prop);
        }
        
        if (is_object($this->brandinggroup)) {
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
            'brandingid' => $this->getBranding()->getId(),
            'status' => $this->getStatus()->getName()
        );
    }
}
