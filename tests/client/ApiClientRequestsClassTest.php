<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'autoload.php';
require_once $file;

class ApiClientRequestsClassTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the get request
     * 
     * @dataProvider clientRequestProvider
     * 
     * @return void
     */
    public function testRequest($method, $status, $args = 'args')
    {
        \tabs\apiclient\client\Client::factory(
            'http://httpbin.org/'
        );
        
        $response = \tabs\apiclient\client\Client::getClient()->$method(
            $method,
            array(
                'foo' => 'bar'
            )
        );
        
        $this->assertEquals($status, $response->getStatusCode());
        $this->assertEquals(
            'bar',
            tabs\apiclient\Base::getJson($response)->$args->foo
        );
    }
    
    /**
     * Provider for the client requests
     * 
     * @note Does not test options requests.
     * 
     * @return array
     */
    public function clientRequestProvider()
    {
        return array(
            array(
                'get',
                200
            ),
            array(
                'post',
                200,
                'form'
            ),
            array(
                'put',
                200,
                'form'
            ),
            array(
                'delete',
                200
            )
        );
    }
}
