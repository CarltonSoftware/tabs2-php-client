<?php

/**
 * Tabs Rest API Brand object.
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

namespace tabs\apiclient\brand;

/**
 * Tabs Rest API Brand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer getId()            Returns the brand id
 * @method Brand   setId(integer $id) Sets the brand id
 * 
 * @method string getCode()             Returns the brand code
 * @method Brand  setCode(string $code) Sets the brand code
 * 
 * @method string getName()             Returns the brand name
 * @method Brand  setName(string $name) Sets the brand name
 */
abstract class Brand extends \tabs\apiclient\core\Builder
{
    /**
     * Brand id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Brand code
     * 
     * @var string
     */
    protected $code = '';
    
    /**
     * Brand name
     * 
     * @var string
     */
    protected $name = '';
}