<?php

/**
 * Tabs Rest API User object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Alex Wyett <alex@wyett.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\user;

/**
 * Tabs Rest API User object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Alex Wyett <alex@wyett.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \tabs\user\Role[] getRoles()    Return the user roles
 * @method integer           getId()       Return the user id
 * @method string            getUsername() Return the username
 * @method string            getEmail()    Return the user email
 * @method string            getPassword() Return the user password
 * 
 * @method \tabs\user\User setId(integer $id)            Set the user Id
 * @method \tabs\user\User setUsername(string $username) Set the username
 * @method \tabs\user\User setEmail(string $email)       Set the user email
 * @method \tabs\user\User setPassword(string $password) Set the user password
 * @method \tabs\user\User setEnabled(boolean $enabled)  Set the enabled flag
 */
class User extends \tabs\core\Base
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
     * @var \tabs\user\Role[] $roles
     */
    protected $roles = array();
    
    // ------------------ Static Functions --------------------- //

    /**
     * Get a user from a given Id
     *
     * @param string $id User reference
     *
     * @return \tabs\core\User
     */
    public static function get($id)
    {
        // Get the user object
        $userRequest = \tabs\client\Client::getClient()->get(
            "/hmac/user/{$id}"
        );

        $user = new static();
        self::setObjectProperties($user, $userRequest->json());

        return $user;
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
     * @param \tabs\user\Role[] $roles Array of roles
     * 
     * @return \tabs\core\User
     */
    public function setRoles($roles)
    {
        foreach ($roles as $role) {
            $this->roles[] = Role::createFromArray($role);
        }
        
        return $this;
    }
    
    /**
     * Return the array of routes the user has access too.
     * 
     * @return \tabs\user\Route[]
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