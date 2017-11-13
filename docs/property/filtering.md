# Filtering properties
In this example we're going to filter properties by using tabs2's filter syntax.

You will find all of the filter keywords in the [root](../root) endpoint.

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
        ->addFilter('brandingstatusid', 1);
    $collection->fetch();

    echo '<p>Live properties filter</p>';
    echo '<p>' . $collection->getTotal() . ' found</p>';

} catch(Exception $e) {
    echo $e->getMessage();
}

```



```php

try {

    // Second example, we'll filter the collection again but search for
    // properties that sleep 2 or more and which accept pets

    $collection->addFilter('sleeps', '>2')
        ->addFilter('maximumpets', '>1');
    $collection->fetch();

    echo '<p>...sleeping 2 or more with a pet</p>';
    echo '<p>' . $collection->getTotal() . ' found</p>';

} catch(Exception $e) {
    echo $e->getMessage();
}

```



```php

try {

    // Third example, we'll filter the collection again but search for
    // either the first boolean attribute is ticked or the second is ticked.
    // This demonstrates the OR based search functionality.

    $collection->addFilter('attribute1', 'true')
        ->addFilter('brandingid', $brandings->first()->getId(), 1)
        ->addFilter('brandingstatusid', 1, 1)
        ->addFilter('sleeps', '>2', 1)
        ->addFilter('maximumpets', '>1', 1)
        ->addFilter('attribute2', 'true', 1);
    $collection->fetch();

    echo '<p>...with attribute 1 or 2 ticked</p>';
    echo '<p>' . $collection->getTotal() . ' found</p>';

    // Get the facets for the property collection
    $facets = new tabs\apiclient\FacetCollection();
    $facets->setFilters($collection->getFilters())
        
        // If you wish to look for attributes, you will need to
        // specify which attributes you need to facet
        ->addFacetAttribute(new \tabs\apiclient\AttributeBoolean(1))
        
        // Fetch the facets
        ->fetch();
    
    // Sleeps, bedrooms and pets you will get by default
    foreach ($facets->getSleeps() as $sleep) {
        echo '<p>...containing ' . $sleep->getAmount() . ' properties which sleeps ' . $sleep->getValue() . '</p>';
    }
    foreach ($facets->getBedrooms() as $bed) {
        echo '<p>...containing ' . $bed->getAmount() . ' properties which has ' . $bed->getValue() . ' bedrooms</p>';
    }
    foreach ($facets->getPets() as $pet) {
        echo '<p>...containing ' . $pet->getAmount() . ' properties allows ' . $pet->getValue() . ' pets</p>';
    }
    
    // Get a collection of attributes.  We are assuming in this example that the
    // attribute with id of 1 is a BooleanAttribute.  You will need to
    // use the correct attribute object however.
    $attr1 = $facets->getAttributeFacets(new \tabs\apiclient\AttributeBoolean(1));
    echo '<p>...also...found ' . $attr1->first()->getAmount() . ' properties which have the ' . $attr1->first()->getEntity()->getName() . ' attribute.</p>';


} catch(Exception $e) {
    echo $e->getMessage();
}

```