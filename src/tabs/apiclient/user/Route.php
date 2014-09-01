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
class Route extends \tabs\apiclient\core\Base
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
}