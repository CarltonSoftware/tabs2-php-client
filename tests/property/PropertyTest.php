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
     * @return void
     */
    public function testPropertyOwner()
    {
        $property = Fixtures::getProperty();
        $this->assertEquals(
            'Mr',
            $property->getOwners()->getCurrent()->getActor()->getTitle()
        );
        $this->assertEquals(
            'Wyett',
            $property->getOwners()->getCurrent()->getActor()->getSurname()
        );
        $this->assertEquals(
            4,
            count($property->getOwners()->getCurrent()->toArray())
        );
        $this->assertArrayHasKey(
            'id',
            $property->getOwners()->getCurrent()->toArray()
        );
        $this->assertArrayHasKey(
            'ownerid',
            $property->getOwners()->getCurrent()->toArray()
        );
        $this->assertArrayHasKey(
            'ownerfromdate',
            $property->getOwners()->getCurrent()->toArray()
        );
        $this->assertArrayHasKey(
            'ownertodate',
            $property->getOwners()->getCurrent()->toArray()
        );
        $this->assertEquals(
            '/property/1/owner',
            $property->getOwners()->getCurrent()->getCreateUrl()
        );
        $this->assertEquals(
            '/property/1/owner/1',
            $property->getOwners()->getCurrent()->getUpdateUrl()
        );
        $this->assertEquals(
            '2014-01-01',
            $property->getOwners()->getCurrent()->getFromdate()->format('Y-m-d')
        );
    }
    
    /**
     * Test property descriptions
     * 
     * @return void
     */
    public function testPropertyDescriptions()
    {
        $property = Fixtures::getProperty();
        $descriptions = $property->getDescriptions()->getElements();
        $description = $descriptions[0];
        
        $this->assertEquals(
            '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            $description->getDescription()
        );
        
        $this->assertEquals(
            'Full',
            $description->getDescriptiontype()->getName()
        );
        
        $this->assertEquals(
            'HTML',
            $description->getDescriptiontype()->getEncoding()
        );
        
        $this->assertEquals(
            0,
            $description->getDescriptiontype()->getMinimumlength()
        );
        
        $this->assertEquals(
            9999,
            $description->getDescriptiontype()->getMaximumlength()
        );
        
        $this->assertEquals(
            '/property/1/description',
            $description->getCreateUrl()
        );
        $this->assertEquals(
            '/property/1/description/1',
            $description->getUpdateUrl()
        );
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