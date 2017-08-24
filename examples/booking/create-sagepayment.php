<?php

/**
 * @name Creating a sagepay payment
 * 
 * This file documents how to create a sagepay payment and add it to a booking.
 * 
 * The tabs api uses SagePay Server to create an iframe url and return it to you.  
 * 
 * You will need to provide two callback urls to handle success and failed payments.
 * 
 * Card surcharges are handled from within tabs, there is no need to add one on separately.
 */

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

    // Get the address of the customer.  If you do not have one, you can provide an empty Actor Address object.
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