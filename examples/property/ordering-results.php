<?php

/**
 * @name Ordering results
 * 
 * In this example we're going to order properties by using tabs2's order syntax.
 * 
 * Ordering can be added to a search by adding an order string to the the pagination class using the addOrder method.
 * 
 * The following strings are supported:
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
// First example, fetch a list of live properties

// Get a list of brandings
$brandings = \tabs\apiclient\Collection::factory(
    'branding',
    new tabs\apiclient\Branding()
);
$brandings->fetch();

// Search for all live properties on the first branding found
$collection = tabs\apiclient\Collection::factory(
    'property',
    new \tabs\apiclient\Property
);
$collection->addFilter('brandingid', $brandings->first()->getId())
    ->addFilter('brandingstatusid', 1)
    ->getPagination()
        ->addOrder('sleeps')
        ->addOrder('bedrooms') // Apply sleeps and bedrooms in ascending order

        ->setSearchId(rand(0, 1000)); // Add a seed

$collection->fetch();

echo '<p>Live properties filter</p>';
echo '<p>' . $collection->getTotal() . ' found</p>';
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';