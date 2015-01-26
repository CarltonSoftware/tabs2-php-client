<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class UnitClassTest extends ApiClientClassTest
{
    /**
     * Test a unit object
     * 
     * @return void
     */
    public function testUnit()
    {
        $unit = Fixtures::getUnit();
        $this->assertEquals(1, $unit->getId());
        $this->assertEquals('m', $unit->getName());
        $this->assertEquals('Metre', $unit->getDescription());
        $this->assertEquals(1, $unit->getDecimalplaces());
    }
}
