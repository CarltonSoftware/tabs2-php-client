<?php

/**
 * Tabs Rest API Potential Cancellation object.
 *
 * PHP Version 5.4
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient;

/**
 * Tabs Rest API Potential Cancellation object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * 
 * @method PotentialCancellation setPotentialtransfer(boolean $flag) set the potential transfer flag
 * @method PotentialCancellation setCancellationrequested(boolean $flag) set the cancellation requested flag
 * @method PotentialCancellation setRequestedfromdate(\DateTime $datetime) Set the request from date
 * @method PotentialCancellation setRequestedtodate(\DateTime $datetime) Set the request to date
 */
class PotentialCancellation extends Base
{
    /**
     * Potential Transfer
     * 
     * @var boolean
     */
    protected $potentialtransfer = false;

    /**
     * Cancellation Requested
     * 
     * @var boolean
     */
    protected $cancellationrequested = false;

    /**
     * Request From Datetime
     *
     * @var \DateTime
     */
    protected $requestedfromdate;
    
    /**
     * Request To Datetime
     *
     * @var \DateTime
     */
    protected $requestedtodate;


    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        $fromDate = $this->getRequestedfromdate();
        $toDate = $this->getRequestedtodate();
        if ($fromDate instanceof \DateTime) {
            $fromDate = $fromDate->format('Y-m-d');
        }
        if ($toDate instanceof \DateTime) {
            $toDate = $toDate->format('Y-m-d');
        }

        return array(
            'potentialtransfer' => $this->getPotentialtransfer(),
            'cancellationrequested' => $this->getCancellationrequested(),
            'requestedfromdate' => $fromDate,
            'requestedtodate' => $toDate
        );
    }

    /**
     * Return the potential transfer flag
     * 
     * @return boolean
     */
    public function getPotentialtransfer()
    {
        return $this->potentialtransfer;
    }

    /**
     * Return the cancellation requested flag
     * 
     * @return boolean
     */
    public function getCancellationrequested()
    {
        return $this->cancellationrequested;
    }

    /**
     * Return the requested from datetime
     *
     * @return \DateTime
     */
    public function getRequestedfromdate()
    {
        return $this->requestedfromdate;
    }

    /**
     * Return the requested from datetime
     *
     * @return \DateTime
     */
    public function getRequestedtodate()
    {
        return $this->requestedtodate;
    }
}