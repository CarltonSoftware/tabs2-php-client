<?php

/**
 * Tabs client builder helper object.
 *
 * PHP Version 5.4
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient;

/**
 * Tabs client builder helper object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
abstract class Builder extends Base implements BuilderInterface
{
    // -------------------------- Public Functions -------------------------- //

    /**
     * Perform a create request
     *
     * @throws \tabs\apiclient\client\Exception
     *
     * @return Builder
     */
    public function create()
    {
        // Perform post request
        $req = \tabs\apiclient\client\Client::getClient()->post(
            $this->getCreateUrl(),
            $this->toCreateArray()
        );

        // Set the id of the element
        $id = self::getRequestId($req);
        if ($id) {
            $this->setId(
                (integer) $id
            );
        }

        $this->resetChanges();

        return $this;
    }

    /**
     * Perform a update request
     *
     * @throws \tabs\apiclient\client\Exception
     *
     * @return Builder
     */
    public function update()
    {
        // Perform put request
        \tabs\apiclient\client\Client::getClient()->put(
            $this->getUpdateUrl(),
            $this->toUpdateArray()
        );

        $this->resetChanges();

        return $this;
    }

    /**
     * Perform a update request without any parameters
     *
     * @throws \tabs\apiclient\client\Exception
     *
     * @return Builder
     */
    public function commit()
    {
        // Perform put request
        \tabs\apiclient\client\Client::getClient()->put(
            $this->getUpdateUrl()
        );

        $this->resetChanges();

        return $this;
    }

    /**
     * Perform a create request
     *
     * @throws \tabs\apiclient\client\Exception
     *
     * @return Builder
     */
    public function delete()
    {
        // Perform delete request
        $req = \tabs\apiclient\client\Client::getClient()->delete(
            $this->getUpdateUrl()
        );

        if ($req
            && $req->getStatusCode() == '204'
        ) {
            if ($this->getParent()) {
                $this->parent = null;
            }
        }

        return $this;
    }

    /**
     * Helpful accessor incase structure of create post is different to the
     * toArray map
     *
     * @return array
     */
    public function toCreateArray()
    {
        if (method_exists($this, 'toArray')) {
            return $this->toArray();
        } else {
            return $this->__toArray();
        }
    }

    /**
     * Helpful accessor incase structure of update put is different to the
     * toArray map
     *
     * @return array
     */
    public function toUpdateArray()
    {
        if (method_exists($this, 'toArray')) {
            return $this->toArray();
        } else {
            return $this->__toArray();
        }
    }

    /**
     * Return the actor object within the relationship between the builder
     * objects.
     *
     * @return \tabs\apiclient\Actor
     */
    public function getParentActor()
    {
        return $this->_getParentActor($this);
    }

    /**
     * Return the property object within the relationship between the builder
     * objects.
     *
     * @return \tabs\apiclient\Property
     */
    public function getParentProperty()
    {
        return $this->_getParentProperty($this);
    }

    // ------------------------- Private Functions -------------------------- //

    /**
     * Traverse through the relationship to look for an actor object
     *
     * @param Base $object Object to traverse
     *
     * @throws \tabs\apiclient\exception\Exception
     *
     * @return \tabs\apiclient\Actor
     */
    private function _getParentActor($object)
    {
        if ($object->getParent() instanceof \tabs\apiclient\Actor) {
            return $object->getParent();
        } else if ($object->getParent()) {
            return $this->_getParentActor($object->getParent());
        } else {
            return null;
        }
    }

    /**
     * Traverse through the relationship to look for an property object
     *
     * @param Base $object Object to traverse
     *
     * @throws \tabs\apiclient\exception\Exception
     *
     * @return \tabs\apiclient\Property
     */
    private function _getParentProperty($object)
    {
        if ($object->getParent() instanceof \tabs\apiclient\Property) {
            return $object->getParent();
        } else if ($object->getParent()) {
            return $this->_getParentProperty($object->getParent());
        } else {
            return null;
        }
    }

    /**
     * Prefix to array indexes
     *
     * @param array  $array  Array to prefix
     * @param string $string Prefix String
     * @param Base   $object Object
     *
     * @return void
     */
    public function prefixToArray(&$array, $string, $object)
    {
        foreach ($object->toArray() as $key => $value) {
            $array[$string . '_' . $key] = $value;
        }

        if (isset($array[$string . 'id'])) {
            unset($array[$string . 'id']);
        }
    }

    /**
     * @return void
     */
    public function __sleep()
    {
        $properties = array_keys(get_class_vars(get_class($this)));

         if (property_exists($this, 'id') && !$this->getId()) {
            return [];
        }

        $propertiesNotNull = array();
        foreach ($properties as $property) {
            if ($this->$property !== null && $this->$property !== '') {
                $propertiesNotNull[] = $property;
            }
        }
        return $propertiesNotNull;
    }
}