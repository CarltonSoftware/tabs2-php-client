<?php

/**
 * @name Example of receiving a webhook notification
 * 
 * This file documents how to read the web hook responses from tabs2.
 */
require_once __DIR__ . '/../creating-a-new-connection.php';

$snsFullMessage = \tabs\apiclient\WebHook::detectRequestBody();
if ($snsFullMessage && isset($snsFullMessage['SubscribeURL'])) {
    // Send the response back to the web hook request to say its been accepted.
    echo file_get_contents($snsFullMessage['SubscribeURL']);
    die();
} else if (is_array($snsFullMessage)) {
    // Do something with the response
    error_log(print_r(json_decode($snsFullMessage['Message']), true));
}


require_once __DIR__ . '/../finally.php';