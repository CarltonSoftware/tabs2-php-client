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
     * Test that the method_exists method works as expected
     *
     * @return void
     */
    public function testMethodExists()
    {
        $owner = Fixtures::getOwner();
        $this->assertFalse($owner->method_exists(4));
        $this->assertFalse($owner->method_exists('getChutney'));
        $this->assertTrue($owner->method_exists('method_exists'));
        $this->assertTrue($owner->method_exists('getId'));
    }

    /**
     * Test that magically getting a non-existent attribute isn't possible
     *
     * @expectedException        \tabs\apiclient\client\Exception
     * @expectedExceptionMessage Unknown method called: tabs\apiclient\actor\Owner:getChutney
     */
    public function testMethodExistsException()
    {
        $owner = Fixtures::getOwner();
        $owner->getChutney();
    }

    /**
     * Test that getting an Id from a string works
     *
     * @return void
     */
    public function testGetIdFromString()
    {
        $owner = Fixtures::getOwner();
        $this->assertEquals('45', $owner->getIdFromString('/property/45'));
        $this->assertEquals('45', $owner->getIdFromString('/owner/45'));
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

    /**
     * Test that setting a non-Base-derived object as an Owner's parent isn't possible
     *
     * @expectedException        \tabs\apiclient\client\Exception
     * @expectedExceptionMessage DateTime can not be set as parent of tabs\apiclient\actor\Owner
     */
    public function testSetParentException()
    {
        $owner = Fixtures::getOwner();
        $date = new \Datetime();
        $owner->setParent($date);
    }
}
