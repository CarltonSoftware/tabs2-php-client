<?php

/**
 * @name Creating a provisional booking.
 * 
 * This file documents how to add a provisional booking status to a booking.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking($id);
        $b->get();
    // Get the tabs user.  In this case, I'm getting
    // it from the connection credentials
    $user = \tabs\apiclient\client\Client::getClient()->whoami();

    // Create a new provisional booking and set the
    // tabs user
    $prov = new \tabs\apiclient\ProvisionalBooking();
    $prov->setTabsuser($user);

    // Add provisional to booking and update
    $b->setProvisionalbooking($prov);
    $b->update();

    header('Location: index.php?id=' . $b->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';