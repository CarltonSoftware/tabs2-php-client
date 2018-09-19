<?php

/**
 * @name Adding an extra to a booking
 * 
 * This file documents how to add an extra onto a a Booking.  
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if (filter_input(INPUT_GET, 'id')
        && filter_input(INPUT_GET, 'eid')
    ) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
        $b->get();
    $extra = new \tabs\apiclient\Extra(filter_input(INPUT_GET, 'eid'));
    $extra->get();

    $bookingExtra = $b->checkExtra($extra);
    $bookingExtra->create();

    header('Location: index.php?id=' . $b->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';