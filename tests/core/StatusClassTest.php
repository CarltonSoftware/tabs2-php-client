<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class StatusClassTest extends ApiClientClassTest
{
    /**
     * Test a status object
     * 
     * @return void
     */
    public function testStatus()
    {
        $status = Fixtures::getStatus();
        $this->assertEquals(1, $status->getId());
        $this->assertEquals('Live', $status->getName());
    }
    
    /**
     * Test a status history object
     * 
     * @return void
     */
    public function testStatusHistory()
    {
        $history = Fixtures::getLiveStatusHistory();
        $this->assertEquals(1, $history->getId());
        $this->assertEquals('Live', $history->getStatus()->getName());
        $this->assertEquals('2012-01-31', $history->getFromdate()->format('Y-m-d'));
    }
}
