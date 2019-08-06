<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class PropertyTest extends ApiClientClassTest
{
    /**
     * Test property get
     */
    public function testGet()
    {
        $property = new \tabs\apiclient\Property(1);
        $property->get();
        
        $this->assertEquals(1, $property->getId());
        $this->assertEquals('Bicclescombe Park Road', $property->getName());
    }
    
    /**
     * Test property serialization
     */
    public function testSerialization()
    {
        $property = new \tabs\apiclient\Property(1);
        $property->get();
        
        $this->_testSerialisedProperty($property);
    }
    
    /**
     * Test the collections to make sure they are instantiating properly
     */
    public function testCollections()
    {
        $property = new \tabs\apiclient\Property(1);
        foreach ($property->__COLLECTION_MAP as $key => $col) {
            $this->assertInstanceOf(
                '\tabs\apiclient\Collection',
                $property->getCollection($key)
            );
            $this->assertInstanceOf(
                'tabs\apiclient\\' . $col['class'],
                $property->getCollection($key)->getElementClass()
            );
            
            if (isset($col['parent']) && $col['parent'] === true) {
                $this->assertEquals(
                    $property,
                    $property->getCollection($key)->getElementParent()
                );
            }
        }
    }
    
    /**
     * Test serialising a property using fields
     */
    public function testSerializationTwo()
    {
        $c = tabs\apiclient\Collection::factory(
            'property',
            new \tabs\apiclient\Property
        );
        
        $c->setFilters(
            array('id' => 1)
        )->setPage(1)
        ->setLimit(1)
        ->setFields(
            array(
                'name',
                'tabspropref',
                'address',
                'area',
                'location',
                'sleeps',
                'bedrooms',
                'maximumpets',
                'rating',
                'longitude',
                'latitude',
                'brandings'
            )
        )->fetch();
        
        $p = $c->first();
        
        $this->_testSerialisedProperty($p);
    }
    
    /**
     * Test serialising property
     * 
     * @param \tabs\apiclient\Property $property Property
     * 
     * @return void
     */
    private function _testSerialisedProperty(\tabs\apiclient\Property $property)
    {
        $s = serialize($property);
        
        $this->assertTrue(is_string($s));
        
        $p = unserialize($s);
        
        $this->assertEquals($property->getId(), $p->getId());
        $this->assertEquals($property->getName(), $p->getName());
        
        if ($property->getPrimarypropertybranding()) {
            $this->_comparePropertyBrandings(
                $property->getPrimarypropertybranding(),
                $p->getPrimarypropertybranding()
            );
        }
        
        if ($property->getBrandings()->count() > 0) {
            $this->_comparePropertyBrandings(
                $property->getBrandings()->first(),
                $p->getBrandings()->first()
            );
        }
    }
    
    /**
     * Compare the brandings
     * 
     * @param tabs\apiclient\property\Branding $b1 Branding
     * @param tabs\apiclient\property\Branding $b2 Branding
     * 
     * @return void
     */
    private function _comparePropertyBrandings(
        tabs\apiclient\property\Branding $b1,
        tabs\apiclient\property\Branding $b2
    ) {
        $this->assertEquals(
            $b1->getId(),
            $b2->getId()
        );
        $this->assertEquals(
            $b1->getBranding()->getId(),
            $b2->getBranding()->getId()
        );
        $this->assertEquals(
            $b1->getMarketingbrand()->getId(),
            $b2->getMarketingbrand()->getId()
        );
        $this->assertEquals(
            $b1->getMarketingbrand()->getUpdateUrl(),
            $b2->getMarketingbrand()->getUpdateUrl()
        );
    }
}
