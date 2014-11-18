<?php

/**
 * Tabs Rest API Attribute object.
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

namespace tabs\apiclient\core\attribute;
use tabs\apiclient\core\Unit;

/**
 * Tabs Rest API Attribute object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer   getId()            Returns the ID
 * @method Attribute setId(integer $id) Sets the ID
 * 
 * @method string    getCode()             Returns the code
 * @method Attribute setCode(string $code) Sets the code
 * 
 * @method Group getGroup() Return the attribute group
 * 
 * @method string     getName()             Returns the name
 * @method Attribute  setName(string $name) Sets the name
 * 
 * @method string     getType()             Returns the type
 * @method Attribute  setType(string $type) Sets the type
 * 
 * @method string     getDescription()             Returns the desc
 * @method Attribute  setDescription(string $desc) Sets the desc
 * 
 * @method string     getUsedinavailabilitysearch()              Returns the bool
 * @method Attribute  setUsedinavailabilitysearch(boolean $bool) Sets the type
 * 
 * @method string     getBase()              Returns the bool
 * @method Attribute  setBase(boolean $bool) Sets the type
 * 
 * @method Unit       getUnit() Return the attribute unit
 * 
 * @method integer    getMinimumvalue()             Return the min value
 * @method Attribute  setMinimumvalue(integer $int) Set the min value
 * 
 * @method integer    getMaximumvalue()             Return the max value
 * @method Attribute  setMaximumvalue(integer $int) Set the max value
 * 
 * @method integer    getLimitvalue()             Return the limit value
 * @method Attribute  setLimitvalue(integer $int) Set the limit value
 * 
 * @method integer    getOperator()           Return the operand
 * @method Attribute  setOperator(string $op) Set the operand
 */
class Attribute extends \tabs\apiclient\core\Builder
{
    /**
     * ID
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Attribute code
     * 
     * @var string
     */
    protected $code = '';
    
    /**
     * Attribute group
     * 
     * @var Group
     */
    protected $group;
    
    /**
     * Attribute name
     * 
     * @var string
     */
    protected $name = '';
    
    /**
     * Attribute type
     * 
     * @var string
     */
    protected $type = '';
    
    /**
     * Attribute description
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * Used in searching?
     * 
     * @var boolean
     */
    protected $usedinavailabilitysearch = false;
    
    /**
     * Base attribute?
     * 
     * @var boolean
     */
    protected $base = false;
    
    /**
     * Unit of measurement for Number/Hybrid attributes
     * 
     * @var Unit
     */
    protected $unit;
    
    /**
     * Attribute operator
     * 
     * @var string
     */
    protected $operator = '=';

    /**
     * Minimum value for the attribute (number and hybrid types)
     * 
     * @var integer
     */
    protected $minimumvalue = 0;

    /**
     * Maximum value for the attribute (number and hybrid types)
     * 
     * @var integer
     */
    protected $maximumvalue = 0;

    /**
     * Limit value for the attribute (number and hybrid types)
     * 
     * @var integer
     */
    protected $limitvalue = 0;

    // -------------------------- Public functions -------------------------- //
    
    /**
     * Set the attribute group
     * 
     * @param array|stdClass|Group $grp Attribute group
     * 
     * @return \tabs\apiclient\core\attribute\Attribute
     */
    public function setGroup($grp)
    {
        $this->group = Group::factory($grp);
        
        return $this;
    }
    
    /**
     * Set the unit
     * 
     * @param array|stdClass|Unit $unit Unit of measurement
     * 
     * @return \tabs\apiclient\core\attribute\Attribute
     */
    public function setUnit($unit)
    {
        $this->unit = Unit::factory($unit);
        
        return $this;
    }
    
    /**
     * Is the attribute used in the availability search
     * 
     * @return boolean
     */
    public function isUsedinavailabilitysearch()
    {
        return $this->getUsedinavailabilitysearch();
    }
    
    /**
     * Is the attribute a base attribute?
     * 
     * @return boolean
     */
    public function isBase()
    {
        return $this->getBase();
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array();
    }
}