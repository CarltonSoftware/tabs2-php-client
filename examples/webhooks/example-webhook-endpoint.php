<?php

/**
 * This file documents how to read the web hook responses from tabs2
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

$snsFullMessage = \tabs\apiclient\WebHook::detectRequestBody();
if ($snsFullMessage && isset($snsFullMessage['SubscribeURL'])) {
    // Send the response back to the web hook request to say its been accepted.
    echo file_get_contents($snsFullMessage['SubscribeURL']);
    die();
} else if (is_array($snsFullMessage)) {
    // Do something with the response
    error_log(print_r(json_decode($snsFullMessage['Message']), true));
}