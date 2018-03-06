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
            'https://dummy.test.api.tabs-software.co.uk/v2/', // Api Url
            'phpclient', // Api Key
            'phpclient', // Api Secret
            '5_1ocqemslaf0g8w4c8kggckss4kgccgkokw4gs88ocko8kwoww0',
            '2cs2fx1nfjtwgc8w0wowg80wckkk4swc0ggswggwkkoos8kg8g'
        );
    }
}
