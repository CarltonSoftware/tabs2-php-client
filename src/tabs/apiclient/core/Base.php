<?php

/**
 * Tabs Rest API Base object.
 *
 * PHP Version 5.4
 *
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;

/**
 * Tabs Rest API Base object.
 *
 * Provides setter/getter methods for all child classes.
 *
 * PHP Version 5.4
 *
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

abstract class Base
{
    /**
     * Parent element
     *
     * @var \tabs\apiclient\core\Base
     */
    protected $parent;

    // ------------------ Static Functions --------------------- //

    /**
     * Return the name of the class which calls this method
     *
     * @return string
     */
    public static function getClass()
    {
        $type = explode('\\', get_called_class());

        return $type[count($type) - 1];
    }

    /**
     * Create a new object
     *
     * @param array $array Array representation of the object
     *
     * @return Base
     */
    public static function factory($array)
    {
        // If class is the same as object being `factory'ised`, just return it.
        if (is_object($array) && get_class($array) == get_called_class()) {
            return $array;
        }
            
        $object = new static();
        self::setObjectProperties($object, $array);

        return $object;
    }

    /**
     * Helper function foor setting object properties
     *
     * @param object $obj        Generic object passed by reference
     * @param object $node       Node object to iterate through
     * @param array  $exceptions Properties to ignore
     *
     * @return void
     */
    public static function setObjectProperties(&$obj, $node, $exceptions = array())
    {
        foreach ($node as $key => $val) {
            $func = 'set' . ucfirst($key);
            if (!in_array($key, $exceptions) 
                && (property_exists($obj, $key) || method_exists($obj, $func))
            ) {
                $obj->$func($val);
            }
        }
    }

    // -------------------------- Public Functions -------------------------- //

    /**
     * Convert a boolean value to a string
     * 
     * @param boolean $boolean Boolean value
     * 
     * @return string
     */
    public function boolToStr($boolean)
    {
        return ($boolean === true) ? 'true' : 'false';
    }
    
    /**
     * Set the parent element
     *
     * @param \tabs\apiclient\core\Base $element Parent element
     *
     * @return \tabs\apiclient\core\Base
     */
    public function setParent(&$element)
    {
        $this->parent = $element;

        return $this;
    }

    /**
     * Return the builder parent element
     *
     * @return \tabs\apiclient\core\Base
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     * Recursive finder function.  Traverses up the tree to try to
     * find a perent object with a matching class.
     * 
     * @param string $type Class type
     * 
     * @return Base|null
     */
    public function findParentByType($type)
    {
        if ($this->getParent() && $type == $this->getParent()->getClass()) {
            return $this->getParent();
        } else if ($this->getParent()) {
            return $this->getParent()->findParentByType($type);
        } else {
            return;
        }
    }

    /**
     * Generic getter/setter
     *
     * @param string $name Name of property
     * @param array  $args Function arguments
     *
     * @return void
     */
    public function __call($name, $args = array())
    {
        // This call method is only for accessors
        if (strlen($name) > 3) {
            // Get the property
            $property = substr($name, 3, strlen($name));

            // All properties will be camelcase, make first letter lowercase
            $property[0] = strtolower($property[0]);

            if (property_exists($this, $property)) {
                switch (substr($name, 0, 3)) {
                    case 'set':
                        $this->setObjectProperty($this, $property, $args[0]);
                        return $this;
                    break;
                    case 'get':
                        return $this->$property;
                }
            }
        }

        throw new \tabs\apiclient\client\Exception(
            null,
            'Unknown method called:' . get_called_class() . ':' . $name
        );
    }

    /**
     * Get magic method.  Added for symfony forms.
     *
     * @param string $name Name of property
     *
     * @throws \tabs\apiclient\client\Exception
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    /**
     * Get magic method.  Added for symfony forms.
     *
     * @param string $name Name of property
     *
     * @throws \tabs\apiclient\client\Exception
     *
     * @return mixed
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->setObjectProperty($this, $name, $value);
        }
    }

    // ------------------------- Protected Functions ------------------------ //

    /**
     * Generic setter
     *
     * @param object $obj      Generic object to set properties
     * @param string $property Property of object to set
     * @param mixed  $value    Value of property
     *
     * @return void
     */
    protected function setObjectProperty($obj, $property, $value)
    {
        switch (strtolower(gettype($obj->$property))) {
        case 'array':
        case 'integer':
        case 'object':
        case 'null':
        case 'resource':
            $obj->$property = $value;
            break;
        case 'boolean':
            if (is_bool($value)) {
                $obj->$property = $value;
            }
            break;
        case 'string':
            $obj->$property = trim($value);
            break;
        case 'float':
            $obj->setFloatVal($value, $property);
            break;
        }
    }

    /**
     * Generic float setter
     *
     * @param float  $float   Float val needed to set to variable
     * @param string $varName Variable name
     *
     * @return void
     */
    protected function setFloatVal($float, $varName)
    {
        if (strpos($float, '.') < strpos($float, ',')) {
            $float = str_replace('.', '', $float);
            $float = strtr($float, ',', '.');
        } else {
            $float = str_replace(',', '', $float);
        }
        if (is_numeric(floatval($float))) {
            $this->$varName = floatval($float);
        }
    }
    
    /**
     * Return a date time object from a given param
     * 
     * @param string|\DateTime $date Date object
     * 
     * @return \DateTime
     */
    public function getDateTime($date)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }
        
        return $date;
    }    
}