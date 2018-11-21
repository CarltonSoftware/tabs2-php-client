<?php

namespace tabs\apiclient\property\supplier;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\property\supplier\service\BookingEvent;

/**
 * Tabs Rest API Property Supplier Service object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Service setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method Service setTodate(\DateTime $var) Sets the todate
 * 
 * @method Service setDatetouse(string $var) Sets the datetouse
 * 
 * @method Service setCustomerbookings(boolean $var) Sets the customerbookings
 * 
 * @method Service setOwnerbookings(boolean $var) Sets the ownerbookings
 * 
 */
class Service extends Builder
{
    /**
     * Service
     *
     * @var \tabs\apiclient\Service
     */
    protected $service;

    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;

    /**
     * Datetouse
     *
     * @var string
     */
    protected $datetouse;

    /**
     * Customerbookings
     *
     * @var boolean
     */
    protected $customerbookings;

    /**
     * Ownerbookings
     *
     * @var boolean
     */
    protected $ownerbookings;
    
    /**
     * Booking events
     * 
     * @var Collection|BookingEvent[]
     */
    protected $bookingevents;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->bookingevents = Collection::factory(
            'bookingevent',
            new BookingEvent(),
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the service
     *
     * @param stdclass|array|\tabs\apiclient\Service $service The Service
     *
     * @return Service
     */
    public function setService($service)
    {
        $this->service = \tabs\apiclient\Service::factory($service);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'serviceid' => $this->getService()->getId(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'datetouse' => $this->getDatetouse(),
            'customerbookings' => $this->boolToStr($this->getCustomerbookings()),
            'ownerbookings' => $this->boolToStr($this->getOwnerbookings()),
        );
    }

    /**
     * Returns the service
     *
     * @return \tabs\apiclient\Service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Returns the fromdate
     *
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the todate
     *
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Returns the datetouse
     *
     * @return string
     */
    public function getDatetouse()
    {
        return $this->datetouse;
    }

    /**
     * Returns the customerbookings
     *
     * @return boolean
     */
    public function getCustomerbookings()
    {
        return $this->customerbookings;
    }

    /**
     * Returns the ownerbookings
     *
     * @return boolean
     */
    public function getOwnerbookings()
    {
        return $this->ownerbookings;
    }

    /**
     * Returns the booking events
     *
     * @return Collection|BookingEvent[]
     */
    public function getBookingevents()
    {
        return $this->bookingevents;
    }
}