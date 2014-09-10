<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class HmacClassTest extends ApiClientClassTest
{
    /**
     * Test the hmac encoding
     * 
     * @return void
     */
    public function testHMAC()
    {
        $hmac = new tabs\apiclient\client\Hmac('foo', 'bar');
        $hmac->setPrefix('/v2');
        $hmac->setParams(array('foo' => 'bar'));
        
        $this->assertEquals('foo', $hmac->getKey());
        $this->assertEquals('bar', $hmac->getSecret());
        $this->assertEquals('/v2', $hmac->getPrefix());
        $this->assertArrayHasKey('foo', $hmac->getParams());
    }
}
