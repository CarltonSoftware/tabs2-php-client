<?php

/**
 * Tabs Rest API Pricing Period object
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;

/**
 * Tabs Rest API Pricing Period object
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string getPricingperiod() Returns the pricingperiod
 * @method \tabs\apiclient\core\PricingPeriod setPricingperiod(string $var) Sets the pricingperiod
 * 
 * @method integer getDays() Returns the days
 * @method \tabs\apiclient\core\PricingPeriod setDays(integer $var) Sets the days
 * 
 * @method integer getWeeks() Returns the weeks
 * @method \tabs\apiclient\core\PricingPeriod setWeeks(integer $var) Sets the weeks
 * 
 * @method integer getMonths() Returns the months
 * @method \tabs\apiclient\core\PricingPeriod setMonths(integer $var) Sets the months
 * 
 * @method string getSubperiod() Returns the subperiod
 * @method \tabs\apiclient\core\PricingPeriod setSubperiod(string $var) Sets the subperiod
 */
class PricingPeriod extends Builder
{
    /**
     * Pricing Period
     *
     * @var string
     */
    protected $pricingperiod = '';

    /**
     * Number of days
     *
     * @var integer
     */
    protected $days = 0;

    /**
     * Number of weeks
     *
     * @var integer
     */
    protected $weeks = 0;

    /**
     * Number of months
     *
     * @var integer
     */
    protected $months = 0;

    /**
     * Subperiod
     *
     * @var string
     */
    protected $subperiod = '';

    // ------------------ Public Functions --------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'pricingperiod' => $this->getPricingperiod(),
        );
    }

    /**
     * String magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getPricingperiod();
    }
}