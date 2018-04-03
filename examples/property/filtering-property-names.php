<?php

/**
 * @name Filtering property names
 * 
 * In this example we're going to filter properties by their name by using tabs2's filter syntax.
 * 
 * You will find all of the filter keywords in the [root](../root) endpoint.
 * 
 * In the following example we use the tilda operator to do a 'like' comparison
search on a property name.  You could use a similar syntax on any string field
such as address fields like `town`, `line1...3`, `county` and `postcode`. 
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
$name = 'Cottage';

// Get a list of brandings
$brandings = \tabs\apiclient\Collection::factory(
    'branding',
    new tabs\apiclient\Branding()
);
$brandings->fetch();

// Search for all live properties on the first branding found use the
// wildcard name filter.
$collection = tabs\apiclient\Collection::factory(
    'property',
    new \tabs\apiclient\Property
);
$collection->addFilter('brandingid', $brandings->first()->getId())
    ->addFilter('brandingstatusid', 1)
    ->addFilter('name', '~' . $name);

$collection->fetch();

echo '<p>' . $collection->getTotal() . ' found with Cottage in its name.</p>';
} catch(Exception $e) {
    echo $e->getMessage();
}
try {
$name = 'Cottage';

// Get a list of brandings
$brandings = \tabs\apiclient\Collection::factory(
    'branding',
    new tabs\apiclient\Branding()
);
$brandings->fetch();

// Search for all live properties on the first branding found with the
// globalsearchterm filter.
$collection = tabs\apiclient\Collection::factory(
    'property',
    new \tabs\apiclient\Property
);

$collection->addFilter('brandingid', $brandings->first()->getId())
    ->addFilter('brandingstatusid', 1)
    ->addFilter('globalsearchterm', '~' . $name);

$collection->fetch();

echo '<p>' . $collection->getTotal() . ' found with Cottage in its name.</p>';
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';