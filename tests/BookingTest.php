<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class BookingTest extends ApiClientClassTest
{
    const BOOKING_ID = 4276073;

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
        $this->assertEquals(669, $booking->getBasicPrice());
        $this->assertEquals(699, $booking->getBrochurePrice());
        $this->assertEquals(2, $booking->getExtras()->count());
        $this->assertEquals(30, $booking->getIncludedExtrasPrice());
        $this->assertEquals(36, $booking->getAdditionalExtrasPrice());
        $this->assertEquals(20, $booking->getSecuritydeposit()->getAmount());
        $this->assertEquals(0, $booking->getSecuritydeposit()->getOutstanding());
        $this->assertEquals(20, $booking->getSecuritydeposit()->getRefundable());
        $this->assertEquals(0, $booking->getSecuritydeposit()->getRefunded());
    }
}
