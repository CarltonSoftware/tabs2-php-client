<?php

namespace tabs\apiclient\actor;

/**
 * Tabs Rest API Address object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\Address getAddress() Returns the address
 */
class Address extends ContactDetail
{
    /**
     * Address
     *
     * @var \tabs\apiclient\Address
     */
    protected $address;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the address
     *
     * @param stdclass|array|\tabs\apiclient\Address $address The Address
     *
     * @return Address
     */
    public function setAddress($address)
    {
        $this->address = \tabs\apiclient\Address::factory($address);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            $this->getAddress()->toArray(),
            parent::toArray()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return (string) $this->getAddress();
    }
}