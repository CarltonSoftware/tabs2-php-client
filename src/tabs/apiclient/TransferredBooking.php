<?php

/**
 * Tabs Rest API Transferred Booking object.
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
 * Tabs Rest API Cancelled Booking object.
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
 * @method TransferredBooking setDatetime(\DateTime $datetime) Set the datetime
 */
class TransferredBooking extends Base
{
    /**
     * Datetime
     *
     * @var \DateTime
     */
    protected $datetime;
    
    /**
     * Transferred to booking
     * 
     * @var Booking
     */
    protected $tobooking;
    
    /**
     * Transferred from booking
     * 
     * @var Booking
     */
    protected $frombooking;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->datetime = new \DateTime();
        
        parent::__construct($id);
    }
    
    /**
     * To Booking
     * 
     * @param Booking|string|array|\stdClass $booking Booking
     * 
     * @return \tabs\apiclient\TransferredBooking
     */
    public function setTobooking($booking)
    {
        $this->tobooking = Booking::factory($booking);
        
        return $this;
    }
    
    /**
     * From Booking
     * 
     * @param Booking|string|array|\stdClass $booking Booking
     * 
     * @return \tabs\apiclient\TransferredBooking
     */
    public function setFrombooking($booking)
    {
        $this->frombooking = Booking::factory($booking);
        
        return $this;
    }
    
    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        $arr = array(
            'datetime' => $this->getDatetime()->format('Y-m-d H:i:s')
        );
        
        if ($this->getTobooking()) {
            $arr['tobookingid'] = $this->getTobooking()->getId();
        } else if ($this->getFrombooking()) {
            $arr['frombookingid'] = $this->getFrombooking()->getId();
        }
        
        return $arr;
    }

    /**
     * Return the datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Return the booking that this booking was transferred to
     *
     * @return Booking
     */
    public function getTobooking()
    {
        return $this->tobooking;
    }

    /**
     * Return the booking that this booking was transferred from
     *
     * @return Booking
     */
    public function getFrombooking()
    {
        return $this->frombooking;
    }
}