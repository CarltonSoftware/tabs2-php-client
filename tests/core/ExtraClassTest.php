<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class ExtraClassTest extends ApiClientClassTest
{
    /**
     * Test an Extra object
     * 
     * @return void
     */
    public function testExtra()
    {
        $extra = Fixtures::getExtra();
        $this->assertEquals(1, $extra->getId());
        $this->assertEquals('BKFE', $extra->getExtracode());
        $this->assertEquals('Booking', $extra->getExtratype());
        $this->assertEquals('Booking Fee', $extra->getDescription());
        $this->assertEquals('extra', $extra->getUrlStub());
        
        $this->assertArrayHasKey('id', $extra->toArray());
        $this->assertArrayHasKey('extracode', $extra->toArray());
        $this->assertArrayHasKey('extratype', $extra->toArray());
        $this->assertArrayHasKey('description', $extra->toArray());
    }
    
    /**
     * Test creating Extra collections
     *
     * @return void
     */
    public function testNewExtraCollections()
    {
        $extra = Fixtures::getExtra();

        $this->assertEquals(
            '/extra/1/branding',
            $extra->getBrandings()->getRoute()
        );
        $this->assertEquals(
            '\tabs\apiclient\core\extra\Branding',
            $extra->getBrandings()->getElementClass()
        );

        $this->assertEquals(1, count($extra->getBrandings()));
        $branding = $extra->getBrandings()->current();

        $this->assertEquals(
            'Norfolk - Norfolk - Norfolk',
            (string) $branding
        );

        $this->assertEquals('/extra/1/branding/1/configuration', $branding->getConfigurations()->getRoute());

        // Test brand configuration
        $config = $branding->getConfigurations()->current();
        $this->assertEquals('2014-01-01', $config->getFromdate()->format('Y-m-d'));
        $this->assertEquals('2029-12-31', $config->getTodate()->format('Y-m-d'));
        $this->assertTrue($config->getPayagency());
        
        // Test price collection
        $this->assertCount(2, $branding->getPrices()->getElements());
        $this->assertEquals('/extra/1/branding/1/pricing', $branding->getPrices()->getRoute());
        $this->assertEquals('\tabs\apiclient\core\extra\Price', $branding->getPrices()->getElementClass());
        $this->assertEquals('pricetype', $branding->getPrices()->discriminator());
        $this->assertEquals('pricetype', $branding->getPrices()->discriminator());

        // Test price collection discriminator map
        $discriminatorMap = $branding->getPrices()->discriminatorMap(); 
        $this->assertEquals('\tabs\apiclient\core\extra\UnitPrice', $discriminatorMap['Unit']);
        $this->assertEquals('\tabs\apiclient\core\extra\WeekPrice', $discriminatorMap['Week']);
        $this->assertEquals('\tabs\apiclient\core\extra\DailyPrice', $discriminatorMap['Daily']);
        $this->assertEquals('\tabs\apiclient\core\extra\PercentagePrice', $discriminatorMap['Percentage']);
        $this->assertEquals('\tabs\apiclient\core\extra\PercentagePlusPrice', $discriminatorMap['PercentagePlus']);
        $this->assertEquals('\tabs\apiclient\core\extra\RangePrice', $discriminatorMap['Range']);

        // Test brand unit price
        $price = $branding->getPrices()->current();
        $this->assertEquals('2014-01-01', $price->getFromdate()->format('Y-m-d'));
        $this->assertEquals('2029-12-31', $price->getTodate()->format('Y-m-d'));
        $this->assertEquals(false, $price->getPeradult());
        $this->assertEquals(false, $price->getPerchild());
        $this->assertEquals(false, $price->getPerinfant());
        $this->assertEquals('GBP', $price->getCurrency()->getCode());
        $this->assertEquals('Great British Pound', $price->getCurrency()->getName());
        $this->assertEquals(2, $price->getCurrency()->getDecimalplaces());
        
        // Test daily price
        $price2 = $branding->getPrices()->next();
        $this->assertEquals('2015-01-01', $price2->getFromdate()->format('Y-m-d'));
        $this->assertEquals('2016-12-31', $price2->getTodate()->format('Y-m-d'));
        $this->assertEquals(true, $price2->getPeradult());
        $this->assertEquals(false, $price2->getPerchild());
        $this->assertEquals(false, $price2->getPerinfant());
        $this->assertEquals('GBP', $price2->getCurrency()->getCode());
        $this->assertEquals('Great British Pound', $price2->getCurrency()->getName());
        $this->assertEquals(2, $price2->getCurrency()->getDecimalplaces());
        $this->assertEquals(7, count($price2->getDailyprices()));

        $this->assertEquals('Type: DailyPrice Dates: 2015-01-01 - 2016-12-31 Currency: Great British Pound', (string) $price2);
        $this->assertEquals('pricing', $price2->getUrlStub());
        
        foreach ($price2->getDailyprices() as $dp) {
            $this->assertEquals(false, $dp->getAdditional());
            $this->assertGreaterThan(9, $dp->getPrice());
        }
        
        // Make sure keys are ok in toArray
        $this->assertArrayHasKey('fromdate', $price2->toArray());
        $this->assertArrayHasKey('todate', $price2->toArray());
        $this->assertArrayHasKey('peradult', $price2->toArray());
        $this->assertArrayHasKey('perinfant', $price2->toArray());
        $this->assertArrayHasKey('perchild', $price2->toArray());
        $this->assertArrayHasKey('propertypricing', $price2->toArray());
        $this->assertArrayHasKey('currencycode', $price2->toArray());
        $this->assertArrayHasKey('dailyprices', $price2->toArray());
    }

    /**
     * Test Extra banding
     *
     * @return void
     */
    public function testExtraBranding()
    {
        $extra = Fixtures::getExtra();
        $array = $extra->getBrandings()->current()->toArray();

        $this->assertEquals(1, $array['id']);
        $this->assertEquals(1, $array['brandingid']);
    }

    /**
     * Test the update routes created by the builder class
     * 
     * @return void
     */
    public function testCreateRoutes()
    {
        $extra = Fixtures::getExtra();
        $this->assertEquals('/extra', $extra->getCreateUrl());
        $this->assertEquals('/extra/1', $extra->getUpdateUrl());
        
        $this->assertEquals('/extra/1/branding/1/configuration', $extra->getBrandings()->current()->getConfigurations()->current()->getCreateUrl());
        $this->assertEquals('/extra/1/branding/1/configuration/1', $extra->getBrandings()->current()->getConfigurations()->current()->getUpdateUrl());
        
        $extraBranding = Fixtures::getExtraBranding();
        $extra->addBranding($extraBranding);
        $this->assertEquals(2, count($extra->getBrandings()->getElements()));
        $this->assertEquals('/extra/1/branding', $extraBranding->getCreateUrl());
        $this->assertEquals('/extra/1/branding/1', $extraBranding->getUpdateUrl());
    }
}