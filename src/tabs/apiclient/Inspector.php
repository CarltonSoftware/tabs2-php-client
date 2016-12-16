<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Inspector object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getName() Returns the name
 * @method Inspector setName(string $var) Sets the name
 * 
 * @method string getSchedule() Returns the schedule
 * @method Inspector setSchedule(string $var) Sets the schedule
 */
class Inspector extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Schedule
     *
     * @var string
     */
    protected $schedule;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'schedule' => $this->getSchedule(),
        );
    }
}