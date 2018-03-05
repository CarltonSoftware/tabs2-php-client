# Creating a new customer

This example demonstrates how to create a new customer.

```php

try {
   
    $c = new \tabs\apiclient\Customer();
    $c->setSurname('Smith')
        ->setFirstname('Test')
        ->setTitle('Mr')
        
        // Set to inactive to remove from lists in tabs.
        ->setInactive(true); 

    $c->create();

    header('Location: index.php?id=' . $c->getId());
    exit();

} catch(Exception $e) {
    echo $e->getMessage();
}

```