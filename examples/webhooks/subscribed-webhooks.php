<?php

/**
 * @name Subscribing to a webhook
 * 
 * This file documents how subscribe to a web hook. 
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

$public_endpoint_url = getBaseUrl() . 'webhook-endpoint.php';
try {
    // Subscribe to all notifications about bookings.  Additional groups are
    // property, actor and admin.
    $subscribed = \tabs\apiclient\WebHook::subscribed($public_endpoint_url);
} catch (Exception $ex) {
    echo $ex->getMessage();
}

require_once __DIR__ . '/../finally.php';