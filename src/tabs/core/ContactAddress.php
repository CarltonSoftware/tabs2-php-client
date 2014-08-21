<?php

/**
 * Tabs Rest API ContactEntity object.
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

namespace tabs\core;

/**
 * Tabs Rest API ContactEntity object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\core\Address getAddress() Return the contact address
 */
class ContactAddress extends ContactEntity
{
    /**
     * Address
     *
     * @var \tabs\core\Address
     */
    protected $address;

    // ------------------ Public Functions --------------------- //
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->address = new Address();
    }
    
    /**
     * Set a new address
     * 
     * @param array|tabs\core\Address $address Address
     * 
     * @return \tabs\core\ContactAddress
     */
    public function setAddress($address)
    {
        if (is_array($address) || get_class($address) == 'stdClass') {
            $this->address = Address::factory($address);
        } else {
            $this->address = $address;
        }
        
        return $this;
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getAddress();
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->getAddress()->toArray();
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'address';
    }
}
