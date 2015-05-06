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

try {
    echo '<h4>Extras</h4>';
    $extras = new \tabs\apiclient\collection\core\Extra();
    $extras->fetch();
    
    foreach ($extras->getElements() as $extra) {
        echo '<p>' . (string) $extra;
        if (count($extra->getBrandings()->getElements()) > 0) {
            echo '<br>ExtraBrandings:<ol>';
           
            foreach ($extra->getBrandings()->getElements() as $br) {
                echo '<li>' . (string)$br . '</li>';
            }
            
            echo '</ol>';
        }
        echo '</p><br>';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}