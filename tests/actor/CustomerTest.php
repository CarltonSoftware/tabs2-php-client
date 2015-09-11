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
        $customer = Fixtures::getCustomer();
        $this->assertEquals(1, $customer->getId());
        $this->assertEquals('Mr', $customer->getTitle());
        $this->assertEquals('Wyett', $customer->getSurname());

        // Check other accessors are working
        $customer->salutation = 'Alex';
        $this->assertEquals('Alex', $customer->salutation);
        $this->assertEquals($customer->toArray(), $customer->toCreateArray());
        $this->assertEquals($customer->toArray(), $customer->toUpdateArray());

        // Test actor language
        $this->assertInstanceOf('\tabs\apiclient\core\Language', $customer->getLanguage());
        $customer->setLanguage('Deutsch');
        $this->assertInstanceOf('\tabs\apiclient\core\Language', $customer->getLanguage());
        $this->assertEquals('Deutsch', $customer->getLanguage()->getName());
    }

    /**
     * Test customer contact details
     *
     * @return void
     */
    public function testCustomerDetails()
    {
        $customer = Fixtures::getCustomer();

        $this->assertCount(0, $customer->getContactdetails());

        $customer->setContactDetails(
            array(
                Fixtures::getContactDetail(),
                Fixtures::getContactAddress(),
            )
        );

        $this->assertCount(2, $customer->getContactdetails());
        $this->assertCount(1, $customer->getContactAddresses());
        $this->assertCount(0, $customer->getEmailAddresses());
        $this->assertCount(1, $customer->getPhoneNumbers());
    }

    /**
     * Test creating customer collections
     *
     * @return void
     */
    public function testNewCustomerCollections()
    {
        $customer = Fixtures::getCustomer();

        $this->assertEquals(
            '\tabs\apiclient\actor\ContactDetail',
            $customer->getContactdetails()->getElementClass()
        );

        $this->assertEquals(
            '/customer/1/contactdetail',
            $customer->getContactdetails()->getRoute()
        );

        $this->assertEquals(
            '\tabs\apiclient\actor\BankAccount',
            $customer->getBankaccounts()->getElementClass()
        );

        $this->assertEquals(
            '/customer/1/bankaccount',
            $customer->getBankaccounts()->getRoute()
        );
    }

    /**
     * Test filling customer collections
     *
     * @return void
     */
    public function testCustomerCollections()
    {
        $customer = Fixtures::getCustomer();


        $this->assertCount(0, $customer->getContactdetails());

        $customer->setContactDetails(
            array(
                Fixtures::getContactDetail(),
                Fixtures::getContactAddress(),
            )
        );

        $this->assertCount(2, $customer->getContactdetails());
        $this->assertCount(1, $customer->getContactAddresses());
        $this->assertCount(0, $customer->getEmailAddresses());
        $this->assertCount(1, $customer->getPhoneNumbers());


        $this->assertCount(0, $customer->getBankaccounts());

        $customer->setBankaccounts(
            array(
                Fixtures::getBankaccount(),
                Fixtures::getBankaccount(),
            )
        );

        $this->assertCount(2, $customer->getBankaccounts());
        $this->assertEquals(
            'Bank Awesome',
            $customer->getBankaccounts()->current()->getBankname()
        );


        $this->assertCount(0, $customer->getNotes());

        $customer->setNotes(
            array(
                Fixtures::getNote(),
                Fixtures::getNote(),
            )
        );

        $this->assertCount(2, $customer->getNotes());
        $this->assertEquals(
            'This is a note.',
            $customer->getNotes()->current()->getNotetexts()[0]->getText()
        );


        $this->assertCount(1, $customer->getDocuments());
        $this->assertEquals('somepdf', (string) $customer->getDocuments()->current());

        $customer->setDocuments(
            array(
                Fixtures::getActorDocument(),
                Fixtures::getActorDocument(),
            )
        );

        $this->assertCount(3, $customer->getDocuments());
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
        $this->assertCount(1, $customer->getBankaccounts()->getElements());
        $this->assertEquals('/customer/1/bankaccount', $bankAccount->getCreateUrl());
        $this->assertEquals('/customer/1/bankaccount/1', $bankAccount->getUpdateUrl());

        $contactDetail = new tabs\apiclient\actor\ContactDetailOther();
        $contactDetail->setId(1);
        $customer->addContactdetail($contactDetail);
        $this->assertEquals('/customer/1/contactdetail', $contactDetail->getCreateUrl());
        $this->assertEquals('/customer/1/contactdetail/1', $contactDetail->getUpdateUrl());

        $preference = new tabs\apiclient\actor\ContactPreference();
        $preference->setId(1);
        $contactDetail->addContactpreference($preference);
        $this->assertEquals('/customer/1/contactpreference', $preference->getCreateUrl());
        $this->assertEquals('/customer/1/contactpreference/1', $preference->getUpdateUrl());

        $contactAddress = new tabs\apiclient\actor\ContactDetailPostal();
        $customer->addContactdetail($contactAddress);
        $contactAddress->setId(1);
        $this->assertEquals('/customer/1/address', $contactAddress->getCreateUrl());
        $this->assertEquals('/customer/1/address/1', $contactAddress->getUpdateUrl());

        $preference2 = new tabs\apiclient\actor\ContactPreference();
        $preference2->setId(1);
        $contactAddress->addContactpreference($preference2);
        $this->assertEquals('/customer/1/contactpreference', $preference2->getCreateUrl());
        $this->assertEquals('/customer/1/contactpreference/1', $preference2->getUpdateUrl());

        $note = Fixtures::getNote();
        $customer->addNote($note);
        $this->assertEquals('/customer/1/note', $note->getCreateUrl());
        $this->assertEquals('/note/1', $note->getUpdateUrl());

        $this->assertTrue(is_array($customer->getContactPreferences()));
    }

}
