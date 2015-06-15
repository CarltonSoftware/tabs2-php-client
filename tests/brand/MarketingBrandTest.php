<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class MarketingBrandTest extends ApiClientClassTest
{
    /**
     * Test creating a new marketingBrand object
     *
     * @return void
     */
    public function testMarketingBrand()
    {
        $marketingBrand = Fixtures::getMarketingBrand();
        
        $this->assertEquals(
            'Norfolk (NOMB)',
            (string) $marketingBrand
        );
        
        $this->assertEquals('marketingbrand', $marketingBrand->getUrlStub());
    }
}
