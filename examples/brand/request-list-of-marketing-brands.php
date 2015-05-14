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
    echo '<h4>Marketing Brands</h4>';
    $marketingBrands = new \tabs\apiclient\collection\brand\MarketingBrand();
    $marketingBrands->fetch();
    
    foreach ($marketingBrands->getElements() as $marketingBrand) {
        echo '<p>ID: ' . $marketingBrand->getId() . '<br>'; 
        echo (string)$marketingBrand . '</p>';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}