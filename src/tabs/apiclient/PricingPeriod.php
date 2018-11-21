<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PricingPeriod object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PricingPeriod setPricingperiod(string $var) Sets the pricingperiod
 * 
 * @method PricingPeriod setDays(integer $var) Sets the days
 * 
 * @method PricingPeriod setWeeks(integer $var) Sets the weeks
 * 
 * @method PricingPeriod setMonths(integer $var) Sets the months
 * 
 * @method PricingPeriod setSubperiod(string $var) Sets the subperiod
 */
class PricingPeriod extends Builder
{
    /**
     * Pricingperiod
     *
     * @var string
     */
    protected $pricingperiod;

    /**
     * Days
     *
     * @var integer
     */
    protected $days;

    /**
     * Weeks
     *
     * @var integer
     */
    protected $weeks;

    /**
     * Months
     *
     * @var integer
     */
    protected $months;

    /**
     * Subperiod
     *
     * @var string
     */
    protected $subperiod;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'pricingperiod' => $this->getPricingperiod(),
            'days' => $this->getDays(),
            'weeks' => $this->getWeeks(),
            'months' => $this->getMonths(),
            'subperiod' => $this->getSubperiod()
        );
    }

    /**
     * Returns the pricingperiod
     *
     * @return string
     */
    public function getPricingperiod()
    {
        return $this->pricingperiod;
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
     * Returns the weeks
     *
     * @return integer
     */
    public function getWeeks()
    {
        return $this->weeks;
    }

    /**
     * Returns the months
     *
     * @return integer
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * Returns the subperiod
     *
     * @return string
     */
    public function getSubperiod()
    {
        return $this->subperiod;
    }
}