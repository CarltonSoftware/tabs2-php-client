# Adding a guest to a booking

This file documents how to add guests to a Booking object

```php

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking($id);
        $b->get();
        
        $bg = new tabs\apiclient\booking\Guest();
        $bg->setName('Joe Bloggs')
            ->setAge(30)
            ->setType('Adult');
        $bg->setParent($b);
        
        $bg->create();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
