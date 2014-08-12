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
 *
 */

class Customer extends Actor
{

    // ------------------ Static Functions --------------------- //

    /**
     * Creates a basic customer object
     *
     * @return \tabs\core\Customer
     */
    public static function factory()
    {
        $customer = new Customer();
        return $customer;
    }

    /**
     * Create a customer object from a given customer reference
     *
     * @param string $reference Customer reference
     *
     * @return \tabs\core\Customer
     */
    public static function create($reference)
    {
        // Get the customer object
        $customerRequest = \tabs\client\Client::getClient()->get(
            "customer/{$reference}"
        );

        if ($customerRequest
            && $customerRequest->getStatusCode() == 200
            && $customerRequest->getBody() != ''
        ) {
            return self::createCustomerFromNode($customerRequest->json(array("object" => true)));
        } else {
            throw new \tabs\client\Exception(
                $customerRequest,
                'Unable to create customer'
            );
        }
    }

    /**
     * Creates a customer object from a node returned by the api
     *
     * @param object $node JSON Customer object response
     *
     * @return \tabs\core\Customer
     */
    public static function createCustomerFromNode($node)
    {
        $customer = self::factory();
        self::flattenNode($customer, $node);
        return $customer;
    }
    
    
}