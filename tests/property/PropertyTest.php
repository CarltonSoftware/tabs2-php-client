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
            '\tabs\apiclient\property\propertyactor\Owner',
            $property->getOwners()->getElementClass()
        );
        
        $this->assertEquals(
            '/property/1/owner',
            $property->getOwners()->getRoute()
        );
        
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
        $this->assertEquals(
            '2099-01-01',
            $property->getOwners()->getCurrent()->getTodate()->format('Y-m-d')
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
        
        $this->assertEquals(
            '\tabs\apiclient\property\description\Description',
            $property->getDescriptions()->getElementClass()
        );
        
        $this->assertEquals(
            '/property/1/description',
            $property->getDescriptions()->getRoute()
        );
        
        
        $description = $descriptions[0];
        
        $this->assertEquals(
            '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
            $description->getDescription()
        );
        
        $this->assertEquals(
            'descriptiontype',
            $description->getDescriptiontype()->getUrlStub()
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
            'long',
            $description->getDescriptiontype()->getShortcode()->getCode()
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
        
        $this->assertArrayHasKey('description', $description->toArray());
        $this->assertArrayHasKey('descriptiontype', $description->toArray());
        $this->assertArrayHasKey(
            'propertymarketingbrandid',
            $description->toArray()
        );
        $this->assertArrayHasKey('name', $description->getDescriptiontype()->toArray());
        $this->assertArrayHasKey('shortcode', $description->getDescriptiontype()->toArray());
        $this->assertArrayHasKey('encoding', $description->getDescriptiontype()->toArray());
        $this->assertArrayHasKey('minimumlength', $description->getDescriptiontype()->toArray());
        $this->assertArrayHasKey('maximumlength', $description->getDescriptiontype()->toArray());
    }
    
    /**
     * Test property attributes
     * 
     * @return void
     */
    public function testPropertyAttributes()
    {
        $property = Fixtures::getProperty();
        $attributes = $property->getAttributes()->getElements();
        
        $this->assertEquals(
            '\tabs\apiclient\property\PropertyAttribute',
            $property->getAttributes()->getElementClass()
        );
        
        $this->assertEquals(
            '/property/1/attribute',
            $property->getAttributes()->getRoute()
        );
        
        $this->assertEquals(
            true,
            $attributes[0]->getValue()->getBoolean()
        );
        
        $this->assertEquals(
            0,
            $attributes[0]->getValue()->getNumber()
        );
        
        $this->assertEquals(
            true,
            $attributes[0]->getValue()->getValue()
        );
        
        $this->assertEquals(
            '/property/1/attribute',
            $attributes[0]->getCreateUrl()
        );
        $this->assertEquals(
            '/property/1/attribute/1',
            $attributes[0]->getUpdateUrl()
        );
        
        foreach ($attributes as $attr) {
            $this->assertArrayHasKey('type', $attr->toArray());
            $this->assertArrayHasKey('attributeid', $attr->toArray());
            
            if ($attr->getAttribute()->getType() == 'Hybrid') {
                $this->assertArrayHasKey('value', $attr->toArray());
                $this->assertArrayHasKey('boolean', $attr->toArray()['value']);
                $this->assertArrayHasKey('number', $attr->toArray()['value']);
            }
            
            if ($attr->getAttribute()->getUnit()) {
                $this->assertArrayHasKey('unit', $attr->toArray());
            }
        }
    }
    
    /**
     * Test property images
     * 
     * @return void
     */
    public function testPropertyImages()
    {
        $property = Fixtures::getProperty();
        $images = $property->getImages()->getElements();
        
        $this->assertEquals(
            '\tabs\apiclient\property\Image',
            $property->getImages()->getElementClass()
        );
        
        $this->assertEquals(
            '/property/1/image',
            $property->getImages()->getRoute()
        );
        
        $this->assertEquals(1, $images[0]->getId());
        $this->assertArrayHasKey('id', $images[0]->toArray());
        $this->assertArrayHasKey('imageid', $images[0]->toArray());
    }
    
    /**
     * Test a new prop object.  Makes sure everything is instantiating correctly
     * 
     * @return void
     */
    public function testNewProperty()
    {
        $prop = new \tabs\apiclient\property\Property();
        $this->assertFalse($prop->getOwners()->getCurrent());
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
        $this->assertArrayHasKey('name', $property->toArray());
        $this->assertArrayHasKey('namequalifier', $property->toArray());
        $this->assertArrayHasKey('address', $property->toArray());
        $this->assertArrayHasKey('sleeps', $property->toArray());
        $this->assertArrayHasKey('bedrooms', $property->toArray());
        $this->assertArrayHasKey('tabspropref', $property->toArray());
    }
}