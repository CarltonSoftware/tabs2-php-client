<?php

/**
 * This file documents how subscribe to a web hook.
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

$public_endpoint_url = 'https://1aa46a4b.ngrok.io/platoclient/webhooks/example-webhook-endpoint.php';

try {
    // Subscribe to all notifications about bookings.
    \tabs\apiclient\WebHook::subscribe($public_endpoint_url, 'actor');
} catch (Exception $ex) {
    echo $ex->getMessage();
}