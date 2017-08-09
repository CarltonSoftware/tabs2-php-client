# Adding a customer to a booking

This file documents how to add a customer to a Booking object.  You will need to create a new BookingCustomer as detailed in the booking below.

This example also demonstrates how to update the potential booking type.

```php

try {
    if ($id = filter_input(INPUT_GET, 'id')) {

        $b = new tabs\apiclient\Booking($id);
        $b->get();
        
        $bc = new tabs\apiclient\booking\Customer();
        $bc->setParent($b);
        
        $customers = tabs\apiclient\Collection::factory(
            'customer',
            new \tabs\apiclient\Customer()
        );
        $customers->getPagination()->addFilter('surname', 'smith')->setLimit(1);
        $customers->fetch();
        if ($customers->getTotal() > 0) {
            $customer = $customers->first();
            $bc->setCustomer($customer);
        
            $bc->create();
        }
        
        if ($b->getPotentialbooking()) {
            $b->getPotentialbooking()->setType('BookingInProgress');
            $b->update();
        }
        
        header('Location: index.php?id=' . $b->getId());
        exit();

    }

} catch(Exception $e) {
    echo $e->getMessage();
}

```
