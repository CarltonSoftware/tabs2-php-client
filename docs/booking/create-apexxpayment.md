# Creating a apexx payment

This file documents how to create a apexx payment and add it to a booking.

The tabs api uses Apexx Server to create an iframe url and return it to you.

You will need to provide a callback url to handle the result.

```php

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
        $sp = new tabs\apiclient\ApexxPayment();
        $sp->setAmount(10)
            ->setBookingamount(10)
            ->setCustomer($customer)
            ->setBooking($b);

        // Get the address of the customer.  If you do not have one, you can provide an empty Actor Address object.
        $addresses = $customer->getContactdetails()->findBy(function($ele) {
            return $ele instanceof \tabs\apiclient\actor\Address;
        });

        $base = getBaseUrl();

        $sp->setAddress($addresses->first())
            ->setCurrency($gbp)
            ->setPaymentmethod($card)

            // Set the payment type or be either DEFERRED or PAYMENT.
            // DEFERRED payments need to be released and will not take payment.
            ->setPaymenttype('DEFERRED')

            // Set the callback url so that you can be notified of the confirmed payment
            ->setCallbackurl($base . 'thank-you-for-your-payment.php?id=' . $b->getId())
            ->setFailureurl($base . 'whoops.php?id=' . $b->getId());

        echo $sp->create();

    }

} catch(Exception $e) {
    echo $e->getMessage();
}


```
