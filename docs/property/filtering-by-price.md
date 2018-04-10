# Filtering by price

In this example we're going to filter properties by their brochure price.

You can use the `=`, `>`, `<` and `/` operators with this filter.

The `brochureprice` filter will search for properties which are available at a certain date.  

If a `fromdate` filter is not provided, then the the current date will be used.

```php

try {
    // Get a list of brandings
    $brandings = \tabs\apiclient\Collection::factory(
        'branding',
        new tabs\apiclient\Branding()
    );
    $brandings->fetch();

    // Search for all live properties which have 500 or less as their brochure price
    $collection = tabs\apiclient\Collection::factory(
        'property',
        new \tabs\apiclient\Property
    );

    $collection->addFilter('brandingid', $brandings->first()->getId())
        ->addFilter('brandingstatusid', 1)

        // NOTE: The brochureprice filter/field will return zero if a price can't
        // be found so you will need to either to a greater than zero or between
        // check to find a price.

        //->addFilter('brochureprice', '1/1000');
        ->addFilter('brochureprice', '>0');

    $collection->fetch();

    echo '<p>' . $collection->getTotal() . ' found with the price less than 500.</p>';

} catch(Exception $e) {
    echo $e->getMessage();
}

```