<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class AttributeClassTest extends ApiClientClassTest
{
    /**
     * Test a new attribute
     * 
     * @return void
     */
    public function testAttribute()
    {
        $attr = Fixtures::getHybridAttribute();
        
        $this->assertEquals(2, $attr->getId());
        $this->assertEquals('ATTR02', $attr->getCode());
        $this->assertEquals('ATTR02', (string) $attr);
        $this->assertEquals('< Pub', $attr->getName());
        $this->assertEquals('Hybrid', $attr->getType());
        $this->assertEquals('Near a pub?', $attr->getDescription());
        $this->assertEquals('<=', $attr->getOperator());
        $this->assertEquals(1, $attr->getMinimumvalue());
        $this->assertEquals(2000, $attr->getMaximumvalue());
        $this->assertFalse($attr->isUsedinavailabilitysearch());
        $this->assertFalse($attr->isBase());
        
        $this->assertEquals('m', $attr->getUnit()->getName());
        $this->assertEquals('Metre', $attr->getUnit()->getDescription());
        $this->assertEquals(1, $attr->getUnit()->getDecimalplaces());
        
        $this->assertEquals('/attribute', $attr->getCreateUrl());
        $this->assertEquals('/attribute/2', $attr->getUpdateUrl());
    }
    
    /**
     * Test a new attribute group
     * 
     * @return void
     */
    public function testAttributeGroup()
    {
        $attrGroup = Fixtures::getAttributeGroup();
        
        $this->assertEquals(1, $attrGroup->getId());
        $this->assertEquals('Misc', $attrGroup->getName());
    }
}