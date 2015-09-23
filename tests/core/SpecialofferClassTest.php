<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class SpecialofferClassTest extends ApiClientClassTest
{    
    /**
     * Test Special offer object (fixed price)
     * 
     * @return void
     */
    public function testSpecialoffer()
    {
        $offer = Fixtures::getSpecialoffer();
        
        $this->assertEquals('specialoffer', $offer->getUrlStub());
        $this->assertEquals('£10 off', $offer->getDescription());
        $this->assertEquals('Week', $offer->getPricingperiod()->getPricingperiod());
        
        $posts = array(
            'type',
            'description',
            'minimumholidaylength',
            'maximumholidaylength',
            'minimumoccupancy',
            'maximumoccupancy',
            'minimumdaysbeforeholiday',
            'maximumdaysbeforeholiday',
            'daysbeforeappliestowholeholiday',
            'additional',
            'advertise',
            'changedaystartfinishonly',
            'currencycode',
            'amount',
            'active',
            'pricingperiod',
            'perperiod',
            'applytopartysizepricing'
        );
        
        foreach ($posts as $post) {
            $this->assertArrayHasKey($post, $offer->toArray());
        }
    }
    
    /**
     * Test a booking period object
     * 
     * @return void
     */
    public function testSpecialoffeBookingperiod()
    {
        $offer = Fixtures::getSpecialoffer();
        $bp = Fixtures::getBookingperiod();
        $offer->addBookingPeriod($bp);
        
        $this->assertEquals('/specialoffer/1/bookingperiod', $bp->getCreateUrl());
        
        foreach (array('fromdate', 'todate') as $post) {
            $this->assertArrayHasKey($post, $bp->toArray());
        }
    }
}
