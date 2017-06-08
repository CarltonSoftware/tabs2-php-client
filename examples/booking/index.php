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
            <h2>Booking: <?php echo $booking->getId(); ?> <a href="<?php echo $booking->getTabs2Url(); ?>" target="_blank">view</a></h2>
            <p>From: <?php echo $booking->getFromdate()->format('Y-m-d'); ?></p>
            <p>To: <?php echo $booking->getTodate()->format('Y-m-d'); ?></p>
            <p>Booked: <?php echo $booking->getBookeddatetime()->format('Y-m-d H:i:s'); ?></p>
            <p>Property: <?php echo $booking->getProperty()->getName(); ?></p>
            <p>Status: <?php echo $booking->getStatus(); ?>
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
            } else {
                ?>
            <p>Customer: <?php echo $booking->getCustomers()->first()->getCustomer()->getFullname(); ?>
                <?php
            }
        
            if ($booking->getGuests()->count() == 0) {
                ?>
            <p><a href="add-guests.php?id=<?php echo $booking->getId(); ?>">Add booking guest</a></p>
                <?php
            }
            
            echo '<h5>Price</h5>';
            echo '<p>Brochure: £' . $booking->getBrochurePrice();
            $extras = $booking->getExtras()->findBy(function($ele) {
                return !$ele->getConfiguration()->isIncluded();
            });
            if ($extras->count() > 0) {
                foreach ($extras as $extra) {
                    echo sprintf(
                        '<p>%s: %s x £%s</p>',
                        $extra->getExtra()->getDescription(),
                        $extra->getQuantity(),
                        $extra->getUnitprice()
                    );
                }
            }
            echo '<p>Total: £' . $booking->getTotalPrice();
            
            // Get the branding extras and output list of available
            $extras = $booking->getBranding()->getExtras();
            if ($extras->count() > 0) {
                echo '<h5>Available extras</h5>';
                foreach ($extras as $extra) {
                    echo sprintf(
                        '<p>%s <a href="add-extra.php?id=%s&bookingid=%s">Add</a></p>',
                        $extra->getExtra()->getDescription(),
                        $extra->getExtra()->getId(),
                        $booking->getId()
                    );
                }
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