<?php

/**
 * Tabs Rest API Role object.
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
 * Tabs Rest API Role object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * 
 * @method integer                      getId()               Return the Role id
 * @method string                       getRole()             Return the Role name
 * @method \tabs\apiclient\user\Route[] getRoutes()           Return the Role routes
 * @method \tabs\apiclient\user\Role    setId(integer $id)    Set the Role Id
 * @method \tabs\apiclient\user\Role    setRole(string $role) Set the Role
 */
class Role extends Builder
{
    /**
     * Role Id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Role Name
     * 
     * @var string
     */
    protected $role;
    
    /**
     * Applicable routes
     * 
     * @var \tabs\apiclient\user\Route[]
     */
    protected $routes = array();

    // -------------------------- Static Functions -------------------------- //

    /**
     * Get a role from a given Id
     *
     * @param string $id Role reference
     *
     * @return \tabs\apiclient\core\Role
     */
    public static function get($id)
    {
        // Get the user object
        return parent::get('/auth/role/' . $id);
    }

    /**
     * Get the roles
     *
     * @return \tabs\apiclient\core\Role[]
     */
    public static function fetch()
    {
        // Get the user object
        return parent::_fetch('/auth/role');
    }

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Set the routes applicable for a role
     * 
     * @param array $routes Array of routes
     * 
     * @return \tabs\apiclient\user\Role
     */
    public function setRoutes($routes)
    {
        foreach ($routes as $route) {
            $route = Route::factory($route);
            $this->_addRoute($route);
        }
        
        return $this;
    }
    
    /**
     * Add a route to a role
     * 
     * @param \tabs\apiclient\user\Route $route  Role to add
     * @param boolean                    $commit Set to true if a create post is to be 
     *                                           created
     * 
     * @return \tabs\apiclient\user\Role
     */
    public function setRoute($route)
    {
        return $this->_addRoute($route);
    }
    
    /**
     * Remove a route from a role
     * 
     * @param integer $routeId Route Id
     * 
     * @return \tabs\apiclient\user\Role
     */
    public function removeRoute($routeId)
    {
        foreach ($this->getRoutes() as $index => $route) {
            if ($route->getId() == $routeId) {
                $route->remove();
                unset($this->routes[$index]);
            }
        }
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function getCreateUrl()
    {
        return '/auth/role';
    }
    
    /**
     * @inheritDoc
     */
    public function getUpdateUrl()
    {
        return '/auth/role/' . $this->getId();
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $routes = array();
        foreach ($this->getRoutes() as $route) {
            array_push($routes, $route->toArray());
        }
        
        return array(
            'id' => $this->getId(),
            'role' => $this->getRole(),
            'routes' => $routes
        );
    }
    
    /**
     * Add a route to a role.  This method was added as symfony forms does
     * not like variables to be passed by reference.
     * 
     * @param \tabs\apiclient\user\Route $route Route to add
     * 
     * @return \tabs\apiclient\user\Role
     */
    private function _addRoute(&$route)
    {
        $route->setParent($this);
        $this->routes[] = $route;
        
        return $this;
    }
}