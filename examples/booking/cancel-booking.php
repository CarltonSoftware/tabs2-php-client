<?php

/**
 * @name Cancelling a booking
 * 
 * Should you wish to cancel a booking, you can with the code below.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking($id);
        $b->get();
    // Create a new cancelled booking object and set the
    // tabs user
    $canc = new \tabs\apiclient\CancelledBooking();
    $canc->setReason('test booking');

    // Add provisional to booking and update
    $b->setCancelledbooking($canc);
    $b->update();

    header('Location: index.php?id=' . $b->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';