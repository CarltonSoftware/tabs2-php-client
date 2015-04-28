<?php

/**
 * This file documents how to create a new Extra object from the Plato API.
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

$extra = new \tabs\apiclient\core\Extra();
$extra->setExtracode('XXX')
    ->setExtratype('Booking')
    ->setDescription('Test Extra');

try {
    $extra->create();
} catch (Exception $ex) {
    var_dump($ex);
}

// Add brandings to extra
$brandings = new tabs\apiclient\collection\brand\Branding();
$brandings->fetch();
foreach ($brandings->getElements() as $branding) {
    $extraBranding = new \tabs\apiclient\core\extra\Branding();
    $extraBranding->setBranding($branding);
    
    $extra->addBranding($extraBranding);
    $extraBranding->create();
}

var_dump($extra);