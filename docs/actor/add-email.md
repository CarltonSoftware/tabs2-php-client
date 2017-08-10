# Adding an email

This example shows how to add an email to a customer.

```php

try {

    if ($id = filter_input(INPUT_GET, 'id')) {
        
        $customer = new tabs\apiclient\Customer($id);
        $customer->setEmail('test@test.com');
        
        header('Location: index.php?id=' . $customer->getId());
        exit();
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}

```
