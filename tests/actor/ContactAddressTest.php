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
     * Test creating a new contact address
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
        $this->assertEquals(9, count($contactAddress->toArray()));
    }
}