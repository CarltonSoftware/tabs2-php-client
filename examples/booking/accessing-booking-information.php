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
            $customer = $guest->getCustomer();
            echo sprintf(
                '<p>%s (%s) ' .
                '<a href="../customer/accessing-customer-information.php?id=%u">(%s)</a></p>',
                $guest->getName(),
                $guest->getType(),
                $customer->getId(),
                $customer
            );
        }

        echo '<h2>Customers</h2>';
        foreach ($booking->getCustomers() as $bookingCustomer) {
            $customer = $guest->getCustomer();
            echo sprintf(
                '<p>%s ' .
                '<a href="../customer/accessing-customer-information.php?id=%u">(%s)</a></p>',
                $bookingCustomer->getName(),
                $customer->getId(),
                $customer
            );
        }

    } else {
        echo 'Please specify a booking id';
    }

} catch(Exception $e) {
    echo $e->getMessage();
}
