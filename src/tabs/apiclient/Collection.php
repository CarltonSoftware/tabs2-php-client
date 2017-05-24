<?php

/**
 * Tabs Rest Collection object.
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

use tabs\apiclient\Base;
use tabs\apiclient\exception\Exception;

/**
 * Tabs Rest Collection object. Handles groups of objects output from
 * a fetch command.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Collection extends StaticCollection
{
    /**
     * Fetch an array of elements
     *
     * @return Collection
     */
    public function fetch()
    {
        // Get the element index
        $class = $this->getElementClass();
        $response = \tabs\apiclient\client\Client::getClient()->get(
            $this->getRoute(),
            $this->getPagination()->toArray()
        );
        
        $this->setFetched(true);
        
        if ($response
            && $response->getStatusCode() == 200
        ) {
            $json = Base::getJson($response);
            $elements = $json;
            if (is_object($json) && property_exists($json, 'elements')
                && property_exists($json, 'total')
            ) {
                $this->getPagination()->setTotal($json->total);
                $elements = $json->elements;
            } else {
                $this->setTotal(count($elements))->setLimit(count($elements));
            }

            // Clear elements array first
            $this->elements = array();

            // Populate with new elements
            foreach ($elements as $element) {                
                // Add new element to collection
                $this->addElement($element);
            }

            return $this;
        }

        throw new Exception(
            $response,
            'Unable to fetch GET: ' . $class
        );
    }
    
    /**
     * @inheritDoc
     */
    public function findBy(callable $fn)
    {
        if (!$this->isFetched()) {
            $this->fetch();
        }
        
        return parent::findBy($fn);
    }

    /**
     * Set the page to query
     *
     * @param integer $page Page number
     *
     * @return StaticCollection
     */
    public function setPage($page)
    {
        if (is_numeric($page)) {
            $this->getPagination()->setPage($page);
        }

        return $this;
    }

    /**
     * Set the limit to query
     *
     * @param integer $limit Element limit (page size)
     *
     * @return StaticCollection
     */
    public function setLimit($limit)
    {
        if (is_numeric($limit)) {
            $this->getPagination()->setLimit($limit);
        }

        return $this;
    }

    /**
     * Set the total
     *
     * @param integer $total Number of elements found
     *
     * @return StaticCollection
     */
    public function setTotal($total)
    {
        $this->getPagination()->setTotal($total);

        return $this;
    }

    /**
     * Set the pagination filters
     *
     * @param array $filters Filters array
     *
     * @return StaticCollection
     */
    public function setFilters(array $filters = [])
    {
        $this->getPagination()->setFilters($filters);

        return $this;
    }
    
    /**
     * Shortcut function for the Pagination::addFilter method
     * 
     * @param string   $key   Filter key
     * @param string   $value Filter value
     * @param integer  $group Filter group (used for OR filtering if greater 
     *                        than zero)
     * 
     * @return \tabs\apiclient\FilterCollection
     */
    public function addFilter($key, $value, $group = 0)
    {
        $this->getPagination()->addFilter($key, $value, $group);
        
        return $this;
    }
    
    /**
     * Set the fetched bool
     * 
     * @param boolean $fetched Fetched bool
     * 
     * @return StaticCollection
     */
    public function setFetched($fetched)
    {   
        $this->fetched = $fetched;
        
        return $this;
    }
    
    /**
     * Check the fetched bool
     * 
     * @return boolean
     */
    public function isFetched()
    {
        return $this->fetched;
    }
    
    /**
     * Set the override path bool
     * 
     * @param boolean $bool Bool
     * 
     * @return StaticCollection
     */
    public function setPathOverridden($bool)
    {   
        $this->pathOverridden = $bool;
        
        return $this;
    }
    
    /**
     * Check the path override bool
     * 
     * @return boolean
     */
    public function isPathOverridden()
    {
        return $this->pathOverridden;
    }
    
    /**
     * Set the collection path
     * 
     * @param string $path Path
     * 
     * @return StaticCollection
     */
    public function setPath($path)
    {   
        $this->path = $path;
        $this->pathOverridden = true;
        
        return $this;
    }
    
    /**
     * Get the collection path
     * 
     * @return string
     */
    public function getPath()
    {   
        return $this->path;
    }
    
    /**
     * Get the route for the collection based on the url
     * 
     * @return string
     */
    public function getRoute()
    {
        if ($this->getElementParent() && !$this->isPathOverridden()) {
            return $this->getElementParent()->getUpdateUrl() . '/' . $this->getPath();
        }
        
        return $this->getPath();
    }
}