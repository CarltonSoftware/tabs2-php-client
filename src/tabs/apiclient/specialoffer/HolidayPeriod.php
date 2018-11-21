<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API BookingPeriod object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method HolidayPeriod setDonotsplit(boolean $var) Set the do not split variable
 */
class HolidayPeriod extends BookingPeriod
{
    /**
     * Do not split
     *
     * @var boolean
     */
    protected $donotsplit = false;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->setFromdate(new \DateTime());
        $this->setTodate(new \DateTime());
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * Get the donotsplit
     *
     * @return boolean
     */
    public function getDonotsplit()
    {
        return $this->donotsplit;
    }
}