<?php

/**
 * This file documents how to request a lists of information from the utility
 * endpoint in the Plato API.
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
    
    echo '<h4>Countries</h4>';
    $countries = new \tabs\apiclient\collection\core\Country();
    $countries->fetch();
    
    foreach ($countries->getElements() as $country) {
        echo '<p>' .  (string) $country . '</p>';
    }
    
    echo '<h4>Languages</h4>';
    $languages = new \tabs\apiclient\collection\core\Language();
    $languages->fetch();
    
    foreach ($languages->getElements() as $language) {
        echo '<p>' .  (string) $language . '</p>';
    }
    
    echo '<h4>Role/Reasons</h4>';
    $rolereasons = new \tabs\apiclient\collection\actor\RoleReason();
    $rolereasons->fetch();
    
    foreach ($rolereasons->getElements() as $rolereason) {
        echo '<p>' .  (string) $rolereason . '</p>';
    }
    
    echo '<h4>Encoding types</h4>';
    $encodings = new \tabs\apiclient\collection\core\Encoding();
    $encodings->fetch();
    
    foreach ($encodings->getElements() as $encoding) {
        echo '<p>' .  (string) $encoding . '</p>';
    }
    
    echo '<h4>Description types</h4>';
    $types = new \tabs\apiclient\collection\property\description\Type();
    $types->fetch();
    
    foreach ($types->getElements() as $type) {
        echo '<p>' .  $type->getName() . '</p>';
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}