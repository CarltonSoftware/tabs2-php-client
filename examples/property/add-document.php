<?php

/**
 * This file documents how to add a document to a customer with the Plato API.
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
        
        $property = new \tabs\apiclient\property\Property($id);
        
        $propertyDoc = new \tabs\apiclient\property\PropertyDocument();
        $property->getDocuments()->addElement($propertyDoc);
        $document = new \tabs\apiclient\core\Document();
        $document->setName('A text file')
            ->setDescription('This is a simple text file upload test')
            ->setWeight(1)
            ->setPrivate(false)
            ->setFileLocation(dirname(__FILE__) . '/A Simple Text File.txt');
        
        $document->create();
        
        $propertyDoc->setDocument($document);
        $propertyDoc->create();
        
        header('Location: accessing-property-information.php?id=' . $property->getId());
        
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}