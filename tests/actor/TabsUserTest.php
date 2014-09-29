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
        
        $this->_routeTest($route);
    }
    
    /**
     * Test a new role
     * 
     * @return void
     */
    public function testCreateRole()
    {
        $role = Fixtures::getTabsRole();
        
        $this->_roleTest($role);
    }
    
    /**
     * Test a new tabs user
     * 
     * @return void
     */
    public function testCreateTabsUser()
    {
        $tabsUser = Fixtures::getTabsUser();
        
        $this->assertEquals(1, $tabsUser->getId());
        $this->assertEquals('Mr', $tabsUser->getTitle());
        $this->assertEquals('Wyett', $tabsUser->getSurname());
        $this->assertEquals('xyz123', $tabsUser->getPassword());
        
        $this->assertTrue($tabsUser->hasAccess('aurlpath'));
        $this->assertFalse($tabsUser->hasAccess('anotherurlpath'));
        
        $roles = $tabsUser->getRoles();
        $role = array_shift($roles);
        
        $this->_roleTest($role);
    }
    
    /**
     * Test a role object
     * 
     * @param \tabs\apiclient\actor\TabsRole $role Role
     * 
     * @return void
     */
    private function _roleTest($role)
    {
        $this->assertEquals(1, $role->getId());
        $this->assertEquals('Administrator', $role->getTabsrole());
        $this->assertEquals('This is the admin role', $role->getDescription());
        
        $routes = $role->getRoutes();
        $route = array_shift($routes);
        
        $this->_routeTest($route);
    }
    
    /**
     * Test a route object
     * 
     * @param \tabs\apiclient\actor\Route $route Route
     * 
     * @return void
     */
    private function _routeTest($route)
    {
        $this->assertEquals(1, $route->getId());
        $this->assertEquals('aurlpath', $route->getRoute());
        $this->assertEquals(2, count($route->toArray()));
    }
}