<?php

/**
 * @name Getting event log data
 * 
 * This file documents how to get information on event logs.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    $collection = \tabs\apiclient\Collection::factory(
        'eventlog',
        new \tabs\apiclient\EventLog
    );
$collection->fetch();

include __DIR__ . '/../collection.php';
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';