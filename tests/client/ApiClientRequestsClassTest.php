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
    public function testRequest($method, $status, $args = 'args', $hmac = false)
    {
        if ($hmac) {
            \tabs\client\Client::factory('http://httpbin.org/', 'mouse', 'cottage');
        } else {
            \tabs\client\Client::factory('http://httpbin.org/');
        }
        
        $request = \tabs\client\Client::getClient()->$method(
            $method,
            array(
                'foo' => 'bar'
            )
        );
        
        $this->assertEquals($status, $request->getStatusCode());
        $this->assertEquals(
            'bar',
            $request->json(
                array(
                    'object' => true
                )
            )->$args->foo
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
