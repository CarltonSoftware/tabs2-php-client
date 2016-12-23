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
 * @method \tabs\apiclient\Service getService() Returns the service
 * @method \DateTime getFromdate() Returns the fromdate
 * @method Service setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method Service setTodate(\DateTime $var) Sets the todate
 * 
 * @method string getDatetouse() Returns the datetouse
 * @method Service setDatetouse(string $var) Sets the datetouse
 * 
 * @method boolean getCustomerbookings() Returns the customerbookings
 * @method Service setCustomerbookings(boolean $var) Sets the customerbookings
 * 
 * @method boolean getOwnerbookings() Returns the ownerbookings
 * @method Service setOwnerbookings(boolean $var) Sets the ownerbookings
 * 
 * @method Collection|BookingEvent[] getBookingevents() Returns the booking events
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
}