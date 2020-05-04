# Get a list of events

```php
try {
    $collection = \tabs\apiclient\Collection::factory(
        'eventlog',
        new \tabs\apiclient\EventLog
    );
$collection->fetch();

include __DIR__ . '/../collection.php';
} catch(Exception $e) {
    echo $e->getMessage();
}
```