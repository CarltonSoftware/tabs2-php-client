<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class ConfigurationClassTest extends ApiClientClassTest
{
    /**
     * Test a brand extra configuration option
     * 
     * @return void
     */
    public function testConfiguration()
    {
        $config = Fixtures::getExtraBrandingConfiguration();
        $vatband = Fixtures::getVatband();
        $config->setVatband($vatband);

        $this->assertEquals(50, $config->getVatband()->getCurrentVatrate()->getPercentage());

        $this->assertEquals('2014-01-01 - 2029-12-31', (string) $config);

        $this->assertArrayHasKey('fromdate', $config->toArray());
        $this->assertArrayHasKey('todate', $config->toArray());
        $this->assertArrayHasKey('compulsory', $config->toArray());
        $this->assertArrayHasKey('included', $config->toArray());

        $this->assertEquals('configuration', $config->getUrlStub());
    }

    /**
     * Test the brand extra configuration collection
     * 
     * @return void
     */
    public function testConfigurationCollection()
    {
        $col = new tabs\apiclient\collection\core\extra\Configuration();

        $this->assertTrue(is_array($col->getElements()));

        $this->assertEquals(
            '\tabs\apiclient\core\extra\Configuration',
            $col->getElementClass()
        );
        $this->assertEquals('type', $col->discriminator());

        $this->assertArrayHasKey('BrandExtraConfiguration', $col->discriminatorMap());
    }
}