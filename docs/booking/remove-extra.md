# Removing an extra

This file documents how to remove an extra from a booking.

```php

try {
    if (filter_input(INPUT_GET, 'id')
        && filter_input(INPUT_GET, 'beid')
    ) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
        $extra = new \tabs\apiclient\booking\Extra(filter_input(INPUT_GET, 'beid'));
        $extra->setParent($b);
        $extra->get();
        $extra->setQuantity(0);
        $extra->update();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
