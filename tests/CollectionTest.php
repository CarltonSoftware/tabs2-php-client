<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class CollectionTest extends ApiClientClassTest
{
    /**
     * Test the factory method
     */
    public function testFactoryMethod()
    {
        $c1 = tabs\apiclient\Collection::factory('property', new \tabs\apiclient\Property);
        $c2 = tabs\apiclient\Collection::factory(new \tabs\apiclient\Property);
        $this->_compare($c1, $c2);
    }
    
    /**
     * Test the factory method with parents
     */
    public function testFactoryMethodTwo()
    {
        $c1 = tabs\apiclient\Collection::factory(
            'branding',
            new tabs\apiclient\property\Branding,
            new tabs\apiclient\Property(1)
        );
        $c2 = tabs\apiclient\Collection::factory(
            new tabs\apiclient\property\Branding,
            new tabs\apiclient\Property(1)
        );
        $this->_compare($c1, $c2);
    }
    
    private function _compare(
        tabs\apiclient\Collection $c1,
        tabs\apiclient\Collection $c2
    ) {
        $this->assertEquals($c1->getPath(), $c2->getPath());
        $this->assertEquals($c1->getRoute(), $c2->getRoute());
    }
}
