<?php

/**
 * Tabs Rest API Property Brand object.
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

namespace tabs\apiclient\property\brand;
use tabs\apiclient\core\status\Status;
use tabs\apiclient\core\status\History;

/**
 * Tabs Rest API Property Brand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Status      getStatus() Returns the property status
 * @method BrandStatus setPrimarybookingbrand(boolean $bool) Set the primary booking brand flag
 * @method boolean     getPrimarybookingbrand()              Get the primary booking brand flag
 */
abstract class BrandStatus extends \tabs\apiclient\brand\Brand
{
    /**
     * Current status
     * 
     * @var Status
     */
    protected $status;
    
    /**
     * Status history array
     * 
     * @var History[]
     */
    protected $statushistory = array();
    
    /**
     * Is the brand the primary brand?
     * 
     * @var boolean
     */
    protected $primarybookingbrand = false;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Sets the current status
     * 
     * @param stdClass|array|Status $status Status object or array of data
     * 
     * @return Brand
     */
    public function setStatus($status)
    {
        $this->status = Status::factory($status);
        
        return $this;
    }
    
    /**
     * Set the status history items
     * 
     * @param array $items Array of history items or arrays
     * 
     * @return Brand
     */
    public function setStatushistory(array $items)
    {
        foreach ($items as $item) {
            $history = History::factory($item);
            
            $this->addStatushistory($history);
        }
        
        return $this;
    }
    
    /**
     * Add history item to brand
     * 
     * @param History $history history item
     * 
     * @return Brand
     */
    public function addStatusHistory(History &$history)
    {
        $history->setParent($this);
        $this->statushistory[] = $history;
        
        return $this;
    }
}