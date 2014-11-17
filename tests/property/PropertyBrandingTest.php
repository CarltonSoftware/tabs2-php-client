<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class PropertyBrandingTest extends ApiClientClassTest
{
    /**
     * Test a property branding object
     * 
     * @return void
     */
    public function testPropertyBranding()
    {
        // Test first branding group
        $branding = $this->_getBranding();
        
        // Test builder function
        $this->arrayHasKey('brandingid', $branding->toArray());
        $this->arrayHasKey('status', $branding->toArray());
        
        // Test branding object
        $this->assertEquals('Live', $branding->getStatus()->getName());
        
        // Test history
        $history = $branding->getStatushistory();
        $this->assertEquals('Live', $history[0]->getStatus()->getName());
        $this->assertEquals('2012-01-31', $history[0]->getFromdate()->format('Y-m-d'));
        $this->assertEquals(date('Y-m-d'), $history[0]->getTodate()->format('Y-m-d'));
    }
    
    /**
     * Test a property marketing brand object
     * 
     * @return void
     */
    public function testPropertyMarketingBranding()
    {
        // Test first branding group
        $branding = $this->_getBranding();
        
        $mb = $branding->getMarketingbrand();
        
        // Test branding object
        $this->assertEquals('Live', $mb->getStatus()->getName());
        $this->assertEquals('NOMB', $mb->getCode());
        
        // Test history
        $history = $mb->getStatushistory();
        $this->assertEquals('Live', $history[0]->getStatus()->getName());
        $this->assertEquals('2012-01-31', $history[0]->getFromdate()->format('Y-m-d'));
        $this->assertEquals(date('Y-m-d'), $history[0]->getTodate()->format('Y-m-d'));
        
        // Test crud urls
        $this->assertEquals('/property/1/marketingbrand', $mb->getCreateUrl());
        $this->assertEquals('/property/1/marketingbrand/1', $mb->getUpdateUrl());
    }
    
    /**
     * Test a property booking brand object
     * 
     * @return void
     */
    public function testPropertyBookingBranding()
    {
        // Test first branding group
        $branding = $this->_getBranding();
        
        $bb = $branding->getBookingbrand();
        
        // Test branding object
        $this->assertEquals('Live', $bb->getStatus()->getName());
        $this->assertEquals('NOBB', $bb->getCode());
        
        // Test history
        $history = $bb->getStatushistory();
        $this->assertEquals('Live', $history[0]->getStatus()->getName());
        $this->assertEquals('2012-01-31', $history[0]->getFromdate()->format('Y-m-d'));
        $this->assertEquals(date('Y-m-d'), $history[0]->getTodate()->format('Y-m-d'));
        
        // Test crud urls
        $this->assertEquals('/property/1/bookingbrand', $bb->getCreateUrl());
        $this->assertEquals('/property/1/bookingbrand/1', $bb->getUpdateUrl());
    }
    
    /**
     * Test a property booking brand object
     * 
     * @return void
     */
    public function testPropertyBrandingGroup()
    {
        // Test first branding group
        $branding = $this->_getBranding();
        
        $bg = $branding->getBrandinggroup();
        
        // Test branding object
        $this->assertEquals('Live', $bg->getStatus()->getName());
        
        // Test history
        $history = $bg->getStatushistory();
        $this->assertEquals('Live', $history[0]->getStatus()->getName());
        $this->assertEquals('2012-01-31', $history[0]->getFromdate()->format('Y-m-d'));
        $this->assertEquals(date('Y-m-d'), $history[0]->getTodate()->format('Y-m-d'));
        
        // Test crud urls
        $this->assertEquals('/property/1/brandinggroup', $bg->getCreateUrl());
        $this->assertEquals('/property/1/brandinggroup/1', $bg->getUpdateUrl());
    }
    
    /**
     * Get a property branding object
     * 
     * @return \tabs\apiclient\property\brand\Branding
     */
    private function _getBranding()
    {
        $property = Fixtures::getProperty();
        
        // Test branding group
        $brandings = $property->getBrandings();
        $this->assertTrue(is_array($brandings));
        
        // Test first branding group
        $branding = array_shift($brandings);
        
        return $branding;
    }
}