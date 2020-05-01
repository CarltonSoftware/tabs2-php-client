<?php

/**
 * @name Getting event type data
 * 
 * This file documents how to get information on event types.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    $collection = \tabs\apiclient\Collection::factory(
        'eventtype',
        new \tabs\apiclient\EventType
    );
$collection->fetch();

include __DIR__ . '/../collection.php';
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';