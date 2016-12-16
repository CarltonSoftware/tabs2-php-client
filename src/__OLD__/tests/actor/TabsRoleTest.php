<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class TabsRoleTest extends ApiClientClassTest
{
    /**
     * Test a tabs role
     *
     * @return void
     */
    public function testTabsRole()
    {
        $role = Fixtures::getTabsRole();

        $this->assertArrayHasKey('tabsrole', $role->toCreateArray());
        $this->assertArrayHasKey('description', $role->toCreateArray());

        $this->assertArrayHasKey('tabsrole', $role->toUpdateArray());
        $this->assertArrayHasKey('description', $role->toUpdateArray());

        $this->assertArrayHasKey('id', $role->toArray());
        $this->assertArrayHasKey('tabsrole', $role->toArray());
        $this->assertArrayHasKey('description', $role->toArray());
        $this->assertArrayHasKey('routes', $role->toArray());
        $this->assertTrue(is_array($role->toArray()['routes'][0]));
    }
}
