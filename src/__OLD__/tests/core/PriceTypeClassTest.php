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
     * Test Price Type
     *
     * @return void
     */
    public function testPriceType()
    {
        $priceType = Fixtures::getPriceType();

        $this->assertEquals('1 Day Break', (string) $priceType);

        $array = $priceType->toArray();
        $this->assertEquals('1 Day Break', $array['description']);
        $this->assertEquals(1, $array['periods']);
        $this->assertEquals(false, $array['additional']);
    }

    /**
     * Test Price Type brandings
     *
     * @return void
     */
    public function testPriceTypeBrandings()
    {
        $priceType = Fixtures::getPriceType();
        $branding = Fixtures::getPriceTypeBranding();
        $branding->setType('Fixed');

        $priceType->addBranding($branding);

        $array = $priceType->getBrandings()->getElements()[0]->toArray();
        $this->assertEquals('Fixed', $array['type']);

        $priceType->setBrandings(
            array(
                $branding
            )
        );
        $this->assertEquals(2, $priceType->getBrandings()->getTotal());

        $this->assertEquals('/pricetype/1/branding', $priceType->getBrandings()->getRoute());
        $this->assertEquals('\tabs\apiclient\core\pricing\PriceTypeBranding', $priceType->getBrandings()->getElementClass());
    }

    /**
     * Test Price Type branding start days
     *
     * @return void
     */
    public function testPriceTypeBrandingStartdays()
    {
        $priceType = Fixtures::getPriceType();

        $branding = Fixtures::getPriceTypeBranding();
        $priceType->addBranding($branding);

        $branding->setStartdays(
            array(
                Fixtures::getStartday(),
                Fixtures::getStartday(),
            )
        );

        $this->assertEquals(3, $branding->getStartdays()->current()->getDayssincechangeday());
        $this->assertEquals('3 days since changeday', (string) $branding->getStartdays()->current());
        $this->assertArrayHasKey('dayssincechangeday', $branding->getStartdays()->current()->toArray());

        $startday = Fixtures::getStartday();
        $branding->addStartday($startday);

        $this->assertCount(3, $branding->getStartdays());
    }
}
