<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class BookingTest extends ApiClientClassTest
{
    const BOOKING_ID = 119644;

    /**
     * Test booking get
     */
    public function testGet()
    {
        $booking = new \tabs\apiclient\Booking(self::BOOKING_ID);
        $booking->get();
        
        $this->_validateBooking($booking);
        
        $booking->get();
        
        $this->_validateBooking($booking);
    }
    
    /**
     * Validate the booking
     * 
     * @param tabs\apiclient\Booking $booking
     * 
     * @return void
     */
    private function _validateBooking(tabs\apiclient\Booking $booking)
    {
        $this->assertEquals(self::BOOKING_ID, $booking->getId());
        $this->assertEquals(893.58, $booking->getBasicPrice());
        $this->assertEquals(932, $booking->getBrochurePrice());
        $this->assertEquals(2, $booking->getExtras()->count());
        $this->assertEquals(38.42, $booking->getIncludedExtrasPrice());
        $this->assertEquals(30, $booking->getAdditionalExtrasPrice());
        $this->assertEquals(50, $booking->getSecuritydeposit()->getAmount());
        $this->assertEquals(50, $booking->getSecuritydeposit()->getOutstanding());
        $this->assertEquals(0, $booking->getSecuritydeposit()->getRefundable());
        $this->assertEquals(0, $booking->getSecuritydeposit()->getRefunded());
    }
}
