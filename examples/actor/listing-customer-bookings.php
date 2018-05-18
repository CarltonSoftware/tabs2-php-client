<?php

/**
 * @name Listing bookings
 * 
 * This example demonstrates how to find bookings for a given actor.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {

    $collection = \tabs\apiclient\Collection::factory(
        'booking',
        new \tabs\apiclient\Booking
    );
    $collection->setLimit(filter_input(INPUT_GET, 'limit'))
        ->setPage(filter_input(INPUT_GET, 'page'))

        // The actorid filter will find bookings for the given actor.
        // So using an owner, supplier or customer id will return
        // any bookings that they are associated with
        ->addFilter('actorid', $id)

        // Order by the booking id
        ->getPagination()
            ->addOrder('id', 'desc');

    // Fetch
    $collection->fetch();

    include __DIR__ . '/../collection.php';
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';