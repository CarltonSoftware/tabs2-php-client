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

namespace tabs\core;

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
    // ------------------ Static Functions --------------------- //

    /**
     * Create a new object
     * 
     * @param array $array Array representation of the object
     * 
     * @return Base
     */
    public static function factory($array)
    {
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
            if (!in_array($key, $exceptions) && property_exists($obj, $key)) {
                $obj->$func($val);
            }
        }
    }
    
    // -------------------------- Public Functions -------------------------- //

    /**
     * Return the name of the class which calls this method
     * 
     * @return string
     */
    public function getClass()
    {
        $type = explode('\\', get_called_class());
        
        return $type[count($type) - 1];
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

            // All properties will be camelcase, make first, letter lowercase
            $property[0] = strtolower($property[0]);

            switch (substr($name, 0, 3)) {
            case 'set':
                if (property_exists($this, $property)) {
                    $this->setObjectProperty($this, $property, $args[0]);
                    return $this;
                }
                break;
            case 'get':
                if (property_exists($this, $property)) {
                    return $this->$property;
                }
                break;
            }
        }
        
        throw new \tabs\client\Exception(
            null,
            'Unknown method called:' . get_called_class() . ':' . $name
        );
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
        case 'double':
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
     * Generic timestamp setter
     *
     * @param integer $timestamp TimeStamp val needed to set to variable
     * @param string  $varName   Variable name
     *
     * @return void
     */
    protected function setTimeStamp($timestamp, $varName)
    {
        if (is_numeric($timestamp)) {
            $this->$varName = $timestamp;
        } else {
            // Try strtotime
            $tempTime = strtotime($timestamp);
            if ($tempTime > mktime(0, 0, 0, 1, 1, 1990)) {
                $this->$varName = $tempTime;
            }
        }
    }
}