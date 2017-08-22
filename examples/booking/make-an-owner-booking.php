<?php

/**
 * @name Making an owner booking
 * 
 * This file documents how to create a new owner booking.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'fromdate') 
        && $pi = filter_input(INPUT_GET, 'propertyid')
    ) {
        $nights = filter_input(INPUT_GET, 'nights') ? filter_input(INPUT_GET, 'nights') : 7;
        $b = new tabs\apiclient\Booking();
        $from = new \DateTime(filter_input(INPUT_GET, 'fromdate'));
        $to = clone $from;
        $to->add(new \DateInterval('P' . $nights . 'D'));
        $b->setFromdate($from)
            ->setTodate($to)
            ->setProperty(array('id' => $pi))
            ->setGuesttype('Owner');
    // Optionally you can state its a web booking
    $webbooking = new tabs\apiclient\WebBooking();
    $b->setWebbooking($webbooking);

    $b->create();

    header('Location: index.php?id=' . $b->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';