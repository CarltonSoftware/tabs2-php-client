# Creating a booking

This file documents how to create a new booking.

Its useful for customer bookings to have a potential booking type associated with them.  In this example the type is Enquiry.

You can get a list of potential booking types from the [common data in the api](/core).

```php

try {
    if ($id = filter_input(INPUT_GET, 'fromdate') 
        && $pbi = filter_input(INPUT_GET, 'propertybrandingid')
    ) {
        $nights = filter_input(INPUT_GET, 'nights') ? filter_input(INPUT_GET, 'nights') : 7;
        $b = new tabs\apiclient\Booking();
        $from = new \DateTime(filter_input(INPUT_GET, 'fromdate'));
        $to = clone $from;
        $to->add(new \DateInterval('P' . $nights . 'D'));
        $b->setFromdate($from)
            ->setTodate($to)
            ->setPropertyBranding(array('id' => $pbi))
            ->setAdults(1)
            ->setPets(0);
        
        // Create a new potential booking
        // You could also create a provisional booking too.
        $potentialBooking = new \tabs\apiclient\PotentialBooking();
        $potentialBooking->setType('Enquiry');
        $b->setPotentialbooking($potentialBooking);
        
        $webbooking = new tabs\apiclient\WebBooking();
        $b->setWebbooking($webbooking);
        
        $b->create();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
