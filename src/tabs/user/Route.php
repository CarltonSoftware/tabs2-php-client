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

namespace tabs\user;

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
 * @method \tabs\user\Route setId(integer $id)      Set the user Id
 * @method \tabs\user\Route setRoute(string $route) Set the user route
 */
class Route extends \tabs\core\Builder
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
     * @return \tabs\core\Route
     */
    public static function get($id)
    {
        // Get the user object
        return parent::get('/auth/route/' . $id);
    }

    /**
     * Get the routes
     *
     * @return \tabs\core\Route[]
     */
    public static function fetch()
    {
        // Get the user object
        return parent::get('/auth/route');
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
     * Remove a route from a role
     * 
     * @return \tabs\user\Route
     */
    public function remove()
    {
        if (!$this->getParent()) {
            throw new \tabs\client\Exception(
                null,
                'Unable remove route from role.  Role not set.'
            );
        }
        
        $request = \tabs\client\Client::getClient()->delete(
            '/auth/role/' . $this->getParent()->getId() . '/route/' . $this->getId()
        );

        if (!$request || $request->getStatusCode() !== '204') {
            throw new \tabs\client\Exception(
                $request,
                'Unable to remove route ' 
                    . $this->getId() 
                    . ' from role: ' 
                    . $this->getParent()->getId()
            );
        }
        
        return $this->getParent();
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