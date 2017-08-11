# Adding pets to a booking

This file documents how to add pets onto a booking

```php

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking($id);
        $b->get();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
    

```
