<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Inspection Type object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method InspectionType setInspectiontype(string $var) Sets the inspectiontype
 * 
 * @method InspectionType setSchedule(string $var) Sets the schedule
 * 
 * @method InspectionType setGradingunit(string $var) Sets the gradingunit
 * 
 * @method InspectionType setDefaultgrading(string $var) Sets the defaultgrading
 */
class InspectionType extends Builder
{
    /**
     * Inspectiontype
     *
     * @var string
     */
    protected $inspectiontype;

    /**
     * Schedule
     *
     * @var string
     */
    protected $schedule;
    
    /**
     * Gradingunit
     *
     * @var string
     */
    protected $gradingunit;

    /**
     * Defaultgrading
     *
     * @var string
     */
    protected $defaultgrading;    

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'inspectiontype' => $this->getInspectiontype(),
            'schedule' => $this->getSchedule(),
            'gradingunit' => $this->getGradingunit(),
            'defaultgrading' => $this->getDefaultgrading()
        );
    }

    /**
     * Returns the inspectiontype
     *
     * @return string
     */
    public function getInspectiontype()
    {
        return $this->inspectiontype;
    }

    /**
     * Returns the schedule
     *
     * @return string
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Returns the gradingunit
     *
     * @return string
     */
    public function getGradingunit()
    {
        return $this->gradingunit;
    }

    /**
     * Returns the defaultgrading
     *
     * @return string
     */
    public function getDefaultgrading()
    {
        return $this->defaultgrading;
    }
}