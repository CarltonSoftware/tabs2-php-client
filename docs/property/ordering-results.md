# Ordering results
In this example we're going to order properties by using tabs2's order syntax.

Ordering can be added to a search by adding an order string to the the pagination class using the addOrder method.

The following strings are supported:

 - sleeps,
 - tabspropref,
 - name
 - bedrooms
 - maximumpets
 - id
 - stars
 - rating
 - attributeX (where x is the attribute id)
 - promote
 - price (note, this is just done on the MAX weekly price)

By default ascending order is applied.  If you want to apply decending order you can append '_desc' to the end of the parameter.

In addition to ordering results a seed can be applied to the search so that results can be randomly sorted (in addition to any order you may apply) so that different results can be shown to users whilst maintaining a persistent order throughout pages.

It is recommended to store the seed in a session or cookie so that it is persisted for the user.

```php

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

```