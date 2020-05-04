<?php

/**
 * @name This example demonstrates how to add a new event type
 * 
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    $eventType = new \tabs\apiclient\EventType();
$eventType->setEventtype('Booking T&Cs accepted');
$eventType->setAppliestobooking(true);

$eventType->create();
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';