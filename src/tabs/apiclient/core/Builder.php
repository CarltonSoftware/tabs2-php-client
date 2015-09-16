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

namespace tabs\apiclient\core;

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

        if (!$req
            || $req->getStatusCode() !== '201'
        ) {
            throw new \tabs\apiclient\client\Exception(
                $req,
                'Unable to create ' . ucfirst($this->getClass())
            );
        }

        // Set the id of the element
        $id = self::getRequestId($req);
        if ($id) {
            $this->setId(
                (integer) $id
            );
        }

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
        $req = \tabs\apiclient\client\Client::getClient()->put(
            $this->getUpdateUrl(),
            $this->toUpdateArray()
        );

        if (!$req
            || $req->getStatusCode() !== '204'
        ) {
            throw new \tabs\apiclient\client\Exception(
                $req,
                'Unable to update ' . ucfirst($this->getClass())
            );
        }

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
        $req = \tabs\apiclient\client\Client::getClient()->put(
            $this->getUpdateUrl()
        );

        if (!$req
            || $req->getStatusCode() !== '204'
        ) {
            throw new \tabs\apiclient\client\Exception(
                $req,
                'Unable to commit ' . ucfirst($this->getClass())
            );
        }

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

        if (!$req
            || $req->getStatusCode() !== '204'
        ) {
            throw new \tabs\apiclient\client\Exception(
                $req,
                'Unable to delete ' . ucfirst($this->getClass())
            );
        } else {
            if ($this->getParent()) {
                $this->parent = null;
            }
        }

        return $this;
    }

    /**
     * Generate a url string for a create url
     *
     * @return string
     */
    public function getCreateUrl()
    {
        return $this->_createUrl();
    }

    /**
     * Generate a url string for a update url
     *
     * @return string
     */
    public function getUpdateUrl()
    {
        return $this->_updateUrl();
    }

    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return strtolower($this->getClass());
    }

    /**
     * Helpful accessor incase structure of create post is different to the
     * toArray map
     *
     * @return array
     */
    public function toCreateArray()
    {
        return $this->toArray();
    }

    /**
     * Helpful accessor incase structure of update put is different to the
     * toArray map
     *
     * @return array
     */
    public function toUpdateArray()
    {
        return $this->toArray();
    }

    /**
     * Return the actor object within the relationship between the builder
     * objects.
     *
     * @return \tabs\apiclient\actor\Actor
     */
    public function getParentActor()
    {
        return $this->_getParentActor($this);
    }

    /**
     * Return the property object within the relationship between the builder
     * objects.
     *
     * @return \tabs\apiclient\property\Property
     */
    public function getParentProperty()
    {
        return $this->_getParentProperty($this);
    }

    /**
     * Traverse through the relationship to look for an actor object
     *
     * @param \tabs\apiclient\actor\Actor $object Actor object
     * @throws \tabs\apiclient\client\Exception
     *
     * @return \tabs\apiclient\actor\Actor
     */
    private function _getParentActor($object)
    {
        if ($object->getParent() instanceof \tabs\apiclient\actor\Actor) {
            return $object->getParent();
        } else if ($object->getParent()) {
            return $this->_getParentActor($object->getParent());
        } else {
            throw new \tabs\apiclient\client\Exception(
                null,
                'Parent actor not found'
            );
        }
    }

    /**
     * Traverse through the relationship to look for an property object
     *
     * @param \tabs\apiclient\core\Base $object Object to traverse
     *
     * @throws \tabs\apiclient\client\Exception
     *
     * @return \tabs\apiclient\actor\Actor
     */
    private function _getParentProperty($object)
    {
        if ($object->getParent() instanceof \tabs\apiclient\property\Property) {
            return $object->getParent();
        } else if ($object->getParent()) {
            return $this->_getParentProperty($object->getParent());
        } else {
            throw new \tabs\apiclient\client\Exception(
                null,
                'Parent property not found'
            );
        }
    }

    /**
     * Generate a url string for a create url
     *
     * @param string $prefix Prefix
     *
     * @return string
     */
    private function _createUrl($prefix = '')
    {
        if ($this->getParent()) {
            $prefix = $this->getParent()->_updateUrl(
                $prefix
            );
        }
        return $prefix . '/' . $this->getUrlStub();
    }

    /**
     * Generate a url string for a create url
     *
     * @param string $prefix Prefix
     *
     * @return string
     */
    private function _updateUrl($prefix = '')
    {
        if ($this->getParent()) {
            $prefix = $this->getParent()->_updateUrl(
                $prefix
            );
        }

        return $prefix . '/' . $this->getUrlStub() . '/' . $this->getId();
    }
}