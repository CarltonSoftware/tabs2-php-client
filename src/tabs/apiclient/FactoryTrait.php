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
     * Array of changes
     *
     * @var array
     */
    protected $changes = array();

    /**
     * Return the changes made to this object
     *
     * @return array
     */
    public function getChanges()
    {
        return $this->changes;
    }

    /**
     * Reset changes
     *
     * @return $this
     */
    public function resetChanges()
    {
        $this->changes = array();

        return $this;
    }

    /**
     * Returns true if the object has been altered
     *
     * @return boolean
     */
    public function hasChanged()
    {
        return count($this->getChanges()) > 0;
    }

    /**
     * @param string $key Key
     *
     * @return boolean
     */
    public function hasChange($key)
    {
        return array_key_exists($key, $this->changes);
    }

    /**
     * Get the json
     *
     * @param \Psr\Http\Message\ResponseInterface $response Response
     * @param boolean                             $assoc    Array or not
     *
     * @return \stdClass|array
     */
    public static function getJson($response, $assoc = false)
    {
        return \GuzzleHttp\json_decode(
            (string) $response->getBody(),
            $assoc
        );
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
     * @param Base                $parent  Parent object
     *
     * @return Base
     */
    public static function factory($element, $parent = null)
    {
        // If class is the same as object being `factory'ised`, just return it.
        if ((is_object($element) && get_class($element) == get_called_class())
            || is_null($element)
        ) {
            return $element;
        }

        // Do not set object if its a stdClass and is empty
        if ($element instanceof \stdClass
            && count(get_object_vars($element)) == 0
        ) {
            return null;
        }

        $object = new static();

        if (is_string($element)) {
            if (strlen($element) > 0) {
                $link = new Link();
                $link->setLink($element);
                $link->setObjectClass(get_class($object));
                return $link;
            } else {
                $element = array();
            }
        }

        self::setObjectProperties($object, $element);

        if ($parent && $object instanceof Base) {
            $object->setParent($parent);
        }

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
        if (method_exists($obj, 'setDormant')) {
            $obj->setDormant(false);
        }
        if (\method_exists($obj, 'quickSet')) {
            $obj->quickSet($node);
        } else {
            foreach ($node as $key => $val) {
                // Check/create collections if they exist
                $obj->_check_collection_map($key);

                $func = 'set' . ucfirst($key);
                if (!in_array($key, $exceptions)) {
                    if (method_exists($obj, $func)) {
                        $obj->$func($val);
                    } elseif (property_exists($obj, $key) ) {
                        $obj->setObjectProperty($obj, $key, $val);
                    }
                }
            }
        }

        if (method_exists($obj, 'setDormant')) {
            $obj->setDormant(true);
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
        if (method_exists($this, $method)) {
            return true;
        }
        if (!is_string($method)) {
            return false;
        }
        $prefix = substr($method, 0, 3);
        if (($prefix === 'get' || $prefix === 'set')
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
        if ($name === 'toArray') {
            return $this->__toArray();
        }

        // This call method is only for accessors
        $nameLength = strlen($name);
        if ($nameLength > 2) {

            $prefix = substr($name, 0, 3);
            // Get the property
            if ($prefix === 'get' || $prefix === 'set') {
                $property = substr($name, 3, $nameLength);
            } else {
                // Not get or set so assume 'is'
                $property = substr($name, 2, $nameLength);
                $prefix = substr($name, 0, 2);
            }

            // All properties will be camelcase, make first letter lowercase
            $property = lcfirst($property);

            if (property_exists($this, $property)) {
                if ($prefix === 'is') {
                    if (is_bool($this->$property)) {
                        return ($this->$property === true);
                    }
                }

                switch ($prefix) {
                case 'set':
                    // Set the changes list
                    $this->addChange($property, $args[0]);

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
                    } else if ($col = $this->_check_collection_map($property)) {
                        return $this->$property->fetch();
                    }

                    if ($this->$property instanceof StaticCollection) {
                        $this->$property->setAccessor($name);
                    }

                    return $this->$property;
                }
            } else if ($this instanceof Link) {
                // TODO: Look at parent objects within the link object
                //$parent = $this->$property->getParent();
                $that = $this->get();

                if ($that->$property instanceof \tabs\apiclient\Collection
                    && !$that->$property->isFetched()
                ) {
                    $that->$property->setPath(
                        $this->getLink() . '/' . $that->$property->getPath()
                    );
                    self::_fetchCollection($that->$property);
                }

                return $that->$name();
            }
        }

        throw new \tabs\apiclient\exception\Exception(
            null,
            'Unknown method called: ' . get_called_class() . ':' . $name
        );
    }

    /**
     * Check a collection and create if necessary
     *
     * @param string $collection Collection name/key
     *
     * @return \tabs\apiclient\Collection|null
     */
    protected function _check_collection_map($collection)
    {
        if (property_exists($this, '__COLLECTION_MAP')
            && array_key_exists($collection, $this->__COLLECTION_MAP)
            && !$this->$collection
        ) {
            $cls = "\\tabs\\apiclient\\" . $this->__COLLECTION_MAP[$collection]['class'];
            $object = new $cls();
            if (isset($this->__COLLECTION_MAP[$collection]['parent'])
                && $this->__COLLECTION_MAP[$collection]['parent'] === true
            ) {
                $this->$collection = Collection::factory(
                    $object->getCreateUrl(),
                    $object,
                    $this
                );
            } else {
                $this->$collection = Collection::factory(
                    $object
                );
            }

            return $this->$collection;
        }
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
     * Set magic method.  Added for symfony forms.
     *
     * @param string $name  Name of property
     * @param string $value Value
     *
     * @return mixed
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->setObjectProperty($this, $name, $value);
        } else {
            $this->$name = $value;
        }
    }

    /**
     * Generic setter to allow for setting public properties.
     *
     * @param string $name  Name of property
     * @param string $value Value
     *
     * @return mixed
     */
    public function set($name, $value)
    {
        $this->addChange($name, $value);
        $this->$name = $value;

        return $this;
    }

    /**
     * Return the changed array
     *
     * @return array
     */
    public function __toArray()
    {
        $arr = array();
        foreach ($this->changes as $key => $val) {
            if ($val instanceof \DateTime) {
                $arr[$key] = $val->format('Y-m-d H:i:s');
            } else if (is_bool($val)) {
                $arr[$key] = $this->boolToStr($val);
            } else if ($val instanceof Base) {
                $arr[$key . 'id'] = $val->getId();
            } else {
                $arr[$key] = $val;
            }
        }

        return $arr;
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
        //echo "<p>".get_class($obj)." ".$property." ".strtolower(gettype($obj->$property))." ". ($value instanceof \DateTime ? $value->format('y-M-d') : $value). "</p>";
        switch (strtolower(gettype($obj->$property))) {
        case 'array':
        case 'integer':
        case 'object':
        case 'null':
        case 'resource':
            if ($obj->$property instanceof \DateTime  && (!$value instanceof \DateTime)) {
                //Special handling for DateTime fields
                $obj->$property = new \DateTime($value);
         //echo "<p>".get_class($obj)." ".$property." ".strtolower(gettype($obj->$property))." ". ($value instanceof \DateTime ? $value->format('y-M-d') : $value). "</p>";
           } else if ($obj->$property instanceof \tabs\apiclient\StaticCollection
                && (!$value instanceof \tabs\apiclient\StaticCollection)
                && is_array($value)
            ) {
                $obj->$property->reset()->setElements($value)->setFetched(true);
            } else if ($obj->$property instanceof Base) {
                $class = $obj->$property->getFullClass();
                $obj->$property = $class::factory($value);
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
     * Dependancy checker for dormant state
     *
     * @return boolean
     */
    private function _isDormant()
    {
        if (method_exists($this, 'isDormant')) {
            return $this->isDormant();
        } else {
            return true;
        }
    }

    /**
     * Add a change to the log for a domant entity
     *
     * @param string $property Property name
     * @param mixed  $value    Value
     *
     * @return void
     */
    public function addChange($property, $value)
    {
        if ($this->_isDormant()
            && property_exists($this, $property)
            && (is_scalar($value) || $value instanceof \DateTime || $value instanceof Base)
        ) {
            $this->changes[$property] = $value;
        }
    }
}