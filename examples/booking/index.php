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
        
            if (!$booking->isProvisional()) {
                ?>
            <p><a href="provisional-booking.php?id=<?php echo $booking->getId(); ?>">Create provisional booking</a></p>
                <?php
            }
        
            if (!$booking->isConfirmed() && $booking->isProvisional()) {
                ?>
            <p><a href="confirm-booking.php?id=<?php echo $booking->getId(); ?>">Create confirmed booking</a></p>
                <?php
            }
        
            if ($booking->getCustomers()->count() == 0) {
                ?>
            <p><a href="add-customer.php?id=<?php echo $booking->getId(); ?>">Add booking customer</a></p>
                <?php
            }
        
            if ($booking->getGuests()->count() == 0) {
                ?>
            <p><a href="add-guests.php?id=<?php echo $booking->getId(); ?>">Add booking guest</a></p>
                <?php
            }
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