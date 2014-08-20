<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'tests'
    . DIRECTORY_SEPARATOR . 'client'
    . DIRECTORY_SEPARATOR . 'ApiClientClassTest.php';
require_once $file;

class UserTest extends ApiClientClassTest
{

    /**
     * Test creating a new user
     *
     * @return null
     */
    public function testNewUser()
    {
        $user = \tabs\user\User::factory($this->_fixture());
        
        $this->assertEquals(1, $user->getId());
        $this->assertEquals(1, $user->id);
        $this->assertEquals('alex', $user->getUsername());
        $this->assertEquals('alex', $user->username);
        $this->assertEquals('alex@wyett.co.uk', $user->getEmail());
        $this->assertEquals('alex@wyett.co.uk', $user->email);
        $this->assertTrue($user->getEnabled());
        $this->assertTrue($user->isEnabled());
        $this->assertTrue(is_array($user->getRoles()));
        
        $this->assertTrue($user->hasAccess('user_home'));
        $this->assertFalse($user->hasAccess('another_route'));
    }
    
    /**
     * Return the user fixture
     * 
     * @return array
     */
    private function _fixture()
    {
        return array(
            'id' => 1,
            'username' => 'alex',
            'email' => 'alex@wyett.co.uk',
            'enabled' => true,
            'roles' => array(
                array(
                    "id" => 1,
                    "role" => 'Administrator',
                    "routes" => array(
                        array(
                            'id' => 1,
                            'route' => 'user_home'
                        )
                    )
                )
            ),
            'group' => array(
                'id' => 1,
                'name' => 'Default'
            )
        );
    }
}
