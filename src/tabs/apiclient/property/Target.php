<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Target object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Target setYear(integer $var) Sets the year
 * 
 * @method Target setDaysbooked(integer $var) Sets the daysbooked
 */
class Target extends Builder
{
    /**
     * Year
     *
     * @var integer
     */
    protected $year;

    /**
     * Daysbooked
     *
     * @var integer
     */
    protected $daysbooked;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'year' => $this->getYear(),
            'daysbooked' => $this->getDaysbooked(),
        );
    }

    /**
     * Returns the year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Returns the daysbooked
     *
     * @return integer
     */
    public function getDaysbooked()
    {
        return $this->daysbooked;
    }
}