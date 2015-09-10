<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class PriceTypeClassTest extends ApiClientClassTest
{
    /**
     * Test Price Type accessors
     *
     * @return void
     */
    public function testPricetype()
    {
        $priceType = Fixtures::getPricetype();

        $this->assertEquals('1 Day Break', (string) $priceType);

        $array = $priceType->toArray();
        $this->assertEquals('1 Day Break', $array['description']);
        $this->assertEquals(1, $array['periods']);
        $this->assertEquals(false, $array['additional']);
    }
}
