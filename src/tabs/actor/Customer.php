<?php

/**
 * Tabs Rest API Customer object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\actor;

/**
 * Tabs Rest API Customer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Customer extends Actor
{
    // ------------------ Static Functions --------------------- //

    /**
     * Create a customer object from a given customer reference
     *
     * @param string $reference Customer reference
     *
     * @return \tabs\actor\Customer
     */
    public static function get($reference)
    {
        // Get the customer object
        $customerRequest = \tabs\client\Client::getClient()->get(
            "customer/{$reference}"
        );

        if ($customerRequest
            && $customerRequest->getStatusCode() == 200
            && $customerRequest->getBody() != ''
        ) {
            return self::factory(
                $customerRequest->json(
                    array(
                        'object' => true
                    )
                )
            );
        }
        
        throw new \tabs\client\Exception(
            $customerRequest,
            'Unable to create customer'
        );
    }
    
    /**
     * Fetch an array of customers
     * 
     * @return \tabs\actor\Customer[]
     */
    public static function fetch()
    {
        // Get the customers index
        $customersIndex = \tabs\client\Client::getClient()->get(
            'customer'
        );

        if ($customersIndex
            && $customersIndex->getStatusCode() == 200
            && $customersIndex->getBody() != ''
        ) {
            $customers = array();
            foreach ($customersIndex->json() as $cusArr) {
                $customers[] = static::factory($cusArr);
            }
            
            return $customers;
        }
        
        throw new \tabs\client\Exception(
            $customersIndex,
            'Unable to fetch customers'
        );
    }
    
    /**
     * Create a customer object from a json object
     * 
     * @param stdClass $json Json object
     * 
     * @return \tabs\actor\Customer
     */
    public static function factory($json)
    {
        $customer = new static();
        self::setObjectProperties(
            $customer,
            $json
        );

        return $customer;
    }
}