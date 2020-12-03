<?php

namespace tabs\apiclient;
use tabs\apiclient\Base;

/**
 * Tabs Rest API SagePayPayment object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class SagePayPayment extends PaymentSystemPayment
{
    /**
     * Return the payment details from the sagepay api
     *
     * @return stdClass
     */
    public function getDetails()
    {
        return self::getJson(
            \tabs\apiclient\client\Client::getClient()->get(
                $this->getUpdateUrl() . '/detail'
            )
        );
    }

    /**
     * Release the payment
     *
     * @return \tabs\apiclient\SagePayPayment
     */
    public function releasePayment()
    {
        \tabs\apiclient\client\Client::getClient()->put(
            $this->getUpdateUrl() . '/release'
        );

        return $this;
    }

    /**
     * @return string
     */
    public function getCreateStub()
    {
        return 'ecommercepayment';
    }
}