<?php

/**
 * Tabs Rest API Property Status object.
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

namespace tabs\apiclient\core\status;
use tabs\apiclient\core\status\Status;

/**
 * Tabs Rest API Property Status object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Status    getStatus()   Return the status name
 * @method \DateTime getFromdate() Return the status starting date
 * @method \DateTime getTodate()   Return the status ending date
 */
class History extends \tabs\apiclient\core\Base
{
    /**
     * Name
     * 
     * @var Status
     */
    protected $status;
    
    /**
     * Fromdate of status
     * 
     * @var \DateTime
     */
    protected $fromdate;
    
    /**
     * Todate of status
     * 
     * @var \DateTime
     */
    protected $todate;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->status = new Status();
    }
    
    /**
     * Set the from date time
     * 
     * @param \DateTime|string $date Set the date time
     * 
     * @return History
     */
    public function setFromdate($date)
    {
        $this->fromdate = $this->getDateTime($date);
        
        return $this;
    }
    
    /**
     * Set the to date time
     * 
     * @param \DateTime|string $date Set the date time
     * 
     * @return History
     */
    public function setTodate($date)
    {
        $this->todate = $this->getDateTime($date);
        
        return $this;
    }

    /**
     * Set the status for this history item
     * 
     * @param array|stdClass|Status $status Status
     * 
     * @return \tabs\apiclient\core\status\History
     */
    public function setStatus($status)
    {
        $this->status = Status::factory($status);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'status' => $this->getStatus()->getName(),
            'statusfromdate' => $this->getFromdate()->format('Y-m-d H:i:s'),
            'statustodate' => $this->getTodate()->format('Y-m-d H:i:s')
        );
    }
}