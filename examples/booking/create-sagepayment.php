<?php

/**
 * This file documents how to create a sagepay payment
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
        $b = new tabs\apiclient\Booking($id);
        $b->get();
        
        // Get the payment methods
        $paymentMethods = \tabs\apiclient\Collection::factory(
            'paymentmethod',
            new \tabs\apiclient\PaymentMethod()
        );
        
        // Request payment methods and find the card payment for this example
        $card = $paymentMethods->fetch()->findBy(function($ele) {
            return $ele->getPaymentmethod() == 'R';
        })->first();
        
        // Do the same for currency
        $currencies = \tabs\apiclient\Collection::factory(
            'currency',
            new \tabs\apiclient\Currency()
        );
        $gbp = $currencies->fetch()->findBy(function($ele) {
            return $ele->getCode() == 'GBP';
        })->first();
        
        $customer = $b->getCustomers()->first()->getCustomer();
        $sp = new tabs\apiclient\SagePayPayment();
        $sp->setAmount(10)
            ->setCustomer($customer)
            ->setBooking($b);
        
        $addresses = $customer->getContactdetails()->findBy(function($ele) {
            return $ele instanceof \tabs\apiclient\actor\Address;
        });
        
        $sp->setAddress($addresses->first())
            ->setCurrency($gbp)
            ->setPaymentmethod($card)
                
            // Set the payment type or be either DEFERRED or PAYMENT.
            // DEFERRED payments need to be released and will not take payment.
            ->setPaymenttype('DEFERRED')
                
            // Set the callback url so that you can be notified of the confirmed payment
            ->setCallbackurl('http://localhost/platoclient/booking/thank-you-for-your-payment.php?id=' . $b->getId())
            ->setFailureurl('http://localhost/platoclient/booking/whoops.php?id=' . $b->getId());
        
        echo $sp->create();
        
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';