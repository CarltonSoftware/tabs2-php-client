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
    public function setParent(\tabs\actor\Actor &$builder)
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
     * @return string
     */
    public function getCreateUrl()
    {
        return $this->generateUrl('{getUrlStub}', '{getUrlStub}/{getId}/');
    }
    
    /**
     * Generate a url string for a create url
     * 
     * @return string
     */
    public function getUpdateUrl()
    {
        if ($this->getId() === null) {
            throw new \tabs\client\Exception(
                null,
                'Unable to generate update url ' 
                . ucfirst($this->getStubClass()) 
                . ' without creating it first'
            );
        }
        
        return $this->generateUrl('{getUrlStub}/{getId}', '{getUrlStub}/{getId}/');
    }
    
    /**
     * Build a url from the parent/child tree
     * 
     * @param string             $childTemplate  Child template
     * @param string             $parentTemplate Parent template
     * @param string             $prefix         Previously generated string
     * @param \tabs\core\Builder $object         Object whos methods to use
     * 
     * @return string
     */
    public function generateUrl(
        $childTemplate,
        $parentTemplate,
        $prefix = '',
        &$object = null
    ) {
        if (!$object) {
            $object = $this;
        }
        if ($object->getParent() && $object->getParent()->getId()) {
            return $object->generateUrl(
                $childTemplate,
                $parentTemplate,
                $object->replaceObjectData($parentTemplate, $object->getParent()),
                $object->getParent()
            );
        }
        
        return $prefix . $this->replaceObjectData($childTemplate, $this);
    }
   
    /**
     * Function used to overwrite a string with the output of any 
     * accessor methods
     *
     * @param string   $template Template pattern
     * @param stdClass &$object  Object
     * 
     * @return string
     */
    public function replaceObjectData($template, &$object)
    {
        preg_match_all('#\{[^}]*\}#s', $template, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            if (isset($match[0])) {
                $method = str_replace('}', '', str_replace('{', '', $match[0]));
                $template = str_replace(
                    '{'.$method.'}', 
                    $object->$method(),
                    $template
                );
            }
        }
        
        return $template;
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