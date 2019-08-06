<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'autoload.php';
require_once $file;

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'Fixtures.php';
require_once $file;

abstract class ApiClientClassTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Sets up the tests
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
        // Create your api connection here.
        \tabs\apiclient\client\Client::factory(
            'https://toccl.test.api.tabs-software.co.uk/v2/', // Api Url
            'template3', // Api Key
            '3etalpmet!', // Api Secret
            '15_468yq9yhyq04ks8o0w4kkckcwsg804ckwg8g8cs8wgs4s0scg0',
            '1crapwsm6lc0so4kow044oo8cg08s04ogwsowkosk0cc44kogg'
        );
    }
}
