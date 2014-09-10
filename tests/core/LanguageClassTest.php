<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class LanguageClassTest extends ApiClientClassTest
{
    /**
     * Test a new address object
     * 
     * @return void 
     */
    public function testLanguageObject()
    {
        $language = Fixtures::getLanguage();
        $this->assertEquals('English', (string) $language);
    }
}
