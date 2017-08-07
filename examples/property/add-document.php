<?php

/**
 * @name Adding a document to a property
 * 
 * In this example we're going to add a document to a property.
 */
require_once __DIR__ . '/../creating-a-new-connection.php';
try {

    if ($id = filter_input(INPUT_GET, 'id')) {

        $property = new \tabs\apiclient\Property($id);

        $propertyDoc = new \tabs\apiclient\property\Document();
        $property->getDocuments()->addElement($propertyDoc);
        $document = new \tabs\apiclient\Document();
        $document->setName('A text file')
            ->setDescription('This is a simple text file upload test')
            ->setWeight(1)
            ->setPrivate(false)
            ->setFileLocation(dirname(__FILE__) . '/A Simple Text File.txt');

        $document->create();

        $propertyDoc->setDocument($document);
        $propertyDoc->create();

        header('Location: index.php?id=' . $property->getId());


    }
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';