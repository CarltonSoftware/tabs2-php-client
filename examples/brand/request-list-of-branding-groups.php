<?php

/**
 * This file documents how to read a BrandingGroups object from the Plato API.
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
    echo '<h4>Branding Groups</h4>';
    $bgs = new \tabs\apiclient\collection\brand\BrandingGroup();
    $bgs->fetch();
    
    foreach ($bgs->getElements() as $bg) {
        echo '<p>ID: ' . $bg->getId() . '<br>'; 
        echo 'Code: ' . $bg->getCode() . '<br>';
        echo 'Name: ' . $bg->getName() . '<br>';
        echo 'Agency Ref: ' . $bg->getAgency() . '</p>';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}