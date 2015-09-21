<?php

/**
 * This file documents how to read a Booking object from the Plato API.
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
    
        $booking = \tabs\apiclient\booking\Booking::get($id);

        echo sprintf('<p>Booking ref: %s</p>', $booking->getBookref());

        echo '<h2>Guests</h2>';
        foreach ($booking->getGuests() as $guest) {
            echo sprintf(
                '<p>%s (%s)</p>',
                $guest->getName(),
                $guest->getType()
            );
        }

        echo '<h2>Customers</h2>';
        foreach ($booking->getCustomers() as $bookingCustomer) {
            echo sprintf(
                '<p>%s</p>',
                $bookingCustomer->getName()
            );
        }
    } else {
        echo 'Please specify a booking id';
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
