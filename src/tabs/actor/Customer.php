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
class Customer extends Actor implements \tabs\core\BuilderInterface
{
    // -------------------------- Static Functions -------------------------- //
    
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
                $customers[] = self::factory($cusArr);
            }
            
            return $customers;
        }
        
        throw new \tabs\client\Exception(
            $customersIndex,
            'Unable to fetch customers'
        );
    }
    
    // -------------------------- Public Functions -------------------------- //
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'customer';
    }
}