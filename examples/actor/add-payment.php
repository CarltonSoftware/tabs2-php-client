<?php

/**
 * This file documents how to add an actor payment with the Plato API.
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2013 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

try {

    if ($id = filter_input(INPUT_GET, 'id')) {
        
        $customer = new tabs\apiclient\Customer($id);
        $customer->get();
        
        $payment = new \tabs\apiclient\actor\Payment();
        $payment->setParent($customer);
        $payment->setAmount(10);
        
        // Get the payment methods
        $paymentMethods = \tabs\apiclient\Collection::factory(
            'paymentmethod',
            new \tabs\apiclient\PaymentMethod()
        );
        
        // Request payment methods and find the checque payment for this example
        $cheque = $paymentMethods->fetch()->findBy(function($ele) {
            return $ele->getPaymentmethod() == 'C';
        })->first();
        
        $payment->setMethod($cheque);
        
        // Do the same for currency
        $currencies = \tabs\apiclient\Collection::factory(
            'currency',
            new \tabs\apiclient\Currency()
        );
        $gbp = $currencies->fetch()->findBy(function($ele) {
            return $ele->getCode() == 'GBP';
        })->first();
        
        $payment->setCurrency($gbp);
        
        $payment->create();
        
        header('Location: index.php?id=' . $customer->getId());
        
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}