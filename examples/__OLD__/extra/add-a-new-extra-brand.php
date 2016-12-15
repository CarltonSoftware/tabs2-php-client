<?php

/**
 * This file documents how to read an Extra object from the Plato API.
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

if ($eid = filter_input(INPUT_GET, 'eid')) {
    $extras = new \tabs\apiclient\collection\core\Extra();
    $extras->fetch();
    
    foreach ($extras as $extra) {
        if ($extra->getId() == $eid) {
            
            // Get brands
            $brands = new tabs\apiclient\collection\brand\Branding();
            $brands = $brands->fetch()->getElements();
            
            $brand = array_shift($brands);
            
            $extrabrand = new tabs\apiclient\core\extra\Branding();
            $extrabrand->setBranding($brand);
            $extrabrand->setParent($extra);
            $extrabrand->create();
            
            echo 'Created!';
        }
    }
}