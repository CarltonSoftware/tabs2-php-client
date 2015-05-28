<?php

/**
 * This file documents how to read an Agency object from the Plato API.
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
    echo '<h4>Agencies</h4>';
    $agencies = new \tabs\apiclient\collection\actor\Agency();
    $agencies->fetch();
    
    foreach ($agencies->getElements() as $agency) {
        echo '<p>ID: ' . $agency->getId() . '<br>';
        echo (string)$agency . '</p>';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}