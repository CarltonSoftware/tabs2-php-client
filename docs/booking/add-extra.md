# Adding an extra to a booking

This file documents how to add an extra onto a a Booking.  

The checkExtra method will throw an exception if the specified extra is not valid for the booking.

```php

try {
    if (filter_input(INPUT_GET, 'id')
        && filter_input(INPUT_GET, 'eid')
    ) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
        $b->get();
        
        $extra = new \tabs\apiclient\Extra(filter_input(INPUT_GET, 'eid'));
        $extra->get();
        
        $bookingExtra = $b->checkExtra($extra);
        $bookingExtra->create();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
