<?php

/**
 * This file documents how add a note to a customer using the Plato API.
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

    if ($customerId = filter_input(INPUT_GET, 'customer')) {

        $customer = new \tabs\apiclient\actor\Customer($customerId);
        $customer->get();

        $note = new \tabs\apiclient\note\Note();

        $noteType = new tabs\apiclient\note\Notetype();
        $noteType->setDescription('A normal bog standard note.')
            ->setType('normal');

        $noteText = new \tabs\apiclient\note\Notetext();

        $noteText->setText('Lorem ipsum dolor sit amet')
            ->setCreatedby($customer);

        $note->setSubject('Adipiscing rhubarb')
            ->setCreatedby($customer)
            ->setNotetype($noteType)
            ->getNotetexts()->addElement($noteText);
        
        $note->create();
        $noteText->create();
        $actorNote = new \tabs\apiclient\note\ActorNote();
        $actorNote->setNote($note)->setActor($customer)->create();

        header('Location: requesting-actor-details.php?id=' . $customer->getId());

    } else {
        echo 'Customer not found';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}
require_once __DIR__ . '/../finally.php';