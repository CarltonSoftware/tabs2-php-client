<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class BookingBrandTest extends ApiClientClassTest
{
    /**
     * Test creating a new bookingBrand object
     *
     * @return void
     */
    public function testBookingBrand()
    {
        $bookingBrand = Fixtures::getBookingBrand();
        
        $this->assertEquals(
            'NOBB - Norfolk',
            (string) $bookingBrand
        );
        
        $this->assertEquals('bookingbrand', $bookingBrand->getUrlStub());
    }
}