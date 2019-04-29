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

if (!file_exists('config.php')) {
    die(
        'config.php does not exist. Copy config.sample.php, rename and update with your supplied the credentials before continuing.'
    );
}

require_once 'config.php';

$container = array();
$history = GuzzleHttp\Middleware::history($container);
$handlerStack = GuzzleHttp\HandlerStack::create();
$handlerStack->push($history);
$config = array(
    'HandlerStack' => $handlerStack
);

/**
 * Roughly guess the base url for external endpoint examples.
 * 
 * @return string
 */
function getBaseUrl() {
    $scheme = 'http';
    if (isset($_SERVER['REQUEST_SCHEME'])) {
        $scheme = $_SERVER['REQUEST_SCHEME'];
    }
    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
        $scheme = $_SERVER['HTTP_X_FORWARDED_PROTO'];
    }
    return $scheme . '://' . $_SERVER['HTTP_HOST'] . str_replace(parse_url(basename($_SERVER['REQUEST_URI']), PHP_URL_PATH), '', $_SERVER['SCRIPT_NAME']);
}

session_start();
if (isset($_SESSION['AccessToken']) 
    && is_array($_SESSION['AccessToken'])
    && isset($_SESSION['AccessToken'][TABS2APIURL])
    && $_SESSION['AccessToken'][TABS2APIURL] instanceof Sainsburys\Guzzle\Oauth2\AccessToken
) {
    $now = new \DateTime();
    if ($_SESSION['AccessToken'][TABS2APIURL]->getExpires() > $now) {
        $config['AccessToken'] = $_SESSION['AccessToken'][TABS2APIURL]->getToken();
    } else {
        unset($_SESSION['AccessToken'][TABS2APIURL]);
    }
}

\tabs\apiclient\client\Client::factory(
    TABS2APIURL, // Api Url
    TABS2APIUSERNAME, // Your tabs username
    TABS2APIPASSWORD, // Your tabs password
    TABS2APICLIENTID, // Your provided client id
    TABS2APICLIENTSECRET, // Your provided client secret
    $config
);