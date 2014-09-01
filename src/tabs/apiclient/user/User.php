<?php

/**
 * Tabs Rest API User object.
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

namespace tabs\apiclient\user;

/**
 * Tabs Rest API User object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \tabs\apiclient\user\Role[] getRoles()    Return the user roles
 * @method integer           getId()       Return the user id
 * @method string            getUsername() Return the username
 * @method string            getEmail()    Return the user email
 * @method string            getPassword() Return the user password
 * 
 * @method \tabs\apiclient\user\User setId(integer $id)            Set the user Id
 * @method \tabs\apiclient\user\User setUsername(string $username) Set the username
 * @method \tabs\apiclient\user\User setEmail(string $email)       Set the user email
 * @method \tabs\apiclient\user\User setPassword(string $password) Set the user password
 * @method \tabs\apiclient\user\User setEnabled(boolean $enabled)  Set the enabled flag
 */
class User extends \tabs\apiclient\core\Base
{
    /**
     * User Id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Username
     * 
     * @var string
     */
    protected $username;
    
    /**
     * Email Address
     * 
     * @var string
     */
    protected $email;
    
    /**
     * Password
     * 
     * @var string
     */
    protected $password;
    
    /**
     * Enabled?
     * 
     * @var boolean
     */
    protected $enabled = false;
    
    /**
     * Array of assigned roles
     * 
     * @var \tabs\apiclient\user\Role[] $roles
     */
    protected $roles = array();
    
    // ------------------ Static Functions --------------------- //

    /**
     * Get a user from a given Id
     *
     * @param string $id User reference
     *
     * @return \tabs\apiclient\core\User
     */
    public static function get($id)
    {
        // Get the user object
        $userRequest = \tabs\apiclient\client\Client::getClient()->get(
            "/user/{$id}"
        );

        return self::factory($userRequest->json());
    }

    /**
     * Authenticate and return a user object
     *
     * @param string $username Username
     * @param string $password Password
     *
     * @return \tabs\apiclient\core\User
     */
    public static function authenticate($username, $password)
    {
        // Get the user object
        $userRequest = \tabs\apiclient\client\Client::getClient()->post(
            '/user/authenticate',
            array(
                'username' => $username,
                'password' => $password
            )
        );
        
        $urlSegments = explode(
            '/',
            $userRequest->getHeader('Content-Location')
        );

        return self::get($urlSegments[count($urlSegments) - 1]);
    }
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Check if user is active or not
     * 
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->getEnabled();
    }
    
    /**
     * Set the user roles
     * 
     * @param \tabs\apiclient\user\Role[] $roles Array of roles
     * 
     * @return \tabs\apiclient\core\User
     */
    public function setRoles($roles)
    {
        foreach ($roles as $role) {
            $this->roles[] = Role::factory($role);
        }
        
        return $this;
    }
    
    /**
     * Return the array of routes the user has access too.
     * 
     * @return \tabs\apiclient\user\Route[]
     */
    public function getRoutes()
    {
        $routes = array();
        foreach ($this->getRoles() as $role) {
            $routes = array_merge($routes, $role->getRoutes());
        }
        
        return $routes;
    }
    
    /**
     * Check if a user has access to a given route or not
     * 
     * @param string $route Route name
     * 
     * @return boolean
     */
    public function hasAccess($route)
    {
        foreach ($this->getRoutes() as $rout) {
            if ($rout->getRoute() === $route) {
                return true;
            }
        }
        
        return false;
    }
}