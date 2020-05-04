<?php

/**
 * @name This file documents how to get create a new event log.
 * 
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    $eventLog = new \tabs\apiclient\EventLog();
    $eventLog->setType('Booking');
    $eventLog->setEventdatetime(new \DateTime);
// add eventtype
$eventType = new \tabs\apiclient\EventType(1);
$eventType->get();
$eventLog->setEventtype($eventType);

// add event booking
$booking = new \tabs\apiclient\Booking(4477297);
$booking->get();
$eventLog->setBooking($booking);

$eventLog->create();
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';