<?php

/**
 * @name Getting special offer data
 * 
 * This file documents how to get information on special offers.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    $collection = \tabs\apiclient\Collection::factory(
        'specialoffer',
        new \tabs\apiclient\SpecialOffer
    );
$collection->fetch();

include __DIR__ . '/../collection.php';
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';