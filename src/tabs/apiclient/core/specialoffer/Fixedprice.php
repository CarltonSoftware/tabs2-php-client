<?php

/**
 * Tabs Rest API Special offer object.
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

namespace tabs\apiclient\core\specialoffer;
use tabs\apiclient\core\PricingPeriod;
use tabs\apiclient\collection\core\BookingPeriod as BookingPeriodCollection;

/**
 * Tabs Rest API Special offer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method float        getFixedprice()           Returns the price
 * @method Specialoffer setFixedprice(float $var) Sets the price
 */
class Fixedprice extends Currency
{
    /**
     * Numerical amount of special offer
     * 
     * @var float
     */
    protected $fixedprice = 0;
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $array = parent::toArray();
        $array['type'] = 'Fixed';
        $array['fixedprice'] = $this->getFixedprice();
        return $array;
    }
}