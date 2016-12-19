<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Base;

/**
 * Tabs Rest API Attribute value object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string getBoolean()                 Returns the boolean
 * @method Value  setBoolean(boolean $boolean) Sets the boolean
 * 
 * @method string getNumber()                Returns the number
 * @method Value  setNumber(boolean $number) Sets the number
 */
class Value extends Base
{
    /**
     * Value
     * 
     * @var mixed
     */
    protected $value;
    
    /**
     * Boolean for hybrid
     * 
     * @var boolean
     */
    protected $boolean = false;
    
    /**
     * Number for number/hybrid attribute types
     * 
     * @var integer
     */
    protected $number = 0;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Set the value
     * 
     * @param mixed $value Value
     * 
     * @return Value
     */
    public function setValue($value)
    {
        if (is_scalar($value)) {
            $this->value = $value;
        } else if (is_array($value)) {
            $this->boolean = $value['boolean'];
            $this->number = $value['number'];
        } else if (is_object($value)) {
            $this->boolean = $value->boolean;
            $this->number = $value->number;
        }
        
        return $this;
    }
    
    /**
     * Return the value of the object
     * 
     * @return string|array
     */
    public function getValue()
    {
        if ($this->value !== null) {
            return $this->value;
        } else {
            return array(
                'boolean' => $this->boolean,
                'number' => $this->number
            );
        }
    }
    
    /**
     * ToString function
     * 
     * @return string
     */
    public function __toString()
    {
        if ($this->value !== null) {
            if (is_bool($this->value)) {
                return $this->boolToStr($this->value);
            } else {
                return (string) $this->value;
            }
        } else {
            return $this->boolToStr($this->boolean) . '|' . $this->number;
        }
    }
}