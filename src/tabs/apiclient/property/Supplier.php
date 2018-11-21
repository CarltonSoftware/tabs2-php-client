<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\ManagedActivity;
use tabs\apiclient\property\supplier\DateRange;
use tabs\apiclient\property\supplier\Service;

/**
 * Tabs Rest API Property Supplier object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Collection|DateRange[] getDates() Returns the dates
 * @method Collection|Service[] getServices() Returns the services
 */
class Supplier extends Builder
{
    /**
     * Activity
     *
     * @var ManagedActivity
     */
    protected $activity;

    /**
     * Actor
     *
     * @var \tabs\apiclient\Supplier
     */
    protected $actor;

    /**
     * Dates
     *
     * @var Collection|DateRange[]
     */
    protected $dates;
    
    /**
     * Services
     * 
     * @var Collection|Service[]
     */
    protected $services;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->dates = Collection::factory(
            'daterange',
            new DateRange,
            $this
        );
        
        $this->services = Collection::factory(
            'service',
            new Service,
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the activity
     *
     * @param stdclass|array|ManagedActivity $activity The Activity
     *
     * @return Supplier
     */
    public function setActivity($activity)
    {
        $this->activity = ManagedActivity::factory($activity);

        return $this;
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
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'managedactivityid' => $this->getActivity()->getId(),
            'actorid' => $this->getActor()->getId(),
        );
    }

    /**
     * Returns the activity
     *
     * @return ManagedActivity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Returns the actor
     *
     * @return \tabs\apiclient\Supplier
     */
    public function getActor()
    {
        return $this->actor;
    }
}