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
        
        $customer = new \tabs\apiclient\Customer($id);
        
        $actorDoc = new \tabs\apiclient\actor\Document();
        $customer->getDocuments()->addElement($actorDoc);
        $document = new \tabs\apiclient\Document();
        $document->setName('A text file')
            ->setDescription('This is a simple text file upload test')
            ->setWeight(1)
            ->setPrivate(false)
            ->setFileLocation(dirname(__FILE__) . '/A Simple Text File.txt');
        
        $document->create();
        
        $actorDoc->setDocument($document);
        $actorDoc->create();
        
        header('Location: requesting-actor-details.php?id=' . $customer->getId());
        
    } else {
        
        echo 'Customer not found';
        
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}