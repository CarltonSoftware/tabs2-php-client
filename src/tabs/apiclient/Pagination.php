<?php

/**
 * Tabs Rest API Pagination object.
 *
 * PHP Version 5.4
 *
 * @category  Utility
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient;

/**
 * Tabs Rest API Pagination object.
 * 
 * @category  Utility
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Pagination extends Base
{
    /**
     * Current filters
     * 
     * @var array
     */
    protected $filters = array(
        array()
    );

    /**
     * Total amount of elements found for the query
     *
     * @var integer
     */
    protected $total = 0;
    
    /**
     * Request parameters
     * 
     * @var array
     */
    protected $params = array(
        'page' => 1,
        'limit' => 10
    );

    // ------------------ Public Functions --------------------- //
    
    /**
     * Set a parameter to be output at a query parameter
     * 
     * @param string $name Parameter name
     * @param string $val  Value
     * 
     * @return Pagination
     */
    public function addParameter($name, $val)
    {
        $this->params[$name] = $val;
        
        return $this;
    }
    
    /**
     * Get the parameter
     * 
     * @param string $name Name
     * 
     * @return string
     */
    public function getParameter($name)
    {
        return $this->params[$name];
    }
    
    /**
     * Get the request params
     * 
     * @return array
     */
    public function getParameters()
    {
        return $this->params;
    }
    
    /**
     * Add a filter to the filters array
     * 
     * @param string   $key   Filter key
     * @param string   $value Filter value
     * @param integer  $group Filter group (used for OR filtering if greater 
     *                        than zero)
     * 
     * @return \tabs\apiclient\Pagination
     */
    public function addFilter($key, $value, $group = 0)
    {
        if (!isset($this->filters[$group])) {
            $this->filters[$group] = array();
        }
        
        $this->filters[$group][$key] = $value;
        
        return $this;
    }
    
    /**
     * Page number setter
     * 
     * @param integer $page Page number
     * 
     * @return Pagination
     */
    public function setPage($page)
    {
        return $this->addParameter('page', $page);
    }
    
    /**
     * Page limit setter
     * 
     * @param integer $limit Page size/limit
     * 
     * @return Pagination
     */
    public function setLimit($limit)
    {
        return $this->addParameter('limit', $limit);
    }

    /**
     * Search id setter
     *
     * @param integer $searchId
     *
     * @return Pagination
     */
    public function setSearchId($searchId)
    {
        return $this->setParameter('searchId', $searchId);
    }

    
    /**
     * Remove a parameter
     * 
     * @param string $name Param name
     * 
     * @return Pagination
     */
    public function removeParameter($name)
    {
        unset($this->params[$name]);
        
        return $this;
    }
    
    /**
     * Remove a group
     * 
     * @param integer $group Group
     * 
     * @return \tabs\apiclient\Pagination
     * 
     * @throws \RuntimeException
     */
    public function removeGroup($group)
    {
        if (isset($this->filters[$group])) {
            unset($this->filters[$group]);
        } else {
            throw new \RuntimeException('Group does not exist');
        }
        
        return $this;
    }
    
    /**
     * Total setter
     * 
     * @param integer $total Total
     * 
     * @return Pagination
     */
    public function setTotal($total)
    {
        $this->total = $total;
        
        return $this;
    }
    
    /**
     * Set the request filters
     * 
     * @param array $filters Request filters
     * 
     * @return Pagination
     */
    public function setFilters(array $filters)
    {
        if (count($filters) > 0) {
            $tmp = $filters;
            $f = array_shift($tmp);
            if (!is_array($f)) {
                $filters = array($filters);
            }
        } else {
            $filters = array(
                array()
            );
        }
        
        $this->filters = $filters;
        
        return $this;
    }
    
    /**
     * Return the current page
     * 
     * @return integer
     */
    public function getPage()
    {
        return $this->getParameter('page');
    }
    
    /**
     * Return the current page size/limit
     * 
     * @return integer
     */
    public function getLimit()
    {
        return $this->getParameter('limit');
    }

    /**
     * Return the current search id
     *
     * @return integer
     */
    public function getSearchId()
    {
        return $this->getParameter('searchId');
    }
    
    /**
     * Return the total
     * 
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }
    
    /**
     * Return the filters array
     * 
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }
    
    /**
     * Return the filters in the correct api format
     * 
     * @return array
     */
    public function getFiltersArray()
    {
        $filters = array();
        foreach ($this->filters as $filter) {
            $filters[] = http_build_query($filter, null, ':');
        }
        
        return $filters;
    }
    
    /**
     * Get the filters string ready for a request
     * 
     * @return string
     */
    public function getRequestQuery()
    {
        return http_build_query(
            $this->toArray(),
            null,
            '&'
        );
    }
    
    /**
     * Get the first filter array
     * 
     * @return array
     */
    public function getFirstFilter()
    {
        $filters = $this->filters;
        $filter = array_shift($filters);
        
        if (is_array($filter)) {
            return $filter;
        }
        
        return array();
    }
    
    /**
     * ToArray function
     * 
     * @return array
     */
    public function toArray()
    {
        $filter = array();
        if (count($this->getFilters()) > 0 && count($this->getFirstFilter()) > 0) {
            $filter['filter'] = $this->getFiltersArray();
            
            if (count($filter['filter']) == 1) {
                $f = array_shift($filter['filter']);
                $filter['filter'] = $f;
            }
        }
        
        return array_filter(
            array_merge(
                $filter,
                $this->getParameters()
            )
        );
    }

    /**
     * Return the max page int
     *
     * @return integer
     */
    public function getMaxPages()
    {
        return $this->getTotal() > 0 ? ceil($this->getTotal() / $this->getLimit()) : 0;
    }

    /**
     * Get the start of the selection
     *
     * @return int
     */
    public function getStart()
    {
        if ($this->getPage() <= 1) {
            return 1;
        } else {
            return (($this->getPage()-1) * $this->getLimit()) + 1;
        }
    }

    /**
     * Get the end of the selection
     *
     * @return integer
     */
    public function getEnd()
    {
        $end = ($this->getStart() - 1) + $this->getLimit();
        if ($end > $this->getTotal()) {
            return $this->getTotal();
        } else {
            return $end;
        }
    }

    /**
     * Get perious page integer
     *
     * @return integer
     */
    public function getPrevPage()
    {
        $page = $this->getPage();
        $prevPage = $page - 1;
        
        return ($prevPage < 1) ? 1 : $prevPage;
    }

    /**
     * Get next page integer
     *
     * @return integer
     */
    public function getNextPage()
    {
        $page = $this->getPage();
        $nextPage = $page + 1;
        
        return ($nextPage > $this->getMaxPages()) ? 1 : $nextPage;
    }

    /**
     * Return the range of pages in the selection
     *
     * @return array
     */
    public function getRange($numPages = 5)
    {
        if ($this->getMaxPages() > 1) {
            
            $rangeStart = 1;
            $rangeEnd = $this->getMaxPages();

            // If $numPages is set and is less than the maximum number of pages
            // in the search, then start to slice up the range of pages
            if ($numPages > 0
                && $this->getMaxPages() > $numPages
            ) {
                // Find middle of numPages
                $rangePad = floor($numPages / 2);

                // Set start and end.
                $rangeStart = $this->getPage() - $rangePad;
                $rangeEnd = $this->getPage() + $rangePad;

                // If the start of the range is out of bounds, reset the bounds
                if ($rangeStart < 1) {
                    $rangeStart = 1;
                    $rangeEnd = $numPages;
                }
            }
            
            return range($rangeStart, $rangeEnd);
        } else {
            return array(1);
        }
    }
}