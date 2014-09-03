<?php

/**
 * Tabs Rest API User Builder object.
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

namespace tabs\apiclient\user;

/**
 * Tabs Rest API User Builder object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
abstract class Builder extends \tabs\apiclient\core\Builder
{
    /**
     * Commit an element to its parent
     * 
     * @return \tabs\apiclient\core\Builder
     */
    public function commit()
    {
        if (!$this->getParent()) {
            throw new \tabs\apiclient\client\Exception(
                null,
                'Unable add element. Parent not set.'
            );
        }
        
        $request = \tabs\apiclient\client\Client::getClient()->put(
            $this->_getPath()
        );

        if (!$request || $request->getStatusCode() !== '204') {
            throw new \tabs\apiclient\client\Exception(
                $request,
                'Unable to add element ' 
                    . $this->getId() 
                    . ' to Parent: ' 
                    . $this->getParent()->getId()
            );
        }
        
        return $this->getParent();
    }
    
    /**
     * Remove an element from its parent
     * 
     * @return \tabs\apiclient\core\Builder
     */
    public function remove()
    {
        if (!$this->getParent()) {
            throw new \tabs\apiclient\client\Exception(
                null,
                'Unable remove element from parent.  Parent not set.'
            );
        }
        
        $request = \tabs\apiclient\client\Client::getClient()->delete(
            $this->_getPath()
        );

        if (!$request || $request->getStatusCode() !== '204') {
            throw new \tabs\apiclient\client\Exception(
                $request,
                'Unable to remove element ' 
                    . $this->getId() 
                    . ' from parent: ' 
                    . $this->getParent()->getId()
            );
        }
        
        return $this->getParent();
    }
    
    /**
     * Return the path for the put/delete routes
     * 
     * @return string
     */
    private function _getPath()
    {
        return sprintf(
            '/auth/%s/%s/%s/%s',
            strtolower($this->getParent()->getClass()),
            $this->getParent()->getId(),
            strtolower($this->getClass()),
            $this->getId()
        );
    }
}