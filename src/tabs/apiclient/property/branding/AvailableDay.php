<?php

namespace tabs\apiclient\property\branding;
use tabs\apiclient\Base;

/**
 * Tabs Rest API AvailableDay object.
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
class AvailableDay extends Base
{
    /**
     * Date
     *
     * @var \DateTime
     */
    protected $date;

    /**
     * Daysavailable
     *
     * @var integer
     */
    protected $daysavailable;

    /**
     * Isfromdate
     *
     * @var boolean
     */
    protected $isfromdate;

    /**
     * Istodate
     *
     * @var boolean
     */
    protected $istodate;

    /**
     * Earliestbookingdate
     *
     * @var \DateTime
     */
    protected $earliestbookingdate;

    /**
     * Minimumholiday
     *
     * @var integer
     */
    protected $minimumholiday;

    /**
     * Maximumholiday
     *
     * @var integer
     */
    protected $maximumholiday;

    /**
     * Unlessholidayatleast
     *
     * @var integer
     */
    protected $unlessholidayatleast;

    /**
     * Showonavailability
     *
     * @var boolean
     */
    protected $showonavailability;

    /**
     * priceanchor
     *
     * @var boolean
     */
    protected $priceanchor;

    /**
     * dayssincepriceanchor
     *
     * @var integer
     */
    protected $dayssincepriceanchor = 0;

    // -------------------- Public Functions -------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->date = new \DateTime();
        $this->earliestbookingdate = new \DateTime();
    }

    public function quickSet($data)
    {
        $this->date = new \DateTime($data->date);
        $this->daysavailable = $data->daysavailable;
        $this->bookingstatus = $data->bookingstatus;
        $this->isfromdate = $data->isfromdate;
        $this->istodate = $data->istodate;
        $this->earliestbookingdate = new \DateTime($data->earliestbookingdate);
        $this->minimumholiday = $data->minimumholiday;
        $this->maximumholiday = $data->maximumholiday;
        $this->unlessholidayatleast = $data->unlessholidayatleast;
        $this->showonavailability = $data->showonavailability;
        $this->priceanchor = $data->priceanchor;
        $this->dayssincepriceanchor = $data->dayssincepriceanchor;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'date' => $this->getDate()->format('Y-m-d'),
            'daysavailable' => $this->getDaysavailable(),
            'isfromdate' => $this->boolToStr($this->getIsfromdate()),
            'istodate' => $this->boolToStr($this->getIstodate()),
            'earliestbookingdate' => $this->getEarliestbookingdate()->format('Y-m-d'),
            'minimumholiday' => $this->getMinimumholiday(),
            'maximumholiday' => $this->getMaximumholiday(),
            'unlessholidayatleast' => $this->getUnlessholidayatleast(),
            'showonavailability' => $this->boolToStr($this->getShowonavailability()),
            'priceanchor' => $this->boolToStr($this->getPriceanchor()),
            'dayssincepriceanchor' => $this->getDayssincepriceanchor()
        );
    }

    /**
     * Returns the date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the daysavailable
     *
     * @return integer
     */
    public function getDaysavailable()
    {
        return $this->daysavailable;
    }

    /**
     * Returns the isfromdate
     *
     * @return boolean
     */
    public function getIsfromdate()
    {
        return $this->isfromdate;
    }

    /**
     * Returns the istodate
     *
     * @return boolean
     */
    public function getIstodate()
    {
        return $this->istodate;
    }

    /**
     * Returns the earliestbookingdate
     *
     * @return \DateTime
     */
    public function getEarliestbookingdate()
    {
        return $this->earliestbookingdate;
    }

    /**
     * Returns the minimumholiday
     *
     * @return integer
     */
    public function getMinimumholiday()
    {
        return $this->minimumholiday;
    }

    /**
     * Returns the maximumholiday
     *
     * @return integer
     */
    public function getMaximumholiday()
    {
        return $this->maximumholiday;
    }

    /**
     * Returns the unlessholidayatleast
     *
     * @return integer
     */
    public function getUnlessholidayatleast()
    {
        return $this->unlessholidayatleast;
    }

    /**
     * Returns the showonavailability
     *
     * @return boolean
     */
    public function getShowonavailability()
    {
        return $this->showonavailability;
    }

    /**
     * Returns the priceanchor
     *
     * @return boolean
     */
    public function getPriceanchor()
    {
        return $this->priceanchor;
    }

    /**
     * Returns the the days since priceanchor
     *
     * @return boolean
     */
    public function getDayssincepriceanchor()
    {
        return $this->dayssincepriceanchor;
    }

    /**
     * Set the date
     *
     * @param string|\DateTime $date The date
     *
     * @return AvailableBreak
     */
    public function setDate($date)
    {
        if ($date instanceof \DateTime) {
            $this->date = $date;
        } else {
            $this->date = new \DateTime($date);
        }

        return $this;
    }

    /**
     * Sets the daysavailable
     *
     * @param integer $var The daysavailable
     *
     * @return AvailableDay
     */
    public function setDaysavailable($var)
    {
        $this->daysavailable = $var;

        return $this;
    }

    /**
     * Sets the isfromdate
     *
     * @param boolean $var The isfromdate
     *
     * @return AvailableDay
     */
    public function setIsfromdate($var)
    {
        $this->isfromdate = $var;

        return $this;
    }

    /**
     * Sets the istodate
     *
     * @param boolean $var The istodate
     *
     * @return AvailableDay
     */
    public function setIstodate($var)
    {
        $this->istodate = $var;

        return $this;
    }

    /**
     * Set the earliestbookingdate
     *
     * @param string|\DateTime $earliestbookingdate The earliestbookingdate
     *
     * @return AvailableBreak
     */
    public function setEarliestbookingdate($earliestbookingdate)
    {
        if ($earliestbookingdate instanceof \DateTime) {
            $this->earliestbookingdate = $earliestbookingdate;
        } else {
            $this->earliestbookingdate = new \DateTime($earliestbookingdate);
        }

        return $this;
    }

    /**
     * Sets the minimumholiday
     *
     * @param integer $var The minimumholiday
     *
     * @return AvailableDay
     */
    public function setMinimumholiday($var)
    {
        $this->minimumholiday = $var;

        return $this;
    }

    /**
     * Sets the maximumholiday
     *
     * @param integer $var The maximumholiday
     *
     * @return AvailableDay
     */
    public function setMaximumholiday($var)
    {
        $this->maximumholiday = $var;

        return $this;
    }

    /**
     * Sets the unlessholidayatleast
     *
     * @param integer $var Sets the unlessholidayatleast
     *
     * @return AvailableDay
     */
    public function setUnlessholidayatleast($var)
    {
        $this->unlessholidayatleast = $var;

        return $this;
    }

    /**
     * Sets the showonavailability
     *
     * @param boolean $var The showonavailability
     *
     * @return AvailableDay
     */
    public function setShowonavailability($var)
    {
        $this->showonavailability = $var;

        return $this;
    }

    /**
     * Sets the priceanchor
     *
     * @param boolean $var The the priceanchor
     *
     * @return AvailableDay
     */
    public function setPriceanchor($var)
    {
        $this->priceanchor = $var;

        return $this;
    }

    /**
     * Sets the days since priceanchor
     *
     * @param integer $var The days since priceanchor
     *
     * @return AvailableDay
     */
    public function setDayssincepriceanchor($var)
    {
        $this->dayssincepriceanchor = $var;

        return $this;
    }
}