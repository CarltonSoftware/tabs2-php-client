<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Customer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\Customer getCustomer()        Returns the customer
 * @method string                   getName()            Returns the name
 * @method Customer                 setName(string $var) Sets the name
 * 
 */
class Customer extends Builder
{
    /**
     * Details
     *
     * @var \tabs\apiclient\Customer
     */
    protected $customer;

    /**
     * Name
     *
     * @var string
     */
    protected $name;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the details
     *
     * @param stdclass|array|\tabs\apiclient\Customer $details The Details
     *
     * @return Customer
     */
    public function setDetails($details)
    {
        $this->customer = \tabs\apiclient\Customer::factory($details);

        return $this;
    }
    
    /**
     * Customer setter
     * 
     * @param stdclass|array|\tabs\apiclient\Customer $customer The Customer
     * 
     * @return Customer
     */
    public function setCustomer($customer)
    {
        return $this->setDetails($customer);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array();
        if ($this->getDetails()) {
            $arr['customerid'] = $this->getCustomer()->getId();
        }
        
        return $arr;
    }
}