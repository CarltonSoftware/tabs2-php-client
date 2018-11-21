<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Unit;
use tabs\apiclient\AttributeGroup;

/**
 * Tabs Rest API Attribute object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Attribute setCode(string $code) Sets the code
 * 
 * 
 * @method Attribute  setName(string $name) Sets the name
 * 
 * @method Attribute  setType(string $type) Sets the type
 * 
 * @method Attribute  setDescription(string $desc) Sets the desc
 * 
 * @method Attribute  setUsedinavailabilitysearch(boolean $bool) Sets the type
 * 
 * @method Attribute  setBase(boolean $bool) Sets the type
 * 
 * @method Attribute  setDefaultvalue(object $defaultvalue) Set the default value
 * 
 * 
 * @method Attribute  setMinimumvalue(integer $int) Set the min value
 * 
 * @method Attribute  setMaximumvalue(integer $int) Set the max value
 * 
 * @method Attribute  setLimitvalue(integer $int) Set the limit value
 * 
 * @method Attribute  setOperator(string $op) Set the operand
 * 
 * @method Attribute  setDefaultbooleanvalue(boolean $bool) Set the default boolean value
 * 
 * @method Attribute  setDefaultnumbervalue(integer $value) Set the default number value
 */
abstract class Attribute extends Builder
{
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
     * Default value of attribute
     * 
     * @var object
     */
    protected $defaultvalue;
    
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
    
    /**
     * Default boolean value of attribute (hybrid type)
     * 
     * @var boolean
     */
    protected $defaultbooleanvalue = false;
    
    /**
     * Default number value of attribute (hybrid type)
     * 
     * @var integer
     */
    protected $defaultnumbervalue = 0;

    // -------------------------- Public functions -------------------------- //
    
    /**
     * Set the attribute group
     * 
     * @param array|stdClass|AttributeGroup $grp Attribute group
     * 
     * @return Attribute
     */
    public function setGroup($grp)
    {
        $this->group = AttributeGroup::factory($grp);
        
        return $this;
    }
    
    /**
     * Set the unit
     * 
     * @param array|stdClass|Unit $unit Unit of measurement
     * 
     * @return Attribute
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
        $attribute = array(
            'type' => $this->getType(),
            'groupid' => $this->getGroup()->getId(),
            'code' => $this->getCode(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'usedinavailabilitysearch' => $this->boolToStr($this->isUsedinavailabilitysearch()),
            'baseattribute' => $this->boolToStr($this->isBase()),
        );
        
        switch ($this->getType()) {
            case 'Hybrid':
                $attribute = array_merge(
                    $attribute,
                    array(
                        'operator' => $this->getOperator(),
                        'maximumvalue' => $this->getMaximumvalue(),
                        'minimumvalue' => $this->getMinimumvalue(),
                        'limitvalue' => $this->getLimitvalue(),
                        'unitid' => $this->getUnit()->getId(),
                        'defaultbooleanvalue' => $this->getDefaultbooleanvalue(),
                        'defaultnumbervalue' => $this->getDefaultnumbervalue()
                    )
                );
                break;
            case 'Number':
                $attribute = array_merge(
                    $attribute,
                    array(
                        'operator' => $this->getOperator(),
                        'maximumvalue' => $this->getMaximumvalue(),
                        'minimumvalue' => $this->getMinimumvalue(),
                        'unitid' => $this->getUnit()->getId(),
                        'defaultvalue' => $this->getDefaultvalue()
                    )
                );
                break;
            case 'String':
            case 'Boolean':
                $attribute = array_merge(
                    $attribute,
                    array(
                        'defaultvalue' => $this->getDefaultvalue()
                    )
                );
                break;
        }
        
        return $attribute;
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'attribute';
    }

    /**
     * Returns the code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Return the attribute group
     *
     * @return AttributeGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the desc
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the bool
     *
     * @return string
     */
    public function getUsedinavailabilitysearch()
    {
        return $this->usedinavailabilitysearch;
    }

    /**
     * Returns the bool
     *
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Returns the default value
     *
     * @return object
     */
    public function getDefaultvalue()
    {
        return $this->defaultvalue;
    }

    /**
     * Return the attribute unit
     *
     * @return Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Return the min value
     *
     * @return integer
     */
    public function getMinimumvalue()
    {
        return $this->minimumvalue;
    }

    /**
     * Return the max value
     *
     * @return integer
     */
    public function getMaximumvalue()
    {
        return $this->maximumvalue;
    }

    /**
     * Return the limit value
     *
     * @return integer
     */
    public function getLimitvalue()
    {
        return $this->limitvalue;
    }

    /**
     * Return the operand
     *
     * @return integer
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Returns the default boolean value
     *
     * @return integer
     */
    public function getDefaultbooleanvalue()
    {
        return $this->defaultbooleanvalue;
    }

    /**
     * Returns the default number value
     *
     * @return integer
     */
    public function getDefaultnumbervalue()
    {
        return $this->defaultnumbervalue;
    }
}