<?php

/**
 * This file documents how to request a lists of brochure requests;
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    
    $brochure = new \tabs\apiclient\Brochure(1);
    
    echo '<ul>';
    foreach ($brochure->get()->getBrochurerequests() as $request) {
        if ($request instanceof \tabs\apiclient\brochure\BrochureRequest) {
            echo '<li>' . $request->getCustomer()->getFullname() . ' at ' . $request->getRequestdatetime()->format('Y-m-d H:i:s') . '</li>';
        }
    }
    echo '</ul>';
    
    
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';