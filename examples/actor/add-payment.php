<?php

/**
 * @name Adding a payment to a customer
 * 
 * This file documents how to add an actor payment with the Plato API.
 * 
 * If you have taken funds outside of tabs, you can add the funds to an actor account with the following method.
 */

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

    // Request payment methods and find the cheque payment for this example
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
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';