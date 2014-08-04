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

namespace tabs\core;

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
 * @method tabs\core\LegalEntity getLegalentity()
 *
 * @method void                  setLegalentity(tabs\core\LegalEntity $legalentity)
 *
 */

class Customer extends Actor
{
    /**
     * LegalEntity
     *
     * @var Legalentity
     */
    protected $legalentity;

    // ------------------ Static Functions --------------------- //

    /**
     * Creates a basic customer object with a title and surname
     *
     * @param string $title   Customer Title
     * @param string $surname Customer Surname
     *
     * @return \tabs\core\Customer
     */
    public static function factory($title, $surname)
    {
        $customer = new Customer();
        $legalentity = new LegalEntity();
        $legalentity->setTitle($title);
        $legalentity->setSurname($surname);
        $customer->setLegalentity($legalentity);

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
        $customerRequest = \tabs\client\ApiClient::getApi()->get(
            "/customer/{$reference}"
        );

        if ($customerRequest
            && $customerRequest->status == 200
            && $customerRequest->response != ''
        ) {
            return self::createFromNode($customerRequest->response);
        } else {
            throw new \tabs\client\ApiException(
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
        $customer = self::factory('', '');
        self::flattenNode($customer->getLegalentity(), $node);

        return $customer;
    }
}