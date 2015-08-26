<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class BrandingTest extends ApiClientClassTest
{
    /**
     * Test creating a new branding object
     *
     * @return void
     */
    public function testBranding()
    {
        $branding = Fixtures::getBranding();
        
        $this->assertEquals(
            'Norfolk - Norfolk - Norfolk',
            (string) $branding
        );
        
        $this->assertEquals('branding', $branding->getUrlStub());

        $this->assertArrayHasKey('brandinggroupid', $branding->toArray());
        $this->assertArrayHasKey('bookingbrandid', $branding->toArray());
        $this->assertArrayHasKey('marketingbrandid', $branding->toArray());

    }
}
