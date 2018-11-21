<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API TriggerEvent object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method TriggerEvent setTiggerevent(string $var) Sets the tiggerevent
 * 
 * @method TriggerEvent setEventdescription(string $var) Sets the eventdescription
 */
class TriggerEvent extends Builder
{
    /**
     * Tiggerevent
     *
     * @var string
     */
    protected $tiggerevent;

    /**
     * Eventdescription
     *
     * @var string
     */
    protected $eventdescription;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * Returns the tiggerevent string
     *
     * @return string
     */
    public function getTiggerevent()
    {
        return $this->tiggerevent;
    }

    /**
     * Returns the eventdescription string
     *
     * @return string
     */
    public function getEventdescription()
    {
        return $this->eventdescription;
    }
}