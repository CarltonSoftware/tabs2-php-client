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
 * @method string getPeriodfrom() Returns the periodfrom string
 * @method ConfirmedBookingPeriod setPeriodfrom(string $var) Sets the periodfrom
 * 
 * @method string getPeriod() Returns the period string
 * @method ConfirmedBookingPeriod setPeriod(string $var) Sets the period
 * 
 * @method string getPeriodto() Returns the periodto string
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
}