<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class ValueClassTest extends ApiClientClassTest
{
    /**
     * Test a value object
     * 
     * @return void
     */
    public function testValue()
    {
        $value = Fixtures::getHybridValue();
        
        $this->assertEquals('true|2', (string) $value);
        $this->assertArrayHasKey('boolean', $value->getValue());
        $this->assertArrayHasKey('number', $value->getValue());
    }
    
    /**
     * Test a number value object
     * 
     * @return void
     */
    public function testNumberValue()
    {
        $value = new \tabs\apiclient\core\attribute\Value();
        $value->setValue(2);
        $this->assertEquals(2, (string) $value);
    }
    
    /**
     * Test a boolean value object
     * 
     * @return void
     */
    public function testBooleanValue()
    {
        $value = new \tabs\apiclient\core\attribute\Value();
        $value->setValue(true);
        $this->assertEquals('true', (string) $value);
    }
}
