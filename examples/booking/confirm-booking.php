<?php

/**
 * This file documents how to confirm Booking objects from the Plato API.
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
        $b = new tabs\apiclient\Booking($id);
        $b->get();
        
        // Get the tabs user.  In this case, I'm getting
        // it from the connection credentials
        $user = \tabs\apiclient\client\Client::getClient()->whoami();
        
        // Create a new confirm booking and set the
        // tabs user
        $conf = new \tabs\apiclient\ConfirmedBooking();
        $conf->setConfirmedbytabsuser($user);
        
        // Add provisional to booking and update
        $b->setConfirmedbooking($conf);
        $b->update();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';