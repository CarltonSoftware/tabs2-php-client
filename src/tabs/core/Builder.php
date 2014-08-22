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

namespace tabs\core;

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
    /**
     * Parent element
     * 
     * @var \tabs\core\Builder
     */
    protected $parent;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Set the parent element
     * 
     * @param \tabs\core\Builder $builder Parent element
     * 
     * @return \tabs\core\Builder
     */
    public function setParent(\tabs\core\Builder &$builder)
    {
        $this->parent = $builder;
        
        return $this;
    }
    
    /**
     * Return the builder parent element
     * 
     * @return \tabs\core\Builder
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     * Perform a create request
     * 
     * @throws \tabs\client\Exception
     * 
     * @return $this
     */
    public function create()
    {
        // Perform post request
        $req = \tabs\client\Client::getClient()->post(
            $this->getCreateUrl(),
            $this->toArray()
        );

        if (!$req
            || $req->getStatusCode() !== '201'
        ) {
            throw new \tabs\client\Exception(
                $req,
                'Unable to create ' . ucfirst($this->getStubClass())
            );
        }
        
        // Set the id of the element
        $id = $this->_getId($req);
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
     * @throws \tabs\client\Exception
     * 
     * @return $this
     */
    public function update()
    {
        // Perform put request
        $req = \tabs\client\Client::getClient()->put(
            $this->getUpdateUrl(),
            $this->toArray()
        );

        if (!$req
            || $req->getStatusCode() !== '204'
        ) {
            throw new \tabs\client\Exception(
                $req,
                'Unable to update ' . ucfirst($this->getStubClass())
            );
        }
        
        return $this;
    }
    
    /**
     * Perform a create request
     * 
     * @throws \tabs\client\Exception
     * 
     * @return $this
     */
    public function delete()
    {
        // Perform delete request
        $req = \tabs\client\Client::getClient()->delete(
            $this->getUpdateUrl()
        );

        if (!$req
            || $req->getStatusCode() !== 204
        ) {
            throw new \tabs\client\Exception(
                $req,
                'Unable to delete ' . ucfirst($this->getStubClass())
            );
        }
        
        return $this;
    }
    
    /**
     * Generate a url string for a create url
     * 
     * @param string $prefix Prefix
     * 
     * @return string
     */
    public function getCreateUrl($prefix = '')
    {
        if ($this->getParent()) {
            $prefix = $this->getParent()->getUpdateUrl(
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
    public function getUpdateUrl($prefix = '')
    {
        if ($this->getParent()) {
            $prefix = $this->getParent()->getUpdateUrl(
                $prefix
            );
        }
        
        return $prefix . '/' . $this->getUrlStub() . '/' . $this->getId();
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return strtolower($this->getClass());
    }
    
    /**
     * Return the ID from a content-location header
     * 
     * @param \GuzzleHttp\Message\Response $req Guzzle response
     * 
     * @return string|void
     */
    private function _getId($req)
    {
        if ($req->getHeader('content-location')) {
            return preg_replace(
                '/\D/',
                '',
                str_replace(
                    $this->getCreateUrl(), 
                    '',
                    $req->getHeader('content-location')
                )
            );
        }
    }
}