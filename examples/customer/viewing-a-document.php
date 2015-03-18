<?php

/**
 * This file documents how to read a Customer document object from the Plato API.
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

    if ($id = filter_input(INPUT_GET, 'id')) {
        
        $document = \tabs\apiclient\core\Document::get($id);
        
        header('Content-Type: ' . $document->getMimetype()->getName());
        echo $document->getFiledata();
        
    } else {
        
        echo 'No document found';
        
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}