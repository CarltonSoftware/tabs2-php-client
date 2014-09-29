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

namespace tabs\apiclient\actor;

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
 * @method integer  getId()               Return the Role id
 * @method string   getTabsrole()         Return the Role name
 * @method string   getDescription()      Return the Role description
 * @method Route[]  getRoutes()           Return the Role routes
 * @method TabsRole setId(integer $id)           Set the Role Id
 * @method TabsRole setTabsrole(string $role)    Set the Role
 * @method TabsRole setDescription(string $desc) Set the Role
 */
class TabsRole extends \tabs\apiclient\core\Builder
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
    protected $tabsrole;
    
    /**
     * Role Description
     * 
     * @var string
     */
    protected $description;
    
    /**
     * Applicable routes
     * 
     * @var Route[]
     */
    protected $routes = array();

    // -------------------------- Static Functions -------------------------- //

    /**
     * Get a role from a given Id
     *
     * @param string $id Role reference
     * 
     * @return TabsRole
     */
    public static function get($id)
    {
        // Get the user object
        return parent::_get('/tabsrole/' . $id);
    }

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Set the routes applicable for a role
     * 
     * @param array $routes Array of routes
     * 
     * @return TabsRole
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
     * Commit a route to a role.
     * 
     * @param Route $route Role to add
     * 
     * @return TabsRole
     */
    public function setRoute($route)
    {
        $this->_addRoute($route);
        $route->commit();
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toCreateArray()
    {
        return array(
            'tabsrole' => $this->getTabsrole(),
            'description' => $this->getDescription()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function toUpdateArray()
    {
        return $this->toCreateArray();
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
            'tabsrole' => $this->getTabsrole(),
            'description' => $this->getDescription(),
            'routes' => $routes
        );
    }
    
    /**
     * Add a route to a role.  This method was added as symfony forms does
     * not like variables to be passed by reference.
     * 
     * @param \tabs\apiclient\actor\Route $route Route to add
     * 
     * @return \tabs\apiclient\actor\Role
     */
    private function _addRoute(&$route)
    {
        $route->setParent($this);
        $this->routes[] = $route;
        
        return $this;
    }
}