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
 * @method string getCategory() Returns the category
 * @method Category setCategory(string $var) Sets the category
 * 
 * @method string getDescription() Returns the description
 * @method Category setDescription(string $var) Sets the description
 * 
 * @method integer getBookingsminimum() Returns the bookingsminimum
 * @method Category setBookingsminimum(integer $var) Sets the bookingsminimum
 * 
 * @method integer getBookingsmaximum() Returns the bookingsmaximum
 * @method Category setBookingsmaximum(integer $var) Sets the bookingsmaximum
 * 
 * @method string getAndor() Returns the andor
 * @method Category setAndor(string $var) Sets the andor
 * 
 * @method integer getBookingvaluemaximum() Returns the bookingvaluemaximum
 * @method Category setBookingvaluemaximum(integer $var) Sets the bookingvaluemaximum
 * 
 * @method integer getBookingvalueminimum() Returns the bookingvalueminimum
 * @method Category setBookingvalueminimum(integer $var) Sets the bookingvalueminimum
 * 
 * @method string getPeriod() Returns the period
 * @method Category setPeriod(string $var) Sets the period
 * 
 * @method \DateTime getPeriodstartdate() Returns the periodstartdate
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
}