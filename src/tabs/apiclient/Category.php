<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Category object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Category setCategory(string $var) Sets the category
 * 
 * @method Category setDescription(string $var) Sets the description
 * 
 * @method Category setBookingsminimum(integer $var) Sets the bookingsminimum
 * 
 * @method Category setBookingsmaximum(integer $var) Sets the bookingsmaximum
 * 
 * @method Category setAndor(string $var) Sets the andor
 * 
 * @method Category setBookingvaluemaximum(integer $var) Sets the bookingvaluemaximum
 * 
 * @method Category setBookingvalueminimum(integer $var) Sets the bookingvalueminimum
 * 
 * @method Category setPeriod(string $var) Sets the period
 * 
 * @method Category setPeriodstartdate(\DateTime $var) Sets the periodstartdate
 */
class Category extends Builder
{
    /**
     * Category
     *
     * @var string
     */
    protected $category;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Bookingsminimum
     *
     * @var integer
     */
    protected $bookingsminimum = 0;

    /**
     * Bookingsmaximum
     *
     * @var integer
     */
    protected $bookingsmaximum = 999;

    /**
     * Andor
     *
     * @var string
     */
    protected $andor = 'and';

    /**
     * Bookingvaluemaximum
     *
     * @var integer
     */
    protected $bookingvaluemaximum = 0;

    /**
     * Bookingvalueminimum
     *
     * @var integer
     */
    protected $bookingvalueminimum = 999999;

    /**
     * Period
     *
     * @var string
     */
    protected $period = '20 years';

    /**
     * Periodstartdate
     *
     * @var \DateTime
     */
    protected $periodstartdate;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->periodstartdate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'category' => $this->getCategory(),
            'description' => $this->getDescription(),
            'bookingsminimum' => $this->getBookingsminimum(),
            'bookingsmaximum' => $this->getBookingsmaximum(),
            'andor' => $this->getAndor(),
            'bookingvaluemaximum' => $this->getBookingvaluemaximum(),
            'bookingvalueminimum' => $this->getBookingvalueminimum(),
            'period' => $this->getPeriod(),
            'periodstartdate' => $this->getPeriodstartdate()->format('Y-m-d'),
        );
    }

    /**
     * Returns the category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the bookingsminimum
     *
     * @return integer
     */
    public function getBookingsminimum()
    {
        return $this->bookingsminimum;
    }

    /**
     * Returns the bookingsmaximum
     *
     * @return integer
     */
    public function getBookingsmaximum()
    {
        return $this->bookingsmaximum;
    }

    /**
     * Returns the andor
     *
     * @return string
     */
    public function getAndor()
    {
        return $this->andor;
    }

    /**
     * Returns the bookingvaluemaximum
     *
     * @return integer
     */
    public function getBookingvaluemaximum()
    {
        return $this->bookingvaluemaximum;
    }

    /**
     * Returns the bookingvalueminimum
     *
     * @return integer
     */
    public function getBookingvalueminimum()
    {
        return $this->bookingvalueminimum;
    }

    /**
     * Returns the period
     *
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Returns the periodstartdate
     *
     * @return \DateTime
     */
    public function getPeriodstartdate()
    {
        return $this->periodstartdate;
    }
}