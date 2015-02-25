<?php

/**
 * Tabs Rest API Contract object.
 *
 * PHP Version 5.4
 *
 * @category  Property
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\property;

/**
 * Tabs Rest API Contract object.
 *
 * @category  Property
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer               getId()   Return the id
 * 
 * @method Booking setId(integer $id)      Set the id
 */
class Contract extends \tabs\apiclient\core\Builder
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;
        
    // -------------------------- Static Functions -------------------------- //

    /**
     * Create a Contract object from a given id
     *
     * @param string $id Contract id
     *
     * @return \tabs\apiclient\property\Contract
     */
    public static function get($id)
    {
        $className = self::getClass();
        $routeName = strtolower($className);

        return parent::_get(sprintf('/%s/%s', $routeName, $id));
    }

    // -------------------------- Public Functions -------------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return array(

        );
    }
    
}