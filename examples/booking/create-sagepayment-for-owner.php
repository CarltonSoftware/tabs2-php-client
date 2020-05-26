<?php

/**
 * @name Creating a payment for an owner
 * 
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $o = new tabs\apiclient\Owner($id);
        $o->get();
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

    $sp = new tabs\apiclient\SagePayPayment();
    $sp->setAmount(10)
        ->setOwner($o);

    // Get the address of the customer.  If you do not have one, you can provide an empty Actor Address object.
    $addresses = $o->getContactdetails()->findBy(function($ele) {
        return $ele instanceof \tabs\apiclient\actor\Address;
    });

    $base = getBaseUrl();

    $sp->setAddress($addresses->first())
        ->setCurrency($gbp)
        ->setPaymentmethod($card)

        // Set the payment type or be either DEFERRED or PAYMENT.
        // DEFERRED payments need to be released and will not take payment.
        ->setPaymenttype('PAYMENT')

        // Set the callback url so that you can be notified of the confirmed payment
        ->setCallbackurl($base . 'thank-you-for-your-payment.php?id=' . $o->getId())
        ->setFailureurl($base . 'whoops.php?id=' . $o->getId());

    echo $sp->create();

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';