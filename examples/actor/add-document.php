<?php

/**
 * @name Adding a document to an Actor
 * 
 * This file documents how to add a document to a customer with the Plato API.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {

    // Create a mock customer object
    $customer = new \tabs\apiclient\Customer($id);

    // Create the actor document and add it to the collection in the customer
    $actorDoc = new \tabs\apiclient\actor\Document();
    $customer->getDocuments()->addElement($actorDoc);

    // Create a new document object and set the file location
    $document = new \tabs\apiclient\Document();
    $document->setName('A text file')
        ->setDescription('This is a simple text file upload test')
        ->setWeight(1)
        ->setPrivate(false)
        ->setFileLocation(dirname(__FILE__) . '/A Simple Text File.txt');

    // Create the document (this creates the id internally)
    $document->create();

    // Set the document to the actor document and create it.
    $actorDoc->setDocument($document);
    $actorDoc->create();

    header('Location: index.php?id=' . $customer->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';