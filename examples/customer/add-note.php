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

        $customer = \tabs\apiclient\actor\Customer::get($customerId);

        $note = new \tabs\apiclient\core\Note();

        $noteType = new tabs\apiclient\core\Notetype();
        $noteType->setDescription('A normal bog standard note.')
            ->setType('normal');

        $noteText = new \tabs\apiclient\core\Notetext();

        $noteText->setText('Lorem ipsum dolor sit amet')
            ->setCreatedby($customer);

        $note->setSubject('Adipiscing rhubarb')
            ->setCreatedby($customer)
            ->setNotetype($noteType)
            ->addNoteText($noteText);

        $customer->addNote($note);

        $note->create();
        $noteText->create();

        header('Location: accessing-customer-information.php?id=' . $customer->getId());

    } else {
        echo 'Customer not found';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}