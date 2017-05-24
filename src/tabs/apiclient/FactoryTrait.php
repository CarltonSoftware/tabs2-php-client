<?php

namespace tabs\apiclient;

/**
 * Tabs Rest Factory Trait object.
 *
 * Provides helper methods for objects
 *
 * PHP Version 5.5
 *
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */
trait FactoryTrait
{
    // ------------------------- Public Functions ------------------------ //
    
    /**
     * Get the json
     * 
     * @param \Psr\Http\Message\ResponseInterface $response Response
     * 
     * @return \stdClass
     */
    public static function getJson($response)
    {
        return \GuzzleHttp\json_decode((string) $response->getBody());
    }

    /**
     * Return the name of the class which calls this method
     *
     * @return string
     */
    public static function getClass()
    {
        $type = explode('\\', self::getFullClass());

        return $type[count($type) - 1];
    }
    
    /**
     * Get the namespace class name
     * 
     * @return string
     */
    public static function getFullClass()
    {
        return get_called_class();
    }

    /**
     * Create a new object
     *
     * @param array|stdClass|Base $element Representation of the object
     *
     * @return Base
     */
    public static function factory($element)
    {
        // If class is the same as object being `factory'ised`, just return it.
        if ((is_object($element) 
            && get_class($element) == get_called_class())
            || is_null($element)
        ) {
            return $element;
        }
        
        $object = new static();
        
        if (is_string($element)) {
            $link = new Link();
            $link->setLink($element);
            $link->setObjectClass(get_class($object));
            return $link;
        }

        self::setObjectProperties($object, $element);

        return $object;
    }

    /**
     * Helper function for setting object properties
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

    /**
     * Check if a method exists or not.  If a magic method accessor is specified
     * then the method will check the property string after the accessor
     * prefix (i.e. set or get).
     *
     * @param string $method Method name
     *
     * @return boolean
     */
    public function method_exists($method)
    {
        if (!is_string($method)) {
            return false;
        }

        if (method_exists($this, $method)) {
            return true;
        }

        if ((substr($method, 0, 3) == 'get' || substr($method, 0, 3) == 'set')
            && property_exists($this, lcfirst(substr($method, 3)))
        ) {
            return true;
        }

        return false;
    }

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
        if (strlen($name) > 2) {
            
            // Get the property
            $property = substr($name, 3, strlen($name));
            switch (substr($name, 0, 2)) {
                case 'is':
                    $property = substr($name, 2, strlen($name));
                break;
            }
            
            // All properties will be camelcase, make first letter lowercase
            $property = lcfirst($property);

            if (property_exists($this, $property)) {
                switch (substr($name, 0, 2)) {
                    case 'is':
                        if (is_bool($this->$property)) {
                            return ($this->$property === true);
                        }
                    break;
                }
                
                switch (substr($name, 0, 3)) {
                    case 'set':
                        $this->setObjectProperty($this, $property, $args[0]);
                        return $this;
                    case 'get':
                        if ($this->$property instanceof Link) {
                            $setter = 'set' . ucfirst($property);
                            $that = $this;
                            $callee = function($value) use ($setter, $that) {
                                return $that->$setter($value);
                            };
                            
                            $this->$property->setCallee($callee);
                        } else if ($this->$property instanceof \tabs\apiclient\Collection 
                            && !$this->$property->isFetched()
                        ) {
                            self::_fetchCollection($this->$property);
                        }
                        
                        if ($this->$property instanceof StaticCollection) {
                            $this->$property->setAccessor($name);
                        }
                        
                        return $this->$property;
                }
            } else if ($this instanceof Link) {
                // TODO: Look at parent objects within the link object
                //$parent = $this->$property->getParent();
                $class = $this->getObjectClass();
                $that = $class::_get($this->getLink());
                if ($this->getCallee()) {
                    call_user_func($this->getCallee(), $that);
                }
                
                if ($that->$property instanceof \tabs\apiclient\Collection 
                    && !$that->$property->isFetched()
                ) {
                    $that->$property->setPath(
                        $this->getLink() . '/' . $that->$property->getPath() 
                    );
                    self::_fetchCollection($that->$property);
                }
                
                return $that->$property;
            }
        }

        throw new \tabs\apiclient\exception\Exception(
            null,
            'Unknown method called: ' . get_called_class() . ':' . $name
        );
    }
    
    /**
     * Test and fetch a collection
     * 
     * @param \tabs\apiclient\Collection &$collection Collection
     * 
     * @return void
     */
    public static function _fetchCollection(&$collection) 
    {
        if (!$collection->getElementParent() 
            || $collection->getElementParent()->getUpdateUrl()
        ) {
            $collection->fetch();
        }
    }

    /**
     * Get magic method.  Added for symfony forms.
     *
     * @param string $name Name of property
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            $accessor = 'get' . ucfirst($name);
            return $this->$accessor();
        }
    }

    /**
     * Get magic method.  Added for symfony forms.
     *
     * @param string $name Name of property
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
            if ($obj->$property instanceof \DateTime  && (!$value instanceof \DateTime)) {
                //Special handling for DateTime fields
                $obj->$property = new \DateTime($value);
            } else if ($obj->$property instanceof \tabs\apiclient\Collection 
                && (!$value instanceof \tabs\apiclient\Collection)
                && is_array($value)
            ) {
                
                /*
                 * 'if' statement below commented out to stop the client calling
                 * for data that doesn't actually exist, for example if a property
                 * has no attributes and attributes are being returned in the 
                 * property output, then the client will make the /attributes call
                 * because it thinks the data hasn't been fetched yet..
                 */
                
                //if (count($value) > 0) {
                    $obj->$property->setElements($value)->setFetched(true);
                //}
            } else {
                // Normo property values
                $obj->$property = $value;
            }
            break;
        case 'boolean':
            if (is_bool($value)) {
                $obj->$property = $value;
            }
            break;
        case 'string':
            if (is_string($value)) {
                $obj->$property = trim($value);
            }
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