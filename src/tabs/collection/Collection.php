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

namespace tabs\collection;

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
 * @method \tabs\utility\Pagination getPagination() Return the pagination element
 */
abstract class Collection extends \tabs\core\Base implements CollectionInterface
{
    /**
     * Elements array
     * 
     * @var array
     */
    protected $elements = array();
    
    /**
     * Pagination object
     * 
     * @var \tabs\utility\Pagination
     */
    protected $pagination;
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Fetch an array of elements
     * 
     * @return \tabs\core\Collection
     */
    public function fetch()
    {
        // Get the element index
        $class = $this->getElementClass();
        $elementsIndex = \tabs\client\Client::getClient()->get(
            $this->getRoute(),
            $this->getPagination()->toArray()
        );

        if ($elementsIndex
            && $elementsIndex->getStatusCode() == 200
        ) {
            $json = $elementsIndex->json(array('object' => true));
            $this->pagination->setTotal($json->total);
            foreach ($json->elements as $element) {
                $ele = $class::factory($element);
                $this->addElement($ele);
            }
            
            return $this;
        }
        
        throw new \tabs\client\Exception(
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
        $elementsIndex = \tabs\client\Client::getClient()->options(
            $this->getRoute()
        );

        if ($elementsIndex
            && $elementsIndex->getStatusCode() == 200
        ) {
            return $elementsIndex->json(array('object' => true));
        }
        
        throw new \tabs\client\Exception(
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
        $this->pagination = new \tabs\utility\Pagination();
    }
    
    /**
     * Set the elements
     * 
     * @param array $elements Array of elements
     * 
     * @return \tabs\core\Collection
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
     * @return \tabs\core\Collection
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
     * @return \tabs\core\Collection
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
     * @return \tabs\core\Collection
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
     * @return \tabs\core\Collection
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
     * @return \tabs\core\Collection
     */
    public function setFilters(array $filters = [])
    {
        $this->getPagination()->setFilters($filters);
        
        return $this;
    }
}