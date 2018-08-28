<?php

/**
 * @name Creating a connection
 * 
 * The tabs2 php client is a library which helps you connect to your tabs2 api.
 */


// Include the composer dependencies
require_once __DIR__ . '/../autoload.php';
// @param string $apiurl Your client api url.  
$apiurl = 'https://XXXXX.test.api.tabs-software.co.uk/v2/'; // NOTE: Make sure you url is suffixed with '/v2/'
// @param string $username Your tabs username
$username = 'ABC';
// @param string $password Your tabs password
$password = '123';
// @param string $client_id Your application id
$client_id = 'DEF';
// @param string $client_secret Your application secret
$client_secret = '456';
\tabs\apiclient\client\Client::factory(
    $apiurl,
    $username,
    $password,
    $client_id,
    $client_secret
);
// Call a basic endpoint using the client
// The client is a wrapper for Guzzle (https://github.com/guzzle/guzzle) so calling the
// http methods (get, post, put & delete) will return a \Psr\Http\Message\ResponseInterface object.
var_dump(
    json_decode(
        (string) \tabs\apiclient\client\Client::getClient()->get('title')->getBody()
    )
);
// OR Use one of our provided classes to return an object
// For example
// Create a new property object
$p = new \tabs\apiclient\Property(1);
// GET the property data
$p->get();
// Output the name
var_dump($p->getName());

require_once __DIR__ . '/finally.php';