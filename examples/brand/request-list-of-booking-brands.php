<?php

/**
 * This file documents how to read a BookingBrands object from the Plato API.
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
    echo '<h4>Booking Brands</h4>';
    $bookingBrands = new \tabs\apiclient\collection\brand\BookingBrand();
    $bookingBrands->fetch();
    
    foreach ($bookingBrands->getElements() as $bookingBrand) {
        echo '<p>ID: ' . $bookingBrand->getId() . '<br>'; 
        echo 'Code: ' . $bookingBrand->getCode() . '<br>';
        echo 'Name: ' . $bookingBrand->getName() . '</p>';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}