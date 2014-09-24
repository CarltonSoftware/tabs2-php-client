<?php

/**
 * Tabs Rest API TabsUser object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\actor;

/**
 * Tabs Rest API TabsUser object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string     getUsername()     Get the username
 * @method string     getUserpassword() Get the password
 * @method TabsRole[] getRoles()        Get the array of tabs roles
 * 
 * @method TabsUser setUsername(string $username)         Set the username
 * @method TabsUser setUserpassword(string $userpassword) Set the userpassword
 */
class TabsUser extends Actor
{
    /**
     * Username
     * 
     * @var string
     */
    protected $username;
    
    /**
     * Roles
     * 
     * @var Role[]
     */
    protected $roles;

    // -------------------------- Static Functions -------------------------- //

    /**
     * Authenticate and return a user object
     *
     * @param string $username Username
     * @param string $password Password
     *
     * @return \tabs\apiclient\user\User
     */
    public static function authenticate($username, $password)
    {
        // Get the user object
        $request = \tabs\apiclient\client\Client::getClient()->post(
            '/tabsuser/authenticate',
            array(
                'username' => $username,
                'password' => $password
            )
        );

        return self::get(
            self::getRequestId($request)
        );
    }

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Set the roles for the TabsUser
     * 
     * @param array $roles Array of role objects
     * 
     * @return \tabs\apiclient\actor\TabsUser
     */
    public function setRoles($roles)
    {
        foreach ($roles as $role) {
            $_role = TabsRole::factory($role);
            $this->_addRole($_role);
        }
        
        return $this;
    }
    
    /**
     * Add a role to a user
     * 
     * @param TabsRole &$role Role object
     * 
     * @return \tabs\apiclient\actor\TabsUser
     */
    public function setRole(&$role)
    {
        $this->_addRole($role);
        $role->commit();
        
        return $this;
    }
    
    /**
     * Access route
     * 
     * @param string $route Route
     * 
     * @return boolean
     */
    public function hasAccess($route)
    {
        $access = false;
        foreach ($this->getRoles() as $role) {
            foreach ($role->getRoutes() as $_route) {
                if ($route->getRoute() == $_route) {
                    $access = true;
                }
            }
        }
        
        return $access;
    }

    // ------------------------- Private Functions -------------------------- //
    
    /**
     * Add a role to the roles array
     * 
     * @param TabsRole &$role Role object
     * 
     * @return \tabs\apiclient\actor\TabsUser
     */
    private function _addRole(&$role)
    {
        $role->setParent($this);
        $this->roles[] = $role;
        
        return $this;
    }
}