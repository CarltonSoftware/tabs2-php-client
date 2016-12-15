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
class Collection implements \Iterator, \Countable
{
    /**
     * Element class
     * 
     * @var Base
     */
    protected $elementClass;
    
    /**
     * Path class
     * 
     * @var string
     */
    protected $path;

    /**
     * Elements array
     *
     * @var array
     */
    protected $elements = array();

    /**
     * Element parent.  Each child element will have this parent
     *
     * @var Base
     */
    protected $elementParent;

    /**
     * Pagination object
     *
     * @var Pagination
     */
    protected $pagination;
    
    /**
     * Fetched boolean
     * 
     * @var boolean
     */
    protected $fetched = false;

    // ------------------ Static Functions --------------------- //
    
    /**
     * Factory method for the collection
     * 
     * @param string      $path    Path
     * @param string|Base $element Object or object namespace
     * @param Base        $parent  Parent object
     * 
     * @return Collection
     */
    public static function factory($path, $element, &$parent = null)
    {
        $collection = new static();
        $collection->setPath($path)
            ->setElementClass($element);
        
        if ($parent) {
            $collection->setElementParent($parent);
        }
        
        return $collection;
    }

    // ------------------ Public Functions --------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->pagination = new Pagination();
    }
    
    /**
     * Get the pagination
     * 
     * @return Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }    
    
    /**
     * Set the fetched bool
     * 
     * @param boolean $fetched Fetched bool
     * 
     * @return Collection
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
     * Set the collection path
     * 
     * @param string $path Path
     * 
     * @return Collection
     */
    public function setPath($path)
    {   
        $this->path = $path;
        
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
        if ($this->getElementParent()) {
            return $this->getElementParent()->getUpdateUrl() . '/' . $this->getPath();
        }
        
        return $this->getPath();
    }

    /**
     * Fetch an array of elements
     *
     * @return \tabs\apiclient\core\Collection
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
                $this->pagination->setTotal($json->total);
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
     * Set the element class
     * 
     * @param string|Base $class Class
     * 
     * @return Collection
     */
    public function setElementClass($class)
    {
        if (is_string($class)) {
            $class = new $class;
        }
        
        $this->elementClass = $class;
        
        return $this;
    }
    
    /**
     * Get the element class
     * 
     * @return string|Base
     */
    public function getElementClass()
    {
        return $this->elementClass;
    }

    /**
     * Set the element parent
     *
     * @param Base &$element Element by ref
     *
     * @return Collection
     */
    public function setElementParent(Base &$element)
    {
        $this->elementParent = $element;

        return $this;
    }
    
    /**
     * Get the element parent
     * 
     * @return Builder
     */
    public function getElementParent()
    {
        return $this->elementParent;
    }
    
    /**
     * Return the collection of elements
     * 
     * @return \tabs\apiclient\Base[]
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * Set the elements
     *
     * @param array $elements Array of elements
     *
     * @return \tabs\apiclient\core\Collection
     */
    public function setElements(array $elements)
    {
        foreach ($elements as $element) {
            $this->addElement($element);
        }

        return $this;
    }

    /**
     * Add an element to the collection
     *
     * @param mixed $element Element to add
     *
     * @return \tabs\apiclient\core\Collection
     */
    public function addElement(&$element)
    {     
        if (!$element instanceof Base) {
            // Get collection class by checking for discriminator map
            $collectionClass = $this->_getCollectionClass($element);
            
            // Instatiate new element by calling factory method
            $element = $collectionClass::factory($element);
        }
        
        if ($this->getElementParent()) {
            $parent = $this->getElementParent();
            $element->setParent($parent);
        }
        
        $this->elements[] = $element;

        return $this;
    }

    /**
     * Return the total amount of elements found
     *
     * @return integer
     */
    public function getTotal()
    {
        // Need to do this check for when elements are added to a new collection
        // after
        if (count($this->getElements()) > 0
            && $this->getPagination()->getTotal() == 0
        ) {
            $this->setTotal(count($this->getElements()))
                ->setLimit(count($this->getElements()));
        }

        return $this->getPagination()->getTotal();
    }

    /**
     * Set the page to query
     *
     * @param integer $page Page number
     *
     * @return \tabs\apiclient\core\Collection
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
     * @return \tabs\apiclient\core\Collection
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
     * @return \tabs\apiclient\core\Collection
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
     * @return \tabs\apiclient\core\Collection
     */
    public function setFilters(array $filters = [])
    {
        $this->getPagination()->setFilters($filters);

        return $this;
    }

    /**
     * Return the collections elements
     *
     * @return array
     */
    public function toArray()
    {
        return $this->getElements();
    }
    
    /**
     * Get the collection class.
     * 
     * If a discriminator is present attempt to look for a mapped class to return.
     * 
     * @param stdClass $element Json element
     * 
     * @return string
     * 
     * @throws Exception
     */
    private function _getCollectionClass($element)
    {
        if (is_string($this->discriminator())) {
            $discr = $this->discriminator();
            if (property_exists($element, $discr)) {
                $map = $this->discriminatorMap();
                
                if (!array_key_exists($element->$discr, $map)) {
                    throw new Exception(
                        null,
                        'Discrimator type not mapped in collection element'
                    );
                }
                
                return $map[$element->$discr];
            } else {
                throw new Exception(
                    null,
                    'Discrimator not found in collection element'
                );
            }
        }
        
        if ($this->getElementClass() instanceof Base) {
            return $this->getElementClass()->getFullClass();
        }
        
        return $this->getElementClass();
    }
    
    /**
     * Discriminator
     * 
     * @return boolean|string
     */
    public function discriminator()
    {
        return false;
    }
    
    /**
     * Class discriminator map.
     * 
     * @return array
     */
    public function discriminatorMap()
    {
        return array();
    }

    /**
     * 
     * Implement functions from the Iterator interface
     * 
     */


    /**
     * Rewinds the iterator to the beginning of the collection
     *
     * @return \tabs\apiclient\core\Collection
     */
    public function rewind()
    {
        return reset($this->elements);
    }


    /**
     * Returns the current element
     *
     * @return \Object
     */
    public function current()
    {
        return current($this->elements);
    }


    /**
     * Returns the current key
     * 
     * @return mixed
     */
    public function key()
    {
        return key($this->elements);
    }


    /**
     * Return the next element
     * 
     * @return mixed
     */
    public function next()
    {
        return next($this->elements);
    }


    /**
     * Check whether the current item is valid or not
     * 
     * @return boolean
     */
    public function valid()
    {
        return key($this->elements) !== null;
    }
    
    /**
     * @inheritDoc
     */
    public function count($mode = COUNT_NORMAL)
    {
        return count($this->elements, $mode);
    }
    
    /**
     * Return the first element
     * 
     * @return Base|null
     */
    public function first()
    {
        if (count($this->elements) > 0) {
            return $this->elements[0];
        }
    }
    
    /**
     * Return the last element
     * 
     * @return Base|null
     */
    public function last()
    {
        if (count($this->elements) > 0) {
            return $this->elements[count($this->elements) - 1];
        }
    }
}