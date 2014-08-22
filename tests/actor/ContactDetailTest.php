<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class ContactDetailTest extends ApiClientClassTest
{
    /**
     * Test creating a new contact detail
     *
     * @return void
     */
    public function testContactDetail()
    {
        $contactDetail = Fixtures::getContactDetail();
        
        $this->assertEquals('ContactDetail', $contactDetail->getClass());
        $this->assertEquals('contactdetail', $contactDetail->getUrlStub());
        $this->assertEquals(1, $contactDetail->getId());
        $this->assertEquals('C', $contactDetail->getType());
        $this->assertEquals('Phone', $contactDetail->getContactmethod());
        $this->assertEquals('Home', $contactDetail->getSubtype());
        $this->assertEquals('0800 100 100', $contactDetail->getValue());
        $this->assertFalse($contactDetail->getInvalid());
        $this->assertEquals('Home Phone Number', $contactDetail->getComment());
        $this->assertEquals(4, count($contactDetail->toArray()));
        $this->assertEquals('Phone Home: 0800 100 100', (string) $contactDetail);
    }
}