<?php

/**
 * Tabs Rest Address object.
 *
 * PHP Version 5.4
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;

/**
 * Tabs Rest Address object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * 
 * @method string  getLine1()     Return the Address line 1
 * @method string  getLine2()     Return the Address line 2
 * @method string  getLine3()     Return the Address line 3
 * @method string  getTown()      Return the Address town
 * @method string  getCounty()    Return the Address county
 * @method string  getPostcode()  Return the Address postcode
 * @method float   getLongitude() Return the longitude
 * @method float   getLatitude()  Return the latitude
 * @method Country getCountry()   Return the Address postcode
 * 
 * @method \tabs\apiclient\user\Role setRoute(string $route ) Set the Role
 */

class Address extends Base
{
    /**
     * Address line 1
     * 
     * @var string
     */
    protected $line1;
    
    /**
     * Address line 2
     * 
     * @var string
     */
    protected $line2;
    
    /**
     * Address line 3
     * 
     * @var string
     */
    protected $line3;
    
    /**
     * Address town
     * 
     * @var string
     */
    protected $town;
    
    /**
     * Address county
     * 
     * @var string
     */
    protected $county;
    
    /**
     * Address postcode
     * 
     * @var string
     */
    protected $postcode;
    
    /**
     * Address longitude
     * 
     * @var string
     */
    protected $longitude = 0;
    
    /**
     * Address latitude
     * 
     * @var string
     */
    protected $latitude = 0;
    
    /**
     * Address country
     * 
     * @var \tabs\apiclient\core\Country
     */
    protected $country;
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->country = new Country();
    }
    
    /**
     * Set the country object
     * 
     * @param array $array Country array
     * 
     * @return \tabs\apiclient\core\Address
     */
    public function setCountry($array)
    {
        if (is_string($array)) {
            $array = array('name' => $array);
        }
        
        $this->country = Country::factory($array);
        
        return $this;
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return implode(
            ', ',
            array_filter(
                $this->toArray(),
                function ($ele) {
                    return (gettype($ele) == 'string' && $ele !== '');
                }
            )
        );
    }
    
    /**
     * Array representation of the address.  Used for creates/updates.
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'line1' => $this->getLine1(),
            'line2' => $this->getLine2(),
            'line3' => $this->getLine3(),
            'town' => $this->getTown(),
            'county' => $this->getCounty(),
            'postcode' => $this->getPostcode(),
            'countrycode' => $this->getCountry()->getAlpha2(),
            'longitude' => (float) $this->getLongitude(),
            'latitude' => (float) $this->getLatitude()
        );
    }
}