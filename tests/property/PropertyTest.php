<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class PropertyTest extends ApiClientClassTest
{
    /**
     * Test a property object
     * 
     * @return void
     */
    public function testProperty()
    {
        $property = Fixtures::getProperty();
        $this->_testProperty($property);
    }
    
    /**
     * Test a property object
     * 
     * @param \tabs\apiclient\property\Property $property Property object
     * 
     * @return void
     */
    private function _testProperty($property)
    {
        $this->assertEquals('A Cottage', $property->getName());
        $this->assertEquals('Cottage 1', $property->getNamequalifier());
        $this->assertEquals(4, $property->getSleeps());
        $this->assertEquals(2, $property->getBedrooms());
        $this->assertEquals(1, $property->getId());
        $this->assertEquals('ABC123', $property->getTabspropref());
        $this->assertEquals('/property', $property->getCreateUrl());
        $this->assertEquals('/property/1', $property->getUpdateUrl());
    }
}