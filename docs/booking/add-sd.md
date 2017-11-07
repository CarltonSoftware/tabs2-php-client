# Add a security deposit

This file documents how to remove a security deposit from a booking.

```php

try {
    if (filter_input(INPUT_GET, 'id')
        && filter_input(INPUT_GET, 'psdid')
    ) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
        
        $bs = new \tabs\apiclient\booking\SecurityDeposit();
        $bs->setParent($b);
        $bs->setPropertysecuritydeposit(new \tabs\apiclient\property\SecurityDeposit(filter_input(INPUT_GET, 'psdid')));
        
        $bs->create();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
