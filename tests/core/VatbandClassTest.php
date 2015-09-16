<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class VatbandClassTest extends ApiClientClassTest
{
    /**
     * Test the VAT band
     * 
     * @return void
     */
    public function testVatband()
    {
        $band = Fixtures::getVatband();

        $this->assertEquals('Standard band', $band->getVatband());
        $this->assertEquals(50, $band->getCurrentVatrate()->getPercentage());
        $this->assertEquals('Standard band - 50%', (string) $band);

        $this->assertArrayHasKey('id', $band->toArray());
        $this->assertArrayHasKey('band', $band->toArray());

        $band->setVatrates(
            array(
                Fixtures::getVatrate(),
                Fixtures::getVatrate(),
            )
        );
        $this->assertCount(3, $band->getVatrates());
    }
}