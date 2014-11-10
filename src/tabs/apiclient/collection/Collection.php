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
use \tabs\apiclient\utility;

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
 * @method Collection setElementParent(\tabs\apiclient\core\Base $ele) Child class parent
 */
abstract class Collection extends \tabs\apiclient\core\Base implements CollectionInterface
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
    
    /**
     * Route to fetch
     * 
     * @var string
     */
    protected $route = '';

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
                $ele = $class::factory($element);
                if ($this->getElementParent()) {
                    $ele->setParent($this->getElementParent());
                }
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
     * Return the route
     * 
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }
}