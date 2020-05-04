<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API EventType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method EventType setEventtype(string $var) Sets the eventtype
 * @method EventType setAppliestobooking(boolean|null $var) Sets the appliestobooking
 * @method EventType setAppliestoactor(boolean|null $var) Sets the appliestoactor
 * @method EventType setAppliestocustomer(boolean|null $var) Sets the appliestocustomer
 */
class EventType extends Builder
{
    /**
     * Eventtype
     *
     * @var string
     */
    protected $eventtype;

    /**
     * Appliestobooking
     *
     * @var boolean|null
     */
    protected $appliestobooking = null;

    /**
     * Appliestoactor
     *
     * @var boolean|null
     */
    protected $appliestoactor = null;
    
    /**
     * Appliestocustomer
     *
     * @var boolean|null
     */
    protected $appliestocustomer = null;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
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
     * @return string
     */
    public function getEventtype()
    {
        return $this->eventtype;
    }

    /**
     * @return boolean|null
     */
    public function getAppliestobooking()
    {
        return $this->appliestobooking;
    }

    /**
     * @return boolean|null
     */
    public function getAppliestoactor()
    {
        return $this->appliestoactor;
    }

    /**
     * @return boolean|null
     */
    public function getAppliestocustomer()
    {
        return $this->appliestocustomer;
    }
}
