<?php

/**
 * Tabs Rest API Start Day object
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

namespace tabs\apiclient\core\pricing;

/**
 * Tabs Rest API Start Day object
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method int       getDayssincechangeday()              Returns the number of days since a changeday
 * @method PriceType setDayssincechangeday(integer $days) Set the number of days since a changeday
 */
class Startday extends \tabs\apiclient\core\Builder
{
    /**
     * Number of days since changeday
     *
     * @var integer
     */
    protected $dayssincechangeday;

    // ------------------ Public Functions --------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'dayssincechangeday' => $this->getDayssincechangeday(),
        );
    }

    /**
     * String magic method
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s days since changeday', $this->getDayssincechangeday());
    }
}