<?php

/**
 * Tabs Rest API Unit object.
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

/**
 * Tabs Rest API Booking period object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method HolidayPeriod setDonotplit(boolean $bool) Set the do not split flag
 * @method boolean       getDonotplit()              Get the do not split flag
 */
class HolidayPeriod extends BookingPeriod
{
    /**
     * Do not split bool
     * 
     * @var boolean
     */
    protected $donotsplit = false;

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            parent::toArray(),
            array(
                'donotsplit' => $this->boolToStr($this->donotsplit)
            )
        );
    }
}