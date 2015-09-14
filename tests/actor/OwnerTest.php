<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class OwnerTest extends ApiClientClassTest
{
    /**
     * Test creating a new owner
     *
     * @return void
     */
    public function testNewOwner()
    {
        $owner = Fixtures::getOwner();
        $this->assertEquals(1, $owner->getId());
        $this->assertEquals('Mr', $owner->getTitle());
        $this->assertEquals('Wyett', $owner->getSurname());
        $this->assertEquals('abc123', $owner->getPassword());
        $this->assertTrue($owner->isActive());
    }

    /**
     * Test that deleting an actor is not possible
     *
     * @expectedException        \tabs\apiclient\client\Exception
     * @expectedExceptionMessage Deleting a Owner is not permitted 
     */
    public function testDeleteOwnerException()
    {
        $owner = Fixtures::getOwner();
        $owner->delete();
    }

    /**
     * Test that trying to get a non-existent parent Actor throws an exception
     *
     * @expectedException        \tabs\apiclient\client\Exception
     * @expectedExceptionMessage Parent actor not found 
     */
    public function testGetParentActorException()
    {
        $owner = Fixtures::getOwner();
        $owner->getParentActor();
    }

    /**
     * Test that trying to get a non-existent parent Property throws an exception
     *
     * @expectedException        \tabs\apiclient\client\Exception
     * @expectedExceptionMessage Parent property not found 
     */
    public function testGetParentPropertyException()
    {
        $owner = Fixtures::getOwner();
        $owner->getParentProperty();
    }
}
