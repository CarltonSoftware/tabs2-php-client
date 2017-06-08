<?php

/**
 * This file documents how to add extras onto a a Booking.
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if (filter_input(INPUT_GET, 'id')
        && filter_input(INPUT_GET, 'bsid')
    ) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
        
        $bs = new \tabs\apiclient\booking\SecurityDeposit(filter_input(INPUT_GET, 'bsid'));
        $bs->setParent($b);
        
        $bs->get();
        
        $bs->delete();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';