<?php

/**
 * @name Authenticating actors
 * 
 * This example shows how to do basic authentication in tabs2.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {

    $customer = new tabs\apiclient\Customer($id);
    $customer->authenticate('password');
    // Password is ok as exception not thrown
    header('Location: index.php?id=' . $customer->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';