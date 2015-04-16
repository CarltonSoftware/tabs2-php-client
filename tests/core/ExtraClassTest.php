<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class ExtraClassTest extends ApiClientClassTest
{
    /**
     * Test an Extra object
     * 
     * @return void
     */
    public function testExtra()
    {
        $extra = Fixtures::getExtra();
        $this->assertEquals(1, $extra->getId());
        $this->assertEquals('BKFE', $extra->getExtracode());
        $this->assertEquals('BookingTypeExtra', $extra->getExtratype());
        $this->assertEquals('Booking Fee', $extra->getDescription());
        $this->assertEquals('extra', $extra->getUrlStub());
        
        $this->assertArrayHasKey('id', $extra->toArray());
        $this->assertArrayHasKey('extracode', $extra->toArray());
        $this->assertArrayHasKey('extratype', $extra->toArray());
        $this->assertArrayHasKey('description', $extra->toArray());
    }
    
    /**
     * Test creating Extra collections
     *
     * @return void
     */
    public function testNewExtraCollections()
    {
        $extra = Fixtures::getExtra();
        
        $this->assertEquals(
            '\tabs\apiclient\core\ExtraBranding',
            $extra->getBrandings()->getElementClass()
        );
    }
    
    /**
     * Test the update routes created by the builder class
     * 
     * @return void
     */
    public function testCreateRoutes()
    {
        $extra = new \tabs\apiclient\core\Extra();
        $extra->setId(1);
        $this->assertEquals('/extra', $extra->getCreateUrl());
        $this->assertEquals('/extra/1', $extra->getUpdateUrl());
        
        $extraBranding = new \tabs\apiclient\core\ExtraBranding();
        $extraBranding->setId(1);
        $extra->addExtraBranding($extraBranding);
        $this->assertEquals(1, count($extra->getExtraBrandings()->getElements()));
        $this->assertEquals('/extra/1/branding', $extraBranding->getCreateUrl());
        $this->assertEquals('/extra/1/branding/1', $extraBranding->getUpdateUrl());
    }
}
