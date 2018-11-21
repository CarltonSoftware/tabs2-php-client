<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ConfirmedBookingPeriod object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ConfirmedBookingPeriod setPeriodfrom(string $var) Sets the periodfrom
 * 
 * @method ConfirmedBookingPeriod setPeriod(string $var) Sets the period
 * 
 * @method ConfirmedBookingPeriod setPeriodto(string $var) Sets the periodto
 */
class ConfirmedBookingPeriod extends Builder
{
    /**
     * Periodfrom
     *
     * @var string
     */
    protected $periodfrom = '';

    /**
     * Period
     *
     * @var string
     */
    protected $period = '';

    /**
     * Periodto
     *
     * @var string
     */
    protected $periodto = '';

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * Returns the periodfrom string
     *
     * @return string
     */
    public function getPeriodfrom()
    {
        return $this->periodfrom;
    }

    /**
     * Returns the period string
     *
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Returns the periodto string
     *
     * @return string
     */
    public function getPeriodto()
    {
        return $this->periodto;
    }
}