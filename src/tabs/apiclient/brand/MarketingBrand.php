<?php

/**
 * Tabs Rest API Marketing Brand object.
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
 * Tabs Rest API Marketing Brand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method BookingBrand  getDefaultbookingbrand()    Returns the default booking brand 
 */
class MarketingBrand extends Brand
{
    /**
     * Default Booking Brand
     * 
     * @var \tabs\apiclient\brand\BookingBrand
     */
    protected $defaultbookingbrand;
    
    /**
     * Set the Default booking brand
     * 
     * @param array|stdClass|BookingBrand   $bb     BookingBrand
     * 
     * @return \tabs\apiclient\brand\BookingBrand
     */
    public function setDefaultbookingbrand($bb)
    {
        $bookingBrand = BookingBrand::factory($bb);
        $this->defaultbookingbrand = $bookingBrand->setParent($this);
        
        return $this;
    }
    
    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {   
        $code = $this->getCode();
        $name = $this->getName();
        $agency = $this->getAgency();
        $dbbcode = $this->getDefaultbookingbrand()->getCode();
        $dbbname = $this->getDefaultbookingbrand()->getName();
        
        return sprintf(
            'Code: %s<br>Name: %s<br>Agency: %s<br>Default Booking Brand: %s - %s', 
            $code, 
            $name, 
            $agency,
            $dbbcode,
            $dbbname
        );  
    } 
}
