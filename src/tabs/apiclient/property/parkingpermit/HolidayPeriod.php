<?php

namespace tabs\apiclient\property\parkingpermit;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ParkingPermit\HolidayPeriod object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method HolidayPeriod setFromdate(\DateTime $var) Sets the fromdate
 * @method HolidayPeriod setTodate(\DateTime $var) Sets the todate
 * @method HolidayPeriod setSamedateseveryyear(boolean $var) Sets the samedateseveryyear
 */
class HolidayPeriod extends Builder
{
    /**
     * From Date
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * To Date
     *
     * @var \DateTime
     */
    protected $todate;


    /**
     * Same dates every year
     *
     * @var boolean
     */
    protected $samedateseveryyear;

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
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        return $arr;
    }

    /**
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * @return boolean
     */
    public function getSamedateseveryyear()
    {
        return $this->samedateseveryyear;
    }
}
