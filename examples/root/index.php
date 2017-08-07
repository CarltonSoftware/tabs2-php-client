<?php

/**
 * @name Getting the root endpoint
 * 
 * This file documents how to read the root endpoint.
 */
require_once __DIR__ . '/../creating-a-new-connection.php';
try {
    $root = tabs\apiclient\Root::fetch();

    var_dump($root);

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';