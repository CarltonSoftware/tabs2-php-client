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

namespace tabs\user;

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
 * @method integer getId()   Return the Role id
 * @method string  getRole() Return the Role name
 * 
 * @method \tabs\user\Role setId(integer $id)       Set the Role Id
 * @method \tabs\user\Role setRoute(string $route ) Set the Role
 */

class Role extends \tabs\core\Base
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
     * @var \tabs\user\Route[]
     */
    protected $routes;


    // ------------------ Public Functions --------------------- //
    
    /**
     * Set the routes applicable for a role
     * 
     * @param array $routes Array of routes
     * 
     * @return \tabs\user\Role
     */
    public function setRoutes($routes)
    {
        foreach ($routes as $route) {
            $this->routes[] = Route::factory($route);
        }
        
        return $this;
    }
}