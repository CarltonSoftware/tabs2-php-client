<?php

namespace tabs\apiclient;

/**
 * Tabs Rest API PayPal object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class PaypalPayment extends PaymentSystemPayment
{
    /**
     * @return string
     */
    public function getCreateStub()
    {
        return 'paypalpayment';
    }
}