<?php

namespace tabs\apiclient\property\supplier\service;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API BookingEvent object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\BookingEvent getEvent() Returns the event
 * @method string getAction() Returns the action
 * @method BookingEvent setAction(string $var) Sets the action
 */
class BookingEvent extends Builder
{
    /**
     * Event
     *
     * @var \tabs\apiclient\BookingEvent
     */
    protected $event;

    /**
     * Action
     *
     * @var string
     */
    protected $action;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the event
     *
     * @param stdclass|array|\tabs\apiclient\BookingEvent $event The Event
     *
     * @return BookingEvent
     */
    public function setEvent($event)
    {
        $this->event = \tabs\apiclient\BookingEvent::factory($event);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'bookingeventid' => $this->getEvent()->getId(),
            'action' => $this->getAction()
        );
    }
}