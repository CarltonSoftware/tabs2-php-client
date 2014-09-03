<?php

/**
 * Tabs Rest API Route object.
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
 * Tabs Rest API Route object.
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
 * @method integer getId()    Return the route id
 * @method string  getRoute() Return the route name
 * 
 * @method \tabs\apiclient\user\Route setId(integer $id)      Set the user Id
 * @method \tabs\apiclient\user\Route setRoute(string $route) Set the user route
 */
class Route extends Builder
{
    /**
     * Role Id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Route Name
     * 
     * @var string
     */
    protected $route;

    // -------------------------- Static Functions -------------------------- //

    /**
     * Get a route from a given Id
     *
     * @param string $id Route reference
     *
     * @return \tabs\apiclient\core\Route
     */
    public static function get($id)
    {
        // Get the user object
        return parent::get('/auth/route/' . $id);
    }

    /**
     * Get the routes
     *
     * @return \tabs\apiclient\core\Route[]
     */
    public static function fetch()
    {
        // Get the user object
        return parent::_fetch('/auth/route');
    }

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * @inheritDoc
     */
    public function getCreateUrl()
    {
        return '/auth/route';
    }
    
    /**
     * @inheritDoc
     */
    public function getUpdateUrl()
    {
        return '/auth/route/' . $this->getId();
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'route' => $this->getRoute()
        );
    }
}