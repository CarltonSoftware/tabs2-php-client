<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class AddressClassTest extends ApiClientClassTest
{
    /**
     * Address object
     * 
     * @var \tabs\apiclient\core\Address
     */
    protected $address;

    /**
     * Sets up the tests
     *
     * @return void
     */
    public function setUp()
    {
        $this->address = Fixtures::getAddress();
    }
    
    /**
     * Test a new address object
     * 
     * @return void 
     */
    public function testAddressObject()
    {
        $this->_addressObjectTest($this->address);
    }
    
    /**
     * Test a new address string
     * 
     * @return void 
     */
    public function testAddressString()
    {
        $this->address->setCountry(
            Fixtures::getCountry()
        );
        $this->assertEquals(
            'Developer Room, Carlton House, Market Place, Reepham, Norfolk, NR104JJ, United Kingdom', 
            (string) $this->address
        );
    }
    
    /**
     * Test a new address array
     * 
     * @return void 
     */
    public function testAddressArray()
    {
        $this->assertEquals(9, count($this->address->toArray()));
    }
    
    /**
     * Test the address object
     * 
     * @param \tabs\apiclient\core\Address $address Address
     * 
     * @return void
     */
    private function _addressObjectTest($address)
    {
        $this->assertEquals('Developer Room', $address->getLine1());
        $this->assertEquals('Carlton House', $address->getLine2());
        $this->assertEquals('Market Place', $address->getLine3());
        $this->assertEquals('Reepham', $address->getTown());
        $this->assertEquals('Norfolk', $address->getCounty());
        $this->assertEquals('NR104JJ', $address->getPostcode());
    }
}
