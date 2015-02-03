<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class ImageClassTest extends ApiClientClassTest
{
    /**
     * Test a image object
     * 
     * @return void
     */
    public function testImage()
    {
        $img = Fixtures::getImage();
        $this->assertEquals(1, $img->getId());
        $this->assertEquals('Test', $img->getTitle());
        $this->assertEquals('Testing', $img->getDescription());
        $this->assertEquals(100, $img->getHeight());
        $this->assertEquals(100, $img->getWidth());
        $this->assertEquals(
            \tabs\apiclient\client\Client::getClient()->getBaseUrl() . 'image/1',
            $img->getUrl()
        );
        $this->assertEquals('/image/1', $img->getPath());
    }
}
