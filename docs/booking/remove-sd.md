# Removing a security deposit

This file documents how to remove a security deposit from a booking.

```php

try {
    if (filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
        $b->get();

        if ($b->getSecuritydeposit()) {
            $b->getSecuritydeposit()->delete();
        }
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
