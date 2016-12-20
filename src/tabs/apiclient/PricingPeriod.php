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
 * @method string getPricingperiod() Returns the pricingperiod
 * @method PricingPeriod setPricingperiod(string $var) Sets the pricingperiod
 * 
 * @method integer getDays() Returns the days
 * @method PricingPeriod setDays(integer $var) Sets the days
 * 
 * @method integer getWeeks() Returns the weeks
 * @method PricingPeriod setWeeks(integer $var) Sets the weeks
 * 
 * @method integer getMonths() Returns the months
 * @method PricingPeriod setMonths(integer $var) Sets the months
 * 
 * @method string getSubperiod() Returns the subperiod
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
}