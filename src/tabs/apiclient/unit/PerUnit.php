<?php

namespace tabs\apiclient\unit;

use tabs\apiclient\Builder;
use tabs\apiclient\Unit;

/**
 * Tabs Rest API PerUnit object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PerUnit setMultiplier(integer $var) Sets the multiplier
 * 
 */
class PerUnit extends Builder
{
    /**
     * Tounit
     *
     * @var Unit
     */
    protected $tounit;

    /**
     * Multiplier
     *
     * @var integer
     */
    protected $multiplier;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the tounit
     *
     * @param stdclass|array|Unit $tounit The Tounit
     *
     * @return PerUnit
     */
    public function setTounit($tounit)
    {
        $this->tounit = Unit::factory($tounit);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'tounitid' => $this->getTounit()->getId(),
            'multiplier' => $this->getMultiplier(),
        );
    }

    /**
     * Returns the tounit
     *
     * @return Unit
     */
    public function getTounit()
    {
        return $this->tounit;
    }

    /**
     * Returns the multiplier
     *
     * @return integer
     */
    public function getMultiplier()
    {
        return $this->multiplier;
    }
}