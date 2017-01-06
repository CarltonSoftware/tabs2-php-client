<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Supplier object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\Supplier getActor() Returns the actor
 * @method \tabs\apiclient\Service getService() Returns the service
 * @method boolean getAutoadded() Returns the autoadded
 * @method Supplier setAutoadded(boolean $var) Sets the autoadded
 * 
 * @method \tabs\apiclient\Tabsuser getMarkcompletedbyactor() Returns the markcompletedbyactor
 * @method \DateTime getCompleteddatetime() Returns the completeddatetime
 * @method Supplier setCompleteddatetime(\DateTime $var) Sets the completeddatetime
 * 
 * @method \tabs\apiclient\Tabsuser getCancelledbybyactor() Returns the cancelledbybyactor
 * @method \DateTime getCancelleddatetime() Returns the cancelleddatetime
 * @method Supplier setCancelleddatetime(\DateTime $var) Sets the cancelleddatetime
 * 
 */
class Supplier extends Builder
{
    /**
     * Actor
     *
     * @var \tabs\apiclient\Supplier
     */
    protected $actor;

    /**
     * Service
     *
     * @var \tabs\apiclient\Service
     */
    protected $service;

    /**
     * Autoadded
     *
     * @var boolean
     */
    protected $autoadded = false;

    /**
     * Markcompletedbyactor
     *
     * @var \tabs\apiclient\Tabsuser
     */
    protected $markcompletedbyactor;

    /**
     * Completeddatetime
     *
     * @var \DateTime
     */
    protected $completeddatetime;

    /**
     * Cancelledbybyactor
     *
     * @var \tabs\apiclient\Tabsuser
     */
    protected $cancelledbybyactor;

    /**
     * Cancelleddatetime
     *
     * @var \DateTime
     */
    protected $cancelleddatetime;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->completeddatetime = new \DateTime();
        $this->cancelleddatetime = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the actor
     *
     * @param stdclass|array|\tabs\apiclient\Supplier $actor The Actor
     *
     * @return Supplier
     */
    public function setActor($actor)
    {
        $this->actor = \tabs\apiclient\Supplier::factory($actor);

        return $this;
    }

    /**
     * Set the service
     *
     * @param stdclass|array|\tabs\apiclient\Service $service The Service
     *
     * @return Supplier
     */
    public function setService($service)
    {
        $this->service = \tabs\apiclient\Service::factory($service);

        return $this;
    }

    /**
     * Set the markcompletedbyactor
     *
     * @param stdclass|array|\tabs\apiclient\Tabsuser $markcompletedbyactor The Markcompletedbyactor
     *
     * @return Supplier
     */
    public function setMarkcompletedbyactor($markcompletedbyactor)
    {
        $this->markcompletedbyactor = \tabs\apiclient\Tabsuser::factory($markcompletedbyactor);

        return $this;
    }

    /**
     * Set the cancelledbybyactor
     *
     * @param stdclass|array|\tabs\apiclient\Tabsuser $cancelledbybyactor The Cancelledbybyactor
     *
     * @return Supplier
     */
    public function setCancelledbybyactor($cancelledbybyactor)
    {
        $this->cancelledbybyactor = \tabs\apiclient\Tabsuser::factory($cancelledbybyactor);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'actorid' => $this->getActor()->getId(),
            'serviceid' => $this->getService()->getId(),
            'autoadded' => $this->boolToStr($this->getAutoadded())
        );
        
        if ($this->getCancelledbybyactor()) {
            $arr['markcompletedbyactorid'] = $this->getMarkcompletedbyactor()->getId();
        }
        
        if ($this->getMarkcompletedbyactor()) {
            $arr['cancelledbybyactorid'] = $this->getCancelledbybyactor()->getId();
        }
        
        return $arr;
    }
}