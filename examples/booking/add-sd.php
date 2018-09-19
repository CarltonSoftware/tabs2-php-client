<?php

/**
 * @name Add a security deposit
 * 
 * This file documents how to add a security deposit from a booking.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if (filter_input(INPUT_GET, 'id')
        && filter_input(INPUT_GET, 'psdid')
    ) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
    $bs = new \tabs\apiclient\booking\SecurityDeposit();
    $bs->setParent($b);
    $bs->setPropertysecuritydeposit(new \tabs\apiclient\property\SecurityDeposit(filter_input(INPUT_GET, 'psdid')));

    $bs->create();

    header('Location: index.php?id=' . $b->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';