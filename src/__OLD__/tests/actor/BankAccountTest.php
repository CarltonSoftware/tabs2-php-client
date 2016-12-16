<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class BankAccountTest extends ApiClientClassTest
{
    /**
     * Test creating a new bank account
     *
     * @return void
     */
    public function testBankAccount()
    {
        $bankAccount = Fixtures::getBankAccount();
        
        $this->assertEquals(
            'Bank Awesome, Developer Room, Carlton House, Market Place, Reepham, Norfolk, NR104JJ',
            (string) $bankAccount
        );
        
        $this->assertEquals(8, count($bankAccount->toArray()));
        $this->assertEquals('bankaccount', $bankAccount->getUrlStub());
        
        // Test setting a new address
        $bankAccount->setAddress(array('line1' => 'No Where'));
        
        $this->assertEquals(
            'Bank Awesome, No Where',
            (string) $bankAccount
        );
    }
}
