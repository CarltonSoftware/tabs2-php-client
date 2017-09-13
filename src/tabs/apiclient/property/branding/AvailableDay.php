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
 * @method \DateTime getDate() Returns the date
 * @method AvailableDay setDate(\DateTime $var) Sets the date
 * 
 * @method integer getDaysavailable() Returns the daysavailable
 * @method AvailableDay setDaysavailable(integer $var) Sets the daysavailable
 * 
 * @method boolean getIsfromdate() Returns the isfromdate
 * @method AvailableDay setIsfromdate(boolean $var) Sets the isfromdate
 * 
 * @method boolean getIstodate() Returns the istodate
 * @method AvailableDay setIstodate(boolean $var) Sets the istodate
 * 
 * @method \DateTime getEarliestbookingdate() Returns the earliestbookingdate
 * @method AvailableDay setEarliestbookingdate(\DateTime $var) Sets the earliestbookingdate
 * 
 * @method integer getMinimumholiday() Returns the minimumholiday
 * @method AvailableDay setMinimumholiday(integer $var) Sets the minimumholiday
 * 
 * @method integer getUnlessholidayatleast() Returns the unlessholidayatleast
 * @method AvailableDay setUnlessholidayatleast(integer $var) Sets the unlessholidayatleast
 * 
 * @method boolean getShowonavailability() Returns the showonavailability
 * @method AvailableDay setShowonavailability(boolean $var) Sets the showonavailability
 * 
 * @method boolean getPriceanchor() Returns the priceanchor
 * @method AvailableDay setPriceanchor(boolean $var) Sets the priceanchor
 * 
 * @method boolean getDayssincepriceanchor() Returns the days since priceanchor
 * @method AvailableDay setDayssincepriceanchor(boolean $var) Sets the days since priceanchor
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
            'unlessholidayatleast' => $this->getUnlessholidayatleast(),
            'showonavailability' => $this->boolToStr($this->getShowonavailability()),
            'priceanchor' => $this->boolToStr($this->getPriceanchor()),
            'dayssincepriceanchor' => $this->getDayssincepriceanchor()
        );
    }
}