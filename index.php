<?php

require_once 'vendor/autoload.php';
require_once 'autoload.php';

$client = \tabs\client\Client::factory(
    'http://localhost/plato/web/app_dev.php',
    'alex',
    '816084fcad469fe2'
);

var_dump($client->get('customer')->json());