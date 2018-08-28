<?php

/**
 * @name Retrieving an available breaks price
 * 
 * This file demonstrates how to get a single price from the available breaks endpoint.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
    if (filter_input(INPUT_GET, 'fromdate')) {
        $fromDate = new \DateTime(filter_input(INPUT_GET, 'fromdate'));
    } else {
        $fromDate = new \DateTime();
    }

    $days = 7;
    if (filter_input(INPUT_GET, 'days')) {
        $days = intval(filter_input(INPUT_GET, 'days'));
    }

    $property = new \tabs\apiclient\Property($id);

    // This method will return the brochure price without any discounts.
    echo $property->getAvailableBreaksPrice($fromDate, $days);

    // Note: To get all available breaks use the 
    // Property::getAvailablebreaks() method.

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';