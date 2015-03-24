<?php

/**
 * This file documents how to create a Extra object from the Plato API.
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
    echo '<h4>Sources</h4>';
    $sources = new \tabs\apiclient\collection\core\Source();
    $sources->fetch();
    
    //var_dump($sources->getElements());die;
    
    foreach ($sources->getElements() as $source) {
        
        //var_dump($source->getSourcecategory());die;
        
        echo '<p>ID: ' . $source->getId() . 
             '<br>Sourcecode: ' . $source->getSourcecode() .
             '<br>Description: ' . $source->getDescription() .
             '<br>Sourcecategoryid: ' . $source->getSourcecategory()->getId() . '</p>';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}