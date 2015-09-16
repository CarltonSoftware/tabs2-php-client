<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class CurrencyClassTest extends ApiClientClassTest
{
    /**
     * Test a Currency object
     *
     * @return void
     */
    public function testCurrency()
    {
        $currency = Fixtures::getCurrency();
        $currency->setId(2);
        $array = $currency->toArray();
        $this->assertEquals(2, $array['id']);
        $this->assertEquals('GBP', $array['code']);
        $this->assertEquals('Great British Pound', $array['name']);
        $this->assertEquals('2', $array['decimalplaces']);
    }
}
