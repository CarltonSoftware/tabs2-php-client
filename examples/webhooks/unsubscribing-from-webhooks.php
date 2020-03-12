<?php

/**
 * @name Unsusbcribe from a webhook
 * 
 * This file documents how unsubscribe from a web hook. 
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

$subscription_arn = 'SUBSCRIPTION-ARN-FROM-SUBSCRIBED-LIST';
try {
    // Unsubscribe from an arn.
    \tabs\apiclient\WebHook::unsubscribe($subscription_arn);
} catch (Exception $ex) {
    echo $ex->getMessage();
}

require_once __DIR__ . '/../finally.php';