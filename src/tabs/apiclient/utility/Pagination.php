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

namespace tabs\apiclient\utility;

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
class Pagination extends \tabs\apiclient\core\Base
{
    /**
     * Admin page number
     *
     * @var integer
     */
    protected $page = 1;
    
    /**
     * Admin page size/limit number
     *
     * @var integer
     */
    protected $limit = 10;

    /**
     * Total amount of bookings found for the query
     *
     * @var integer
     */
    protected $total = 0;
    
    /**
     * Current filters
     * 
     * @var array
     */
    protected $filters = array();

    // ------------------ Public Functions --------------------- //
    
    /**
     * Page number setter
     * 
     * @param integer $page Page number
     * 
     * @return \tabs\apiclient\api\core\Pagination
     */
    public function setPage($page)
    {
        $this->page = $page;
        
        return $this;
    }
    
    /**
     * Page limit setter
     * 
     * @param integer $limit Page size/limit
     * 
     * @return \tabs\apiclient\api\core\Pagination
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        
        return $this;
    }
    
    /**
     * Total setter
     * 
     * @param integer $total Total
     * 
     * @return \tabs\apiclient\api\core\Pagination
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
     * @return \tabs\apiclient\api\core\Pagination
     */
    public function setFilters($filters)
    {
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
        return $this->page;
    }
    
    /**
     * Return the current page size/limit
     * 
     * @return integer
     */
    public function getLimit()
    {
        return $this->limit;
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
     * Get the filters string read for a request
     * 
     * @return string
     */
    public function getFiltersString()
    {
        return http_build_query($this->getFilters(), null, ':');
    }
    
    /**
     * Get the filters string read for a request
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
     * ToArray function
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'page' => $this->getPage(),
            'limit' => $this->getLimit(),
            'filter' => urldecode($this->getFiltersString())
        );
    }

    /**
     * Return the max page int
     *
     * @return integer
     */
    public function getMaxPages()
    {
        return ceil($this->getTotal() / $this->getLimit());
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
     * @return int
     */
    public function getEnd()
    {
        $end = (($this->getStart()-1) + $this->getLimit());
        if ($end > $this->getTotal()) {
            return $this->getTotal();
        } else {
            return $end;
        }
    }

    /**
     * Return the range of pages in the selection
     *
     * @return array
     */
    public function getRange()
    {
        if ($this->getMaxPages() > 1) {
            return range(1, $this->getMaxPages());
        } else {
            return array(1);
        }
    }
}