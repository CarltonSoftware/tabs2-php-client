<?php

/**
 * Tabs Rest API Property Description Short code object.
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

namespace tabs\apiclient\property\description;

/**
 * Tabs Rest API Property Description Short code object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer   getId()                          Returns the id
 * @method Shortcode setId(integer $id)               Set the id
 * 
 * @method string    getCode()                        Returns the name
 * @method Shortcode setCode(string $code)            Set the name
 * 
 * @method string    getDescription()                 Returns the desc
 * @method Shortcode setDescription(string $code)     Set the desc
 */
class Shortcode extends \tabs\apiclient\core\Base
{
    /**
     * Description Shortcode id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Code
     * 
     * @var string
     */
    protected $code = '';
    
    /**
     * Description
     * 
     * @var string 
     */
    protected $description = '';
}