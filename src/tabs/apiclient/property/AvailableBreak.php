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
 * @method \DateTime getFromdate() Returns the from date
 * @method AvailableBreak setFromdate(\DateTime $var) Sets the from date
 *
 * @method \DateTime getTodate() Returns the to date
 * @method AvailableBreak setTodate(\DateTime $var) Sets the to date
 * 
 * @method integer getDays() Returns the days
 * @method AvailableBreak setDays(integer $var) Sets the days
 * 
 * @method integer getPrice() Returns the price
 * @method AvailableBreak setPrice(integer $var) Sets the price
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
}