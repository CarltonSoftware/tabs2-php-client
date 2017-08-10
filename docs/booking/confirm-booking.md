# Confirming a booking

This file documents how to confirm Booking objects from the Plato API.

```php

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking($id);
        $b->get();
        
        // Get the tabs user.  In this case, I'm getting
        // it from the connection credentials
        $user = \tabs\apiclient\client\Client::getClient()->whoami();
        
        // Create a new confirm booking and set the
        // tabs user
        $conf = new \tabs\apiclient\ConfirmedBooking();
        $conf->setConfirmedbytabsuser($user);
        
        // Add provisional to booking and update
        $b->setConfirmedbooking($conf);
        $b->update();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
