<?php

/**
 * Tabs Rest API PropertyAttribute object.
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

namespace tabs\apiclient\property;
use tabs\apiclient\core\attribute\Attribute;
use tabs\apiclient\core\attribute\Value;

/**
 * Tabs Rest API PropertyAttribute object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer           getId()            Returns the ID
 * @method PropertyAttribute setId(integer $id) Sets the ID
 * 
 * @method Attribute getAttribute() Return the attribute
 * @method Value     getValue()     Return the value
 */
class PropertyAttribute extends \tabs\apiclient\core\Builder
{
    /**
     * ID
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Attribute value
     * 
     * @var Value
     */
    protected $value;
    
    /**
     * Attribute
     * 
     * @var Attribute
     */
    protected $attribute;
    
    // -------------------------- Public functions -------------------------- //

    /**
     * Url stub should be attribute not property attribute
     * 
     * @return string
     */
    public function getUrlStub()
    {
        return 'attribute';
    }
    
    /**
     * Set the attribute
     * 
     * @param array|stdClass|Attribute $attr Attribute
     * 
     * @return \tabs\apiclient\property\PropertyAttribute
     */
    public function setAttribute($attr)
    {
        $this->attribute = Attribute::factory($attr);
        
        return $this;
    }
    
    /**
     * Value setter
     * 
     * @param array|stdClass|Value $val Attribute value
     * 
     * @return \tabs\apiclient\property\PropertyAttribute
     */
    public function setValue($val)
    {
        if (is_scalar($val)) {
            $value = new Value();
            $value->setValue($val);
            if (is_bool($val)) {
                $value->setBoolean($val);
            }
            
            $this->value = $value;
        } else {
            $this->value = Value::factory($val);
        }
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $attr = array(
            'type' => $this->getAttribute()->getType(),
            'attributeid' => $this->getAttribute()->getId(),
            'value' => $this->getValue()->getValue()
        );
        
        if ($this->getAttribute()->getUnit()) {
            $attr['unit'] = $this->getAttribute()->getUnit()->getName();
        }
        
        return $attr;
    }
}