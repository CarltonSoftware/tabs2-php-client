# This example demonstrates how to add a new event type

```php
try {
    $eventType = new \tabs\apiclient\EventType();

    $eventType->setEventtype('Booking T&Cs accepted');
    $eventType->setAppliestobooking(true);

    $eventType->create();
} catch (Exception $e) {
    echo $e->getMessage();
}
```