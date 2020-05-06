<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API EventLog object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method EventLog setType(string $var) Sets the type
 * @method EventLog setEventtype(\tabs\apiclient\EventType $var) Sets the eventtype
 * @method EventLog setEventdatetime(DateTime $var) Sets the eventdatetime
 * @method EventLog setActor(\tabs\apiclient\Actor $var) Sets the actor
 * @method EventLog setBooking(\tabs\apiclient\Booking $var) Sets the booking
 * @method EventLog setProperty(\tabs\apiclient\Property $var) Sets the property
 */
class EventLog extends Builder
{
    /**
     * Type
     *
     * @var string
     */
    protected $type;

    /**
     * Eventtype
     *
     * @var \tabs\apiclient\EventType
     */
    protected $eventtype;

    /**
     * Eventdatetime
     *
     * @var DateTime
     */
    protected $eventdatetime;

    /**
     * Actor
     *
     * @var \tabs\apiclient\Actor
     */
    protected $actor;

    /**
     * Booking
     *
     * @var \tabs\apiclient\Booking
     */
    protected $booking;

    /**
     * Property
     *
     * @var \tabs\apiclient\Property
     */
    protected $property;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->eventdatetime = new \DateTime(); // not optional as the docs say
        $this->eventype = new EventType();
        
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        return $arr;
    }

    /**
     * Returns the EventType
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return \tabs\apiclient\EventType
     */
    public function getEventtype()
    {
        return $this->eventtype;
    }

    /**
     * @return DateTime
     */
    public function getEventdatetime()
    {
        return $this->eventdatetime;
    }

    /**
     * @return \tabs\apiclient\Actor
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * @return \tabs\apiclient\Booking
     */
    public function getBooking()
    {
        return $this->booking;
    }

    /**
     * @return \tabs\apiclient\Property
     */
    public function getProperty()
    {
        return $this->property;
    }
}
