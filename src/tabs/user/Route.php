<?php

/**
 * Tabs Rest API Route object.
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
 * Tabs Rest API Route object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Alex Wyett <alex@wyett.co.uk>
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

class Route extends \tabs\core\Base
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

    // ------------------ Static Functions --------------------- //

    /**
     * Create a new route from an array
     * 
     * @param array $array Array representation of a route
     * 
     * @return \tabs\user\Route
     */
    public static function createFromArray($array)
    {
        $route = new Route();
        self::setObjectProperties($route, $array);
        
        return $route;
    }
}