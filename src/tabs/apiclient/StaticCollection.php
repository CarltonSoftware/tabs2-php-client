<?php

/**
 * Tabs Rest StaticCollection object.
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
 * Tabs Rest StaticCollection object. Handles groups of objects output from
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
class StaticCollection implements \Iterator, \Countable
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
    
    /**
     * Path status
     * 
     * @var boolean
     */
    protected $pathOverridden = false;
    
    /**
     * Discriminator
     * 
     * @var string|boolean
     */
    protected $discriminator = false;
    
    /**
     * Accessor. Stores what property the collection is mapped too in Base class
     * objects;
     * 
     * @var string
     */
    protected $accessor;

    // ------------------ Static Functions --------------------- //
    
    /**
     * Factory method for the collection
     * 
     * @param string      $path    Path
     * @param string|Base $element Object or object namespace
     * @param Base        $parent  Parent object
     * 
     * @return StaticCollection
     */
    public static function factory(
        $path,
        $element,
        &$parent = null
    ) {
        $collection = new static();
        $collection->setPath($path)
            ->setPathOverridden(false)
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
    
    /**
     * Set the element class
     * 
     * @param string|Base $class Class
     * 
     * @return StaticCollection
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
     * @return StaticCollection
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
     * Set the accessor
     * 
     * @param string $accessor
     * 
     * @return StaticCollection
     */
    public function setAccessor($accessor)
    {
        $this->accessor = $accessor;
        
        return $this;
    }
    
    /**
     * Return the accessor
     * 
     * @return string
     */
    public function getAccessor()
    {
        return $this->accessor;
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
     * @return StaticCollection
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
     * @return StaticCollection
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
        if (is_string($this->getDiscriminator())) {
            $discr = $this->getDiscriminator();
            if (property_exists($element, $discr)) {
                $map = $this->getDiscriminatorMap();
                
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
                    'Discrimator ' . $discr . ' not found in collection element'
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
    public function getDiscriminator()
    {
        return $this->discriminator;
    }
    
    /**
     * Set the Discriminator
     * 
     * @param string $dis Discriminator
     * 
     * @return StaticCollection
     */
    public function setDiscriminator($dis)
    {
        $this->discriminator = $dis;
        
        return $this;
    }
    
    /**
     * Class discriminator map.
     * 
     * @return array
     */
    public function getDiscriminatorMap()
    {
        return $this->discriminatorMap;
    }
    
    /**
     * Set the disciminator map
     * 
     * @param array $map Map
     * 
     * @return StaticCollection
     */
    public function setDiscriminatorMap(array $map = array())
    {
        $this->discriminatorMap = $map;
        
        return $this;
    }
    
    /**
     * Find an element or elements using aa particular callback
     * 
     * @param \tabs\apiclient\callable $fn Function
     * 
     * @return \tabs\apiclient\StaticCollection
     */
    public function findBy(callable $fn)
    {
        $p = $this->getElementParent();
        $col = self::factory(
            $this->getPath(),
            $this->getElementClass(),
            $p
        );
        $col->setElements(array_filter($this->getElements(), $fn));
        $col->setTotal(count($col->getElements()));
        
        return $col;
    }
    
    /**
     * Find an element by its id
     * 
     * @param string $id Id
     * 
     * @return Base
     */
    public function findById($id)
    {
        $col = $this->findBy(function($ele) use ($id) {
            return $ele->getId() == $id;
        });
        
        return $col->first();
    }

    /**
     * Rewinds the iterator to the beginning of the collection
     *
     * @return StaticCollection
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