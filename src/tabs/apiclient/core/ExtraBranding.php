<?php

/**
 * Tabs Rest API ExtraBranding object.
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

namespace tabs\apiclient\core;
use tabs\apiclient\brand\Branding;

/**
 * Tabs Rest API ExtraBranding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer  getId()             Returns the extra brand id
 * @method ExtraBranding setId(integer $id) Sets the extra brand id
 * 
 * @method Branding getBranding()       Return the branding
 */
class ExtraBranding extends \tabs\apiclient\core\Builder
{
    /**
     * ExtraBranding Id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * The branding
     * 
     * @var Branding
     */
    protected $branding;
  
    /**
     * Set the branding 
     * 
     * @param array|stdClass|Branding $br Branding
     * 
     * @return \tabs\apiclient\brand\Branding
     */
    public function setBranding($br)
    {
        $branding = Branding::factory($br);
        $this->branding = $branding->setParent($this);
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
        );
    }
    
    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {   
        $brandingGroupName = $this->getBranding()->getBrandinggroup()->getName();
        $marketingBrandName = $this->getBranding()->getMarketingbrand()->getName();
        $bookingBrandName = $this->getBranding()->getBookingbrand()->getName();
        
        return sprintf(
            '%s (Booking: %s, Marketing: %s)', 
            $brandingGroupName, 
            $bookingBrandName, 
            $marketingBrandName
        );  
    }  
}
