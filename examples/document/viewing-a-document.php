<?php

/**
 * @name Viewing a document
 * 
 * In this example, we will view a document with the provided document id.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {

    $document = new \tabs\apiclient\Document($id);
    header('Content-Type: ' . $document->get()->getMimetype()->getName());
    echo $document->getFiledata();

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';