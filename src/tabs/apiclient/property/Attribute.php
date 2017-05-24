<?php

namespace tabs\apiclient\property;

use tabs\apiclient\property\Value;
use tabs\apiclient\AttributeBoolean;
use tabs\apiclient\AttributeHybrid;
use tabs\apiclient\AttributeNumber;
use tabs\apiclient\AttributeString;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Property Attribute object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Value getValue() Returns the value
 * @method AttributeBoolean|AttributeHybrid|AttributeNumber|AttributeString getAttribute() Returns the attribute
 */
class Attribute extends Builder
{
    /**
     * Value
     *
     * @var Value
     */
    protected $value;

    /**
     * Attribute
     *
     * @var AttributeBoolean|AttributeHybrid|AttributeNumber|AttributeString
     */
    protected $attribute;

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->value = new Value();
        
        parent::__construct($id);
    }

    /**
     * Set the value
     *
     * @param stdclass|array|Value $value The Value
     *
     * @return Attribute
     */
    public function setValue($value)
    {
        if (is_bool($value) || is_numeric($value) || is_string($value)) {
            $this->value->setValue($value);
        } else {
            $this->value = Value::factory($value);
        }

        return $this;
    }

    /**
     * Set the attribute
     *
     * @param stdclass|array|AttributeBoolean|AttributeHybrid|AttributeNumber|AttributeString $attribute The Attribute
     *
     * @return Attribute
     */
    public function setAttribute($attribute)
    {
        if ($attribute instanceof \tabs\apiclient\Attribute) {
            $this->attribute = $attribute;
        } else if (is_object($attribute)) {
            $attribute = (array) $attribute;
        }
        
        if (!$attribute['type']) {
            $attribute = 'String';
        }
        
        switch ($attribute['type']) {
        case 'Boolean':
            $this->attribute = AttributeBoolean::factory($attribute);
            break;
        case 'String':
            $this->attribute = AttributeString::factory($attribute);
            break;
        case 'Number':
            $this->attribute = AttributeNumber::factory($attribute);
            break;
        case 'Hybrid':
            $this->attribute = AttributeHybrid::factory($attribute);
            break;
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'value' => $this->getValue()->getValue(),
            'attributeid' => $this->getAttribute()->getId()
        );
        
        if ($this->getAttribute() instanceof AttributeString) {
            if ($this->getAttribute()->getOptions()->count() > 0) {
                foreach ($this->getAttribute()->getOptions() as $option) {
                    if ($option->getOption() == $this->getValue()->getValue()) {
                        $arr['optionid'] = $option->getId();
                    }
                }
            }
        } else if ($this->getAttribute() instanceof AttributeHybrid 
            || $this->getAttribute() instanceof AttributeNumber
        ) {
            $arr['unit'] = $this->getAttribute()->getUnit()->getName();
            $arr['value'] = $this->getValue()->getNumber();
        } else if ($this->getAttribute() instanceof AttributeBoolean) {
            $arr['value'] = $arr['value'] ? 'true' : 'false';
        }
        
        return $arr;
    }
}