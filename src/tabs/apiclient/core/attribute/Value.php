<?php

/**
 * Tabs Rest API Attribute value object.
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
 * 
 * @method Value  setValue(string $value) Sets the value
 */
class Value extends \tabs\apiclient\core\Base
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
     * Return the value of the object
     * 
     * @return string|array
     */
    public function getValue()
    {
        if ($this->value) {
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
        if ($this->value) {
            if (is_bool($this->value)) {
                return $this->boolToStr($this->value);
            } else {
                return $this->value;
            }
        } else {
            return $this->boolToStr($this->boolean) . '|' . $this->number;
        }
    }
}