# Performing an enquiry with a search
In this example we're going to use a special field to do a booking enquiry when performing a property search.

The enquiry field when specified will perform a booking enquiry when a fromdate filter is supplied.  In the following
example, we'll use a relative date so the example will always be up to date.

NOTE: By default the enquiry field is not returned.  You need to specify and fetch it in a separate api call.

```php

try {


    // Create a property collection to get a subset of tabs properties
    $collection = tabs\apiclient\Collection::factory(
        'property',
        new \tabs\apiclient\Property
    );

    // Define what properties we want to get
    $collection

         // Add the branding status id filter to only return live properties (1 signifies a 'Live' status)
        ->addFilter('brandingstatusid', 1)

        // Add the fromdate filter.  In this example we'll search for properties available 2 weeks from now
        ->addFilter('fromdate', '+2 weeks')

        // As we are perfoming a 'web' search, we'll need to exclude properties which have their allowbookingonwebuntildate date
        // set to less than our from date
        ->addFilter('allowbookingonwebuntildate', '>+2 weeks')

        // Optionally we can add the number of nights (the default is 7 however)
        ->addFilter('nights', 7)

        // Optionally add in a plusminus filter to search for availability +/- x number days.
        // Plus minus is limited to a maximum of 5 in the tabs2 api.
        // The enquiry field will use this as well to try to find another price if it doesn't find one on
        // the fromdate supplied.
        ->addFilter('plusminus', 4)

        // Add the changedayrules filter to only return properties which allow bookings in this period.
        // Setting false or not adding this filter here would mean that all 'available' properties
        // will be returned instead of just 'bookable' properties.
        ->addFilter('changedayrules', true)

        // We can continue to add in additional filters here if required
        // ->addFilter('sleeps', '>2')
        // ->addFilter('attribute1', 'true')...etc

        // Set the fields to only return the property id, reference, name and enquiry fields.
        ->setFields([
            'id',
            'enquiry',
            'tabspropref',
            'name'
        ])

        // Access the pagination class to add an order and search id
        ->getPagination()

            // Add sleeps order
            ->addOrder('sleeps', 'asc')

            // Finally add a search seed to persist the order througout pages
            ->setSearchId(1);

        // Fetch collection
        $collection->fetch();
        
        // Output title
        echo '<h1>' . $collection->getTotal() . ' found</h1>';

        // Fetch the collection and iterate through the results
        foreach ($collection as $property) {
            echo '<p>' . $property->getName() . ' (' . $property->getTabspropref() . ')</p>';
            $enq = $property->getEnquiry();

            // The enquiry returned will be a \tabs\apiclient\BookingEnquiry object
            if ($enq instanceof tabs\apiclient\BookingEnquiry) {
                echo '<ul><li>Enquiry:';
                if ($enq->getBookingok() && $enq->getWebbookingok() && $enq->getPriceok()) {
                    echo '<ul>';
                    echo '<li>From: ' . $enq->getFromdate()->format('jS F Y') . '</li>';
                    echo '<li>Nights: ' . $enq->getNights() . '</li>';
                    echo '<li>Standard price: ' . $enq->getStandardPrice() . '</li>';
                    echo '</ul>';
                } else {
                    echo 'Not valid';
                }
                echo '</li></ul>';
            }
        }

} catch(Exception $e) {
    echo $e->getMessage();
}

```