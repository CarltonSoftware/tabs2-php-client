# Cancelling a booking

Should you wish to cancel a booking, you can with the code below.

```php

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking($id);
        $b->get();
        
        // Create a new confirm booking and set the
        // tabs user
        $canc = new \tabs\apiclient\CancelledBooking();
        $canc->setReason('test booking');
        
        // Add provisional to booking and update
        $b->setCancelledbooking($canc);
        $b->update();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
