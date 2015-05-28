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
     * Static img
     * 
     * @var \tabs\apiclient\core\Image
     */
    static $img;
    
    /**
     * Sets up the tests
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        
        self::$img = new \tabs\apiclient\core\Image();
        self::$img->setDataFromPath('http://placehold.it/350x150');
    }
    
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
    
    /**
     * Test adding a new image
     * 
     * @return void
     */
    public function testImageRequest()
    {
        $this->assertEquals(350, self::$img->getWidth());
        $this->assertEquals(150, self::$img->getHeight());
    }
    
    /**
     * Test resizing a new image
     * 
     * @depends testImageRequest
     * 
     * @return void
     */
    public function testImageResizeRequest()
    {
        self::$img->resize(100, 100);
        $this->assertEquals(100, self::$img->getWidth());
        $this->assertEquals(100, self::$img->getHeight());
    }
    
    /**
     * Test cropping a new image
     * 
     * @depends testImageResizeRequest
     * 
     * @return void
     */
    public function testImageCropRequest()
    {
        self::$img->crop(50, 50);
        $this->assertEquals(50, self::$img->getWidth());
        $this->assertEquals(50, self::$img->getHeight());
    }
}