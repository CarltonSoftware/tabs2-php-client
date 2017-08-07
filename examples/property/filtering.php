<?php

/**
 * @name Filtering properties
 * 
 * In this example we're going to filter properties by using tabs2's filter syntax.
 * 
 * You will find all of the filter keywords in the [root](../root) endpoint.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
// First example, fetch a list of live properties

// Get a list of brandings and statuses
$brandings = \tabs\apiclient\Collection::factory(
    'branding',
    new tabs\apiclient\Branding()
);
$brandings->fetch();
$statuses = \tabs\apiclient\Collection::factory(
    'status',
    new tabs\apiclient\Status()
);
$statuses->fetch();

// Search for all live properties on the first branding found
$collection = tabs\apiclient\Collection::factory(
    'property',
    new \tabs\apiclient\Property
);
$collection->addFilter('brandingid', $brandings->first()->getId())
    ->addFilter('brandingstatusid', 1);
$collection->fetch();
} catch(Exception $e) {
    echo $e->getMessage();
}
try {
// Second example, we'll filter the collection again but search for
// properties that sleep 2 or more and which accept pets

$collection->addFilter('sleeps', '>2')
    ->addFilter('maximumpets', '>1');
$collection->fetch();
} catch(Exception $e) {
    echo $e->getMessage();
}
try {
// Third example, we'll filter the collection again but search for
// either the first boolean attribute is ticked or the second is ticked.
// This demonstrates the OR based search functionality.

$collection->addFilter('sleeps', '>2')
    ->addFilter('maximumpets', '>1')
    ->addFilter('attribute1', 'true')
    ->addFilter('brandingid', $brandings->first()->getId(), 1)
    ->addFilter('brandingstatusid', 1, 1)
    ->addFilter('sleeps', '>2', 1)
    ->addFilter('maximumpets', '>1', 1)
    ->addFilter('attribute2', 'true', 1);
$collection->fetch();
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';