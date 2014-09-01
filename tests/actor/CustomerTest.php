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
     * @return void
     */
    public function testNewCustomer()
    {
        $customer = new \tabs\apiclient\actor\Customer();
        $customer->setTitle('Mr')->setSurname('Wyett');
        $this->assertEquals('Mr', $customer->getTitle());
        $this->assertEquals('Wyett', $customer->getSurname());
        
        // Check other accessors are working
        $customer->salutation = 'Alex';
        $this->assertEquals('Alex', $customer->salutation);
    }
    
    /**
     * Test the update routes created by the builder class
     * 
     * @return void
     */
    public function testCreateRoutes()
    {
        $customer = new \tabs\apiclient\actor\Customer();
        $customer->setId(1);
        $this->assertEquals('/customer', $customer->getCreateUrl());
        $this->assertEquals('/customer/1', $customer->getUpdateUrl());

        $bankAccount = new \tabs\apiclient\actor\BankAccount();
        $bankAccount->setId(1);
        $customer->addBankAccount($bankAccount);
        $this->assertEquals('/customer/1/bankaccount', $bankAccount->getCreateUrl());
        $this->assertEquals('/customer/1/bankaccount/1', $bankAccount->getUpdateUrl());

        $contactDetail = new tabs\apiclient\actor\ContactDetail();
        $contactDetail->setId(1);
        $customer->addContact($contactDetail);
        $this->assertEquals('/customer/1/contactdetail', $contactDetail->getCreateUrl());
        $this->assertEquals('/customer/1/contactdetail/1', $contactDetail->getUpdateUrl());
        
        $preference = new tabs\apiclient\actor\ContactPreference();
        $preference->setId(1);
        $contactDetail->addContactpreference($preference);
        $this->assertEquals('/customer/1/contactdetail/1/contactpreference', $preference->getCreateUrl());
        $this->assertEquals('/customer/1/contactdetail/1/contactpreference/1', $preference->getUpdateUrl());

        $contactAddress = new tabs\apiclient\actor\ContactAddress();
        $customer->addContact($contactAddress);
        $contactAddress->setId(1);
        $this->assertEquals('/customer/1/address', $contactAddress->getCreateUrl());
        $this->assertEquals('/customer/1/address/1', $contactAddress->getUpdateUrl());
        
        $preference2 = new tabs\apiclient\actor\ContactPreference();
        $preference2->setId(1);
        $contactAddress->addContactpreference($preference2);
        $this->assertEquals('/customer/1/address/1/contactpreference', $preference2->getCreateUrl());
        $this->assertEquals('/customer/1/address/1/contactpreference/1', $preference2->getUpdateUrl());
    }
}
