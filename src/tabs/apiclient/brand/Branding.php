<?php

/**
 * Tabs Rest API Booking Brand object.
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

namespace tabs\apiclient\brand;

/**
 * Tabs Rest API Branding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer  getId()            Returns the brand id
 * @method Branding setId(integer $id) Sets the brand id
 * 
 * @method BrandingGroup  getBrandinggroup()  Return the branding group
 * @method MarketingBrand getMarketingbrand() Return the marketing brand
 * @method BookingBrand   getBookingbrand()   Return the booking brand
 */
class Branding extends \tabs\apiclient\core\Base
{
    /**
     * Branding Id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * The branding group (accounting brand)
     * 
     * @var BrandingGroup
     */
    protected $brandinggroup;
    
    /**
     * The marketing brand
     * 
     * @var MarketingBrand
     */
    protected $marketingbrand;
    
    /**
     * The booking brand
     * 
     * @var BookingBrand
     */
    protected $bookingbrand;
    
    /**
     * Set the branding group
     * 
     * @param array|stdClass|BrandingGroup $grp Branding group
     * 
     * @return \tabs\apiclient\brand\Branding
     */
    public function setBrandinggroup($grp)
    {
        $group = BrandingGroup::factory($grp);
        $this->brandinggroup = $group->setParent($this);
        
        return $this;
    }
    
    /**
     * Set the marketing brand
     * 
     * @param array|stdClass|MarketingBrand $grp MarketingBrand group
     * 
     * @return \tabs\apiclient\brand\Branding
     */
    public function setMarketingbrand($grp)
    {
        $group = MarketingBrand::factory($grp);
        $this->marketingbrand = $group->setParent($this);
        
        return $this;
    }
    
    /**
     * Set the booking brand
     * 
     * @param array|stdClass|BookingBrand $grp BookingBrand group
     * 
     * @return \tabs\apiclient\brand\Branding
     */
    public function setBookingbrand($grp)
    {
        $group = BookingBrand::factory($grp);
        $this->bookingbrand = $group->setParent($this);
        
        return $this;
    }
    
    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {   
        $brandingGroupName = $this->getBrandinggroup()->getName();
        $marketingBrandName = $this->getMarketingbrand()->getName();
        $bookingBrandName = $this->getBookingbrand()->getName();
        
        return sprintf(
            '%s (Booking: %s, Marketing: %s)', 
            $brandingGroupName, 
            $bookingBrandName, 
            $marketingBrandName
        );  
    }  
}
