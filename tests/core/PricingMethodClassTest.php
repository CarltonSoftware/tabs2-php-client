<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class PricingMethodClassTest extends ApiClientClassTest
{
    /**
     * Test Pricing Method
     *
     * @return void
     */
    public function testPricingMethod()
    {
        $priceType = Fixtures::getPricingMethod();

        $this->assertEquals('Tabs New Pricing', (string) $priceType);

        $array = $priceType->toArray();
        $this->assertEquals('Default', $array['pricingmethod']);
        $this->assertEquals('Tabs New Pricing', $array['description']);
    }

    /**
     * Test Pricing Method brandings
     *
     * @return void
     */
    public function testPricingMethodBrandings()
    {
        $pricingMethod = Fixtures::getPricingMethod();
        $branding = Fixtures::getPricingMethodBranding();

        $pricingMethod->addBranding($branding);

        $array = $pricingMethod->getBrandings()->getElements()[0]->toArray();
        $this->assertEquals('Norfolk', $array['branding']->getBrandinggroup()->getName());

        $pricingMethod->setBrandings(
            array(
                $branding
            )
        );
        $this->assertEquals(2, $pricingMethod->getBrandings()->getTotal());
    }
}
