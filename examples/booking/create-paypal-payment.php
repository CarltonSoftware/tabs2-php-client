<?php

/**
 * @name Creating a paypal payment
 * 
 * This file documents how to create a paypal payment and add it to a booking.
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
    $pp = new tabs\apiclient\PaypalPayment();
    $pp->setAmount(10)
        ->setBookingamount(10)
        ->setBooking($b);

    $base = getBaseUrl();

    $pp->setCurrency($gbp)
        ->setPaymentmethod($card)

        // Set the callback url so that you can be notified of the confirmed payment
        ->setCallbackurl($base . 'thank-you-for-your-payment.php?id=' . $b->getId())
        ->setFailureurl($base . 'whoops.php?id=' . $b->getId());

    echo $pp->create();

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';