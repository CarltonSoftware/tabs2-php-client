<?php

/**
 * This file documents how to read a Brandings object from the Plato API.
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
    echo '<h4>Brandings</h4>';
    $brandings = new \tabs\apiclient\collection\brand\Branding();
    $brandings->fetch();
    
    foreach ($brandings->getElements() as $branding) {
        echo '<p>ID: ' . $branding->getId() . '<br>'; 
        echo 'Group: ' . (string)$branding;
    }
} catch(Exception $e) {
    echo $e->getMessage();
}