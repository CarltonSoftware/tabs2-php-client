<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class CustomerTest extends ApiClientClassTest
{

    /**
     * Test creating a new customer
     *
     * @return null
     */
    public function testNewCustomer()
    {
        $customer = new \tabs\actor\Customer();
        $customer->setTitle('Mr')->setSurname('Wyett');
        $this->assertEquals('Mr', $customer->getTitle());
        $this->assertEquals('Wyett', $customer->getSurname());
    }
}
