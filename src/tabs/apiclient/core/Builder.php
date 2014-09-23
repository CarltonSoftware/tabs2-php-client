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

    // ------------------ Static Functions --------------------- //

    /**
     * Get an object from a given route
     *
     * @param string $route GET route
     *
     * @return mixed
     */
    public static function _get($route)
    {
        $request = \tabs\apiclient\client\Client::getClient()->get($route);

        return self::factory($request->json(array('object' => true)));
    }
    
    /**
     * Fetch an array of elements
     * 
     * @param string $route Url to fetch
     * 
     * @return array
     */
    public static function _fetch($route)
    {
        // Get the route
        $request = \tabs\apiclient\client\Client::getClient()->get($route);
        $elements = array();

        if ($request
            && $request->getStatusCode() == '200'
        ) {
            $json = $request->json(array('object' => true));
            foreach ($json as $element) {
                $ele = static::factory($element);
                array_push($elements, $ele);
            }
            
            return $elements;
        }
        
        throw new \tabs\apiclient\client\Exception(
            $request,
            'Unable to fetch element for route: ' . $route
        );
    }
    
    /**
     * Return the ID from a content-location header
     * 
     * @param \GuzzleHttp\Message\Response $req Guzzle response
     * 
     * @return string|void
     */
    public static function getRequestId($req)
    {
        if ($req->getHeader('content-location')) {
            $location = explode('/', $req->getHeader('content-location'));
            
            return $location[count($location) - 1];
        }
    }

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Perform a create request
     * 
     * @throws \tabs\apiclient\client\Exception
     * 
     * @return $this
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
                'Unable to create ' . ucfirst($this->getStubClass())
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
     * @return $this
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
                'Unable to update ' . ucfirst($this->getStubClass())
            );
        }
        
        return $this;
    }
    
    /**
     * Perform a create request
     * 
     * @throws \tabs\apiclient\client\Exception
     * 
     * @return $this
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
                'Unable to delete ' . ucfirst($this->getStubClass())
            );
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
     * Traverse through the relationship to look for an actor object
     * 
     * @param \tabs\apiclient\actor\Actor $object Actor object
     * @throws \RuntimeException
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
            throw new \RuntimeException('Parent actor not found');
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