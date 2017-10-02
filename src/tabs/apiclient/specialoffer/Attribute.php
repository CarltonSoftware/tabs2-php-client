<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\property\Value;
use tabs\apiclient\AttributeBoolean;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Special Offer Attribute object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Value            getValue()     Returns the value
 * @method AttributeBoolean getAttribute() Returns the attribute
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
     * @var AttributeBoolean
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
     * @param stdclass|array|AttributeBoolean $attribute The Attribute
     *
     * @return Attribute
     */
    public function setAttribute($attribute)
    {
        $this->attribute = AttributeBoolean::factory($attribute);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'value' => $this->getValue()->getValue(),
            'attributeid' => $this->getAttribute()->getId(),
            'type' => 'Boolean'
        );
    }
}