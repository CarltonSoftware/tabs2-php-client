<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class BaseObjectTest extends ApiClientClassTest
{    
    /**
     * @return void
     */
    public function testTitle()
    {
        $title = new tabs\apiclient\Title();
        $title->set('title', 'Mr');
        
        $this->assertArrayHasKey('title', $title->getChanges());
        
        $title2 = new tabs\apiclient\Title();
        $title2->setTitle('Mr');
        
        $this->assertArrayHasKey('title', $title2->getChanges());
    }
}
