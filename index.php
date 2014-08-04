<?php

require_once 'vendor/autoload.php';
require_once 'autoload.php';

$client = \tabs\client\Client::factory(
    'http://plato.apiary.io',
    '',
    ''
);

var_dump($client->get('customer')->json());