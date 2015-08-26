<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class Agency extends ApiClientClassTest
{
    /**
     * Test creating a new owner
     *
     * @return void
     */
    public function testNewAgency()
    {
        $agency = Fixtures::getAgency();
        $this->assertEquals('Norfolk Country Cottages', (string) $agency);
    }
}
