<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class BrandingGroupTest extends ApiClientClassTest
{
    /**
     * Test creating a new brandingGroup object
     *
     * @return void
     */
    public function testBrandingGroup()
    {
        $brandingGroup = Fixtures::getBrandingGroup();
        
        $this->assertEquals(
            'Norfolk (NOAA)',
            (string) $brandingGroup
        );
        
        $this->assertEquals('brandinggroup', $brandingGroup->getUrlStub());
    }
}
