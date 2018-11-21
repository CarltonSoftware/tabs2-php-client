<?php

namespace tabs\apiclient\managedactivity;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Managed Activity Service object.
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
}