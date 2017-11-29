<?php

/**
 * This file documents how to create a new api instance object from a
 * tabs api instance.
 *
 * PHP Version 5.5
 *
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the autoloader
require_once __DIR__ . '/../autoload.php';
require_once 'config.php';

$container = array();
$history = GuzzleHttp\Middleware::history($container);
$handlerStack = GuzzleHttp\HandlerStack::create();
$handlerStack->push($history);
$config = array(
    'HandlerStack' => $handlerStack
);

session_start();
if (isset($_SESSION['AccessToken']) 
    && $_SESSION['AccessToken'] instanceof Sainsburys\Guzzle\Oauth2\AccessToken
) {
    $now = new \DateTime();
    if ($_SESSION['AccessToken']->getExpires() > $now) {
        $config['AccessToken'] = $_SESSION['AccessToken']->getToken();
    } else {
        unset($_SESSION['AccessToken']);
    }
}

\tabs\apiclient\client\Client::factory(
    TABS2APIURL, // Api Url
    TABS2APIUSERNAME, // Api Key
    TABS2APIPASSWORD, // Api Secret
    TABS2APICLIENTID,
    TABS2APICLIENTSECRET,
    $config
);