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

namespace tabs\apiclient\collection;
use tabs\apiclient\utility\Pagination;

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
 *
 * @method Pagination                getPagination()    Return the pagination element
 * @method \tabs\apiclient\core\Base getElementParent() Return the element parent
 *
 * @method Collection setRoute(string $route) Set the route
 */
abstract class Collection extends \tabs\apiclient\core\Base implements CollectionInterface, \Iterator, \Countable
{
    /**
     * Elements array
     *
     * @var array
     */
    protected $elements = array();

    /**
     * Element parent.  Each child element will have this parent
     *
     * @var \tabs\apiclient\core\Base
     */
    protected $elementParent;

    /**
     * Pagination object
     *
     * @var \tabs\apiclient\utility\Pagination
     */
    protected $pagination;

    // ------------------ Public Functions --------------------- //

    /**
     * Fetch an array of elements
     *
     * @return \tabs\apiclient\core\Collection
     */
    public function fetch()
    {
        // Get the element index
        $class = $this->getElementClass();
        $elementsIndex = \tabs\apiclient\client\Client::getClient()->get(
            $this->getRoute(),
            $this->getPagination()->toArray()
        );

        if ($elementsIndex
            && $elementsIndex->getStatusCode() == 200
        ) {
            $json = $elementsIndex->json(array('object' => true));
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
                
                // Get collection class by checking for discriminator map
                $collectionClass = $this->_getCollectionClass($element);
                
                // Instatiate new element by calling factory method
                $ele = $collectionClass::factory($element);
                if ($this->getElementParent()) {
                    $parent = $this->getElementParent();
                    $ele->setParent($parent);
                }
                
                // Add new element to collection
                $this->addElement($ele);
            }

            return $this;
        }

        throw new \tabs\apiclient\client\Exception(
            $elementsIndex,
            'Unable to fetch GET: ' . $class
        );
    }

    /**
     * Fetch an array of valid filters
     *
     * @return stdClass
     */
    public function filters()
    {
        // Get the element index
        $class = $this->getElementClass();
        $elementsIndex = \tabs\apiclient\client\Client::getClient()->options(
            $this->getRoute()
        );

        if ($elementsIndex
            && $elementsIndex->getStatusCode() == 200
        ) {
            return $elementsIndex->json(array('object' => true));
        }

        throw new \tabs\apiclient\client\Exception(
            $elementsIndex,
            'Unable to fetch OPTIONS: ' . $class
        );
    }

    // ------------------ Public Functions --------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->pagination = new \tabs\apiclient\utility\Pagination();
    }

    /**
     * Set the element parent
     *
     * @param \tabs\apiclient\core\Base &$element Element by ref
     *
     * @return \tabs\apiclient\collection\Collection
     */
    public function setElementParent(&$element)
    {
        $this->elementParent = $element;

        return $this;
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
     * @throws \tabs\apiclient\client\Exception
     */
    private function _getCollectionClass($element)
    {
        if (is_string($this->discriminator())) {
            $discr = $this->discriminator();
            if (property_exists($element, $discr)) {
                $map = $this->discriminatorMap();
                
                if (!array_key_exists($element->$discr, $map)) {
                    throw new \tabs\apiclient\client\Exception(
                        null,
                        'Discrimator type not mapped in collection element'
                    );
                }
                
                return $map[$element->$discr];
            } else {
                throw new \tabs\apiclient\client\Exception(
                    null,
                    'Discrimator not found in collection element'
                );
            }
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
}