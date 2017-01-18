<?php

/**
 * This file documents how to read a Booking objects from the Plato API.
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2013 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {

        $booking = new \tabs\apiclient\Booking($id);
        $booking->get();
        
        ?>
            <h2>Booking: <?php echo $booking->getId(); ?></h2>
            <p>From: <?php echo $booking->getFromdate()->format('Y-m-d'); ?></p>
            <p>To: <?php echo $booking->getTodate()->format('Y-m-d'); ?></p>
            <p>Booked: <?php echo $booking->getBookeddatetime()->format('Y-m-d H:i:s'); ?></p>
            <p>Property: <?php echo $booking->getProperty()->getName(); ?></p>
        <?php
        
        $collection = $booking->getSuppliers();

        include __DIR__ . '/../collection.php';
        
        $collection = $booking->getExtras();

        include __DIR__ . '/../collection.php';
        
    } else {

        $collection = tabs\apiclient\Collection::factory(
            'booking',
            new \tabs\apiclient\Booking
        );
        $collection->setLimit(filter_input(INPUT_GET, 'limit'))
            ->setPage(filter_input(INPUT_GET, 'page'))
            ->fetch();

        include __DIR__ . '/../collection.php';
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';