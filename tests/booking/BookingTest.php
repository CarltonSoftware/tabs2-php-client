<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class BookingTest extends ApiClientClassTest
{
    /**
     * Test contact address accessors
     *
     * @return void
     */
    public function testBooking()
    {
        $booking = Fixtures::getBooking();

        $this->assertEquals('2015-10-06', $booking->getFromdate()->format('Y-m-d'));
    }

    /**
     * Test exception when trying to get a null property object
     *
     * @expectedException \tabs\apiclient\client\Exception
     * @expectedExceptionMessage A valid property URL is required (currently null).
     *
     * @return void
     */
    public function testGetPropertyObjException()
    {
        $booking = Fixtures::getBooking();

        $booking->getPropertyObj();
    }

    /**
     * Test exception when trying to get a null branding object
     *
     * @expectedException \tabs\apiclient\client\Exception
     * @expectedExceptionMessage A valid branding URL is required (currently null).
     *
     * @return void
     */
    public function testGetBrandingObjException()
    {
        $booking = Fixtures::getBooking();

        $booking->getBrandingObj();
    }
}