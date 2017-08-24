<?php

/**
 * @name Adding a note to a property
 * 
 * In this example we're going to add a note to a property.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {

    $property = new \tabs\apiclient\Property($id);

    // Get the clients tabs user
    $me = tabs\apiclient\client\Client::getClient()->whoami();
    $note = new \tabs\apiclient\Note();

    // Create a note type
    $noteType = new tabs\apiclient\Notetype();
    $noteType->setDescription('A normal bog standard note.')
        ->setType('normal');

    // And a note text
    $noteText = new \tabs\apiclient\note\Notetext();

    $noteText->setNotetext('Lorem ipsum dolor sit amet')
        ->setCreatedby($me);

    // Populate the note
    $note->setSubject('Adipiscing rhubarb')
        ->setCreatedby($me)
        ->setNotetype($noteType)
        ->addNotetext($noteText);

    $note->create();

    // Create the property note
    $pNote = new \tabs\apiclient\note\PropertyNote();
    $pNote->setNote($note)->setParent($property)->create();

    // Redirect back to the property page
    header('Location: index.php?id=' . $property->getId());

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';