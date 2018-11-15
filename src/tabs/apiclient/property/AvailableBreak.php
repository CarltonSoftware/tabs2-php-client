<?php

namespace tabs\apiclient\property;
use tabs\apiclient\Base;

/**
 * Tabs Rest API AvailableBreak object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class AvailableBreak extends Base
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
     * Daysavailable
     *
     * @var integer
     */
    protected $days;

    /**
     * price
     *
     * @var integer
     */
    protected $price;

    // -------------------- Public Functions -------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'days' => $this->getDays(),
            'price' => $this->getPrice()
        );
    }

    /**
     * Returns the from date
     *
     * @return /DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the from date
     *
     * @return /DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Returns the days
     *
     * @return integer
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Returns the price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the fromdate
     *
     * @param string|\DateTime $fromdate The Fromdate
     *
     * @return AvailableBreak
     */
    public function setFromdate($fromdate)
    {
        if ($fromdate instanceof \DateTime) {
            $this->fromdate = $fromdate;
        } else {
            $this->fromdate = new \DateTime($fromdate);
        }

        return $this;
    }

    /**
     * Set the todate
     *
     * @param string|\DateTime $todate The Todate
     *
     * @return AvailableBreak
     */
    public function setTodate($todate)
    {
        if ($todate instanceof \DateTime) {
            $this->todate = $todate;
        } else {
            $this->todate = new \DateTime($todate);
        }

        return $this;
    }

    /**
     * Set the number of days
     *
     * @param integer $days The number of days
     *
     * @return AvailableBreak
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Set the price
     *
     * @param integer $price The price
     *
     * @return AvailableBreak
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }
}