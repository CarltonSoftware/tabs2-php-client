<?php

/**
 * @name Adding a phone number to an actor
 * 
 * This file documents how to add a new phone number to a customer with the Plato API.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {

    $customer = new tabs\apiclient\Customer($id);
    $customer->get();
    $customer->setPhonenumber('+447795500123');

    header('Location: index.php?id=' . $customer->getId());
    exit();

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';