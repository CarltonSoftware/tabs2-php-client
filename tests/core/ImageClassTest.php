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
        $this->assertEquals('Test', (string) $img);
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
     * Test an image object's toArray method
     *
     * @return void
     */
    public function testImageToArray()
    {
        $array = Fixtures::getImage()->toArray();
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('filename', $array);
        $this->assertEquals('Test', $array['title']);
        $this->assertEquals('Testing', $array['description']);
        $this->assertEquals('100', $array['width']);
        $this->assertEquals('100', $array['height']);
    }

    /**
     * Test that saving a jpeg with a .gif extension is not possible
     *
     * @expectedException        \tabs\apiclient\client\Exception
     * @expectedExceptionMessage Extension mis-match. Specified extension does not match image exif data.
     */
    public function testExtensionMismatchException()
    {
        self::$img->save('file.gif');
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
     * Test scaling a new image
     *
     * @depends testImageRequest
     *
     * @return void
     */
    public function testImageScaleRequest()
    {
        self::$img->scale(700, 700);
        $this->assertEquals(700, self::$img->getWidth());
        $this->assertEquals(300, self::$img->getHeight());

        self::$img->scale(700, 150);
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
        $positions = ['centre', 'left', 'right', 'top centre', 'bottom centre', 'top right', 'bottom right', 'top left', 'bottom left'];

        foreach ($positions as $position) {
            self::$img->crop(50, 50, $position);
            $this->assertEquals(50, self::$img->getWidth());
            $this->assertEquals(50, self::$img->getHeight());
        }
    }
}