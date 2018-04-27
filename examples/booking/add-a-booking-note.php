<?php

/**
 * @name Adding a booking note
 * 
 * This file documents how to add a note to a booking.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if (filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
    // Get the clients tabs user
    $me = tabs\apiclient\client\Client::getClient()->whoami();
    $note = new \tabs\apiclient\Note();

    // Create a note type
    $noteType = new tabs\apiclient\Notetype();
    $noteType->setDescription('A normal bog standard note.')
        ->setType('normal');

    // Populate the note
    $note->setSubject('Adipiscing rhubarb')
        ->setCreatedby($me)
        ->setNotetype($noteType)
        ->addNotetext('Lorem ipsum dolor sit amet');

    $note->create();

    $b->addNote($note);

    header('Location: index.php?id=' . $b->getId());
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';