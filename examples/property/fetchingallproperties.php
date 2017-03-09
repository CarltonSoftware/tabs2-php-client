<?php

require_once __DIR__ . '/../creating-a-new-connection.php';

$collection = tabs\apiclient\Collection::factory(
    'property',
    new \tabs\apiclient\Property
);
$collection->getPagination()->addParameter('fields', 'id')
    ->addFilter('statusid', '1|2')
    ->setLimit(1);
$collection->fetch();

foreach ($collection as $property) {
    $key = __DIR__ . '/../cache/' . $property->getId();
    if (!file_exists($key) || filemtime($key) < strtotime('-30 minutes')) {
        if (file_exists($key)) {
            unlink($key);
        }
        $property->get();
        file_put_contents($key, serialize($property));
    } else {
        $property = file_get_contents($key);
    }
}

echo $collection->getTotal();

require_once __DIR__ . '/../finally.php';