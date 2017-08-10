<?php

/**
 * @name Removing a security deposit
 * 
 * This file documents how to remove a security deposit from a booking.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if (filter_input(INPUT_GET, 'id')
        && filter_input(INPUT_GET, 'bsid')
    ) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
    $bs = new \tabs\apiclient\booking\SecurityDeposit(filter_input(INPUT_GET, 'bsid'));
    $bs->setParent($b);

    $bs->get();

    $bs->delete();

    header('Location: index.php?id=' . $b->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';