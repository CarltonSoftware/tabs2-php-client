<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class ContactAddressTest extends ApiClientClassTest
{
    /**
     * Test contact address accessors
     *
     * @return void
     */
    public function testContactAddress()
    {
        $contactAddress = Fixtures::getContactAddress();
        
        $this->assertEquals('address', $contactAddress->getUrlStub());
        $this->assertEquals(
            'Developer Room, Carlton House, Market Place, Reepham, Norfolk, NR104JJ', 
            (string) $contactAddress
        );
        $this->assertEquals(11, count($contactAddress->toArray()));
    }
    
    /**
     * Test creating a new contact address
     *
     * @return void
     */
    public function testNewContactAddress()
    {
        $contactAddress = new tabs\apiclient\actor\ContactAddress();
        $contactAddress->setAddress(array('line1' => 'House', 'country' => 'United Kingdom'));
        $this->assertEquals(
            'House', 
            (string) $contactAddress
        );
    }
}