<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class PropertyOwnerTest extends ApiClientClassTest
{
    /**
     * Test a property owner
     * 
     * @return void
     */
    public function testPropertyOwner()
    {
        $property = Fixtures::getProperty();
        $owner = $property->getOwners()->getCurrent();

        $owner->setOwnertodate('14-11-1999')
            ->setOwnerfromdate('07-02-2007');

        $this->assertEquals($owner->getTodate()->format('Y-m-d'), '1999-11-14');
        $this->assertEquals($owner->getFromdate()->format('Y-m-d'), '2007-02-07');
        $this->assertEquals($owner->getOwner()->getSurname(), 'Wyett');
    }
}
