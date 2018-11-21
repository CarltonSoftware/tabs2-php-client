<?php

namespace tabs\apiclient\actor;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ManagedActivity object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ManagedActivity setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method ManagedActivity setTodate(\DateTime $var) Sets the todate
 */
class ManagedActivity extends Builder
{
    /**
     * Managedactivity
     *
     * @var \tabs\apiclient\ManagedActivity
     */
    protected $managedactivity;

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

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        
        parent::__construct($id);
    }

    /**
     * Set the managedactivity
     *
     * @param stdclass|array|\tabs\apiclient\ManagedActivity $managedactivity The Managedactivity
     *
     * @return ManagedActivity
     */
    public function setManagedactivity($managedactivity)
    {
        $this->managedactivity = \tabs\apiclient\ManagedActivity::factory(
            $managedactivity
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'managedactivity' => $this->getManagedactivity()->getId(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
        );
    }

    /**
     * Returns the managedactivity
     *
     * @return \tabs\apiclient\ManagedActivity
     */
    public function getManagedactivity()
    {
        return $this->managedactivity;
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
}