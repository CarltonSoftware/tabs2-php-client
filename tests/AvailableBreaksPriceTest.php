<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class AvailableBreaksPriceTest extends ApiClientClassTest
{
    /**
     * @dataProvider pricesProvider
     */
    public function testPrices($fromDate, $days, $price)
    {
        $property = Fixtures::getProperty();
        $this->assertEquals(
            $price,
            $property->getAvailableBreaksPrice($fromDate, $days)
        );
    }
    
    /**
     * @return array
     */
    public function pricesProvider()
    {
        return array(
            array(
                new \DateTime('2018-12-04'),
                7,
                612
            ),
            array(
                new \DateTime('2018-06-09'),
                7,
                838
            ),
            array(
                new \DateTime('2018-11-14'),
                4,
                520
            ),
            array(
                new \DateTime('2018-11-14'),
                2,
                459
            )
        );
    }
}
