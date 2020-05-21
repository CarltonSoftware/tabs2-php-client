<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;

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
 * @method BookingEvent setEvent(string $var) Sets the event
 * @method BookingEvent setDescription(string $var) Sets the description
 */
class BookingEvent extends Base
{
    /**
     * @var string
     */
    protected $event;

    /**
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

    /**
     * Returns the event
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}