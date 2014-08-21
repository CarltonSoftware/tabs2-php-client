<?php

/**
 * This file documents how to create a new api instance object from a
 * tabs api instance.
 *
 * PHP Version 5.4
 *
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2013 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the autoloader
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';

\tabs\client\Client::factory(
    'http://localhost/', // Api Url
    '', // Api Key
    '', // Api Secret
    array(
        'prefix' => 'plato/web/v2'
    )
);
