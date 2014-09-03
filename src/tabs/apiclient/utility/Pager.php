<?php

/**
 * Tabs Pager utility class.
 *
 * PHP Version 5.4
 *
 * @category  Utility
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\utility;

/**
 * Tabs Pager utility class. Provides functionality for creating pagination
 * links.
 *
 * PHP Version 5.4
 *
 * @category  Utility
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */
class Pager
{
    /**
     * Pagination object
     * 
     * @var \tabs\apiclient\utility\Pagination
     */
    protected $pagination;
    
    // -------------------------- Public Functions -------------------------- //
    
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
     * Set the pagination
     * 
     * @param \tabs\apiclient\utility\Pagination $pagination Pagination object
     * 
     * @return \tabs\apiclient\utility\Pager
     */
    public function setPagination(Pagination $pagination)
    {
        $this->pagination = $pagination;
        
        return $this;
    }
    
    /**
     * Return the pagination object
     * 
     * @return \tabs\apiclient\utility\Pagination
     */
    public function getPagination()
    {
        return $this->pagination;
    }

    /**
     * Returns the href elements of pagination links
     *
     * Returns an associative array of links, first, previous, page1..n, next,
     * last.  If an elelment is not relevant (e.g. previous on page 1) that
     * index will not be filled.
     *
     * @param integer $numPages Range of page numbers.  If set to greater than zero
     * the function will limit the amount of pages shown to the range specified.
     *
     * @return array
     */
    public function getPages($numPages = 0)
    {
        $pagination = array();
        if ($this->getPagination()->getMaxPages() > 1) {

            $rangeStart = 1;
            $rangeEnd = $this->getPagination()->getMaxPages();

            // If $numPages is set and is less than the maximum number of pages
            // in the search, then start to slice up the range of pages
            if ($numPages > 0
                && $this->getPagination()->getMaxPages() > $numPages
            ) {
                // Find middle of numPages
                $rangePad = floor($numPages / 2);

                // Find middle of page range
                $pageMiddle = $this->getPagination()->getPage();

                // Set start and end.
                $rangeStart = $pageMiddle - $rangePad;
                $rangeEnd = $pageMiddle + $rangePad;

                // If the start of the range is out of bounds, reset the bounds
                if ($rangeStart < 1) {
                    $rangeStart = 1;
                    $rangeEnd = $numPages;
                }

                // If the end of the range is out of bounds, reset also
                if ($rangeEnd >= $this->getPagination()->getMaxPages()) {
                    $numPages -= 1;
                    $rangeEnd = $this->getPagination()->getMaxPages();
                    $rangeStart = $rangeEnd - $numPages;
                }
            }

            for ($i = $rangeStart; $i <= $rangeEnd; $i++) {
                $pagination[] = $i;
            }
        }
        
        return $pagination;
    }

    /**
     * Get perious page integer
     *
     * @return integer
     */
    public function getPrevPage()
    {
        $page = $this->getPagination()->getPage();
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
        $page = $this->getPagination()->getPage();
        $nextPage = $page + 1;
        
        if ($nextPage > $this->getPagination()->getMaxPages()) {
            $nextPage = 1;
        }

        return $nextPage;
    }
}