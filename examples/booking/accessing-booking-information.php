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
    
    $booking = \tabs\apiclient\booking\Booking::get('1');

    echo $booking->getBookref();
            
} catch(Exception $e) {
    echo $e->getMessage();
}