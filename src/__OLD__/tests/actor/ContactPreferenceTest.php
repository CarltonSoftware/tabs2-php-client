<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class ContactPreferenceTest extends ApiClientClassTest
{
    /**
     * Test creating a new contact preference
     *
     * @return void
     */
    public function testContactPreference()
    {
        $detail = Fixtures::getContactDetail();
        $preferences = $detail->getContactpreferences();
        $preference = $preferences[0];

        $this->assertEquals(1, $preference->getId());
        $this->assertEquals(1, $preference->getPriority());
        $this->assertEquals('Customer', $preference->getRolereason()->getRole());
        $this->assertEquals('Booking Confirmation', $preference->getRolereason()->getReason());
        $this->assertArrayHasKey('role', $preference->getRolereason()->toArray());
        $this->assertArrayHasKey('reason', $preference->getRolereason()->toArray());
        $this->assertEquals(5, count($preference->toArray()));
        $this->assertEquals('contactpreference', $preference->getUrlStub());
        $this->assertEquals('Customer: Booking Confirmation', (string) $preference->getRolereason());
    }
}
