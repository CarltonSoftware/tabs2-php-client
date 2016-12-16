<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class VatrateClassTest extends ApiClientClassTest
{    
    /**
     * Test VAT rate
     * 
     * @return void
     */
    public function testVatrate()
    {
        $rate = Fixtures::getVatrate();

        $this->assertEquals(50, $rate->getPercentage());
        $this->assertEquals('1984-02-28', $rate->getFromdate()->format('Y-m-d'));
        $this->assertEquals('3000-04-30', $rate->getTodate()->format('Y-m-d'));

        $this->assertArrayHasKey('percentage', $rate->toArray());
        $this->assertArrayHasKey('fromdate', $rate->toArray());
        $this->assertArrayHasKey('todate', $rate->toArray());
    }
}
