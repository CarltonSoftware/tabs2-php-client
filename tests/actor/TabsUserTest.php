<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class TabsUserTest extends ApiClientClassTest
{
    /**
     * Test creating a new tabs route
     *
     * @return void
     */
    public function testCreateRoute()
    {
        $route = Fixtures::getRoute();
        $this->assertEquals(1, $route->getId());
        $this->assertEquals('aurlpath', $route->getRoute());
        $this->assertEquals(2, count($route->toArray()));
    }
}