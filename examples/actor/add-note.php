<?php

/**
 * @name Adding a note to an actor
 * 
 * This file documents how add a note to a customer using the Plato API.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($customerId = filter_input(INPUT_GET, 'id')) {

    $customer = new \tabs\apiclient\Customer($customerId);
    $customer->get();

    $note = new \tabs\apiclient\Note();

    $noteTypes = tabs\apiclient\Collection::factory(
        'notetype',
        new \tabs\apiclient\Notetype()
    );
    $noteTypes->fetch();

    $noteText = new \tabs\apiclient\note\Notetext();

    $noteText->setNotetext('Lorem ipsum dolor sit amet')
        ->setCreatedby($customer);

    $note->setSubject('Adipiscing rhubarb')
        ->setCreatedby($customer)
        ->setNotetype($noteTypes->first())
        ->addNotetext($noteText);

    $note->create();
    $actorNote = new \tabs\apiclient\note\ActorNote();
    $actorNote->setNote($note)->setParent($customer)->create();

    header('Location: index.php?id=' . $customer->getId());

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';