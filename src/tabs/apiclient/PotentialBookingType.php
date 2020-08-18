<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PotentialBookingType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PotentialBookingType setName(string $var) Sets the name
 * @method PotentialBookingType setDescription(string $var) Sets the description
 * @method PotentialBookingType setAffectsavailability(boolean $var) Sets the affectsavailability
 * @method PotentialBookingType setExpirydays(integer $var) Sets the expirydays
 * @method PotentialBookingType setExpiryhours(integer $var) Sets the expiryhours
 * @method PotentialBookingType setExpiryminutes(integer $var) Sets the expiryminutes
 * @method PotentialBookingType setAutoexpire(boolean $var) Sets the autoexpire
 * @method PotentialBookingType setIgnorepricingandchangedays(boolean $var) Sets the ignorepricingandchangedays
 */
class PotentialBookingType extends Builder
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var boolean
     */
    protected $affectsavailability;

    /**
     * @var integer
     */
    protected $expirydays;

    /**
     * @var integer
     */
    protected $expiryhours;

    /**
     * @var integer
     */
    protected $expiryminutes;

    /**
     * @var boolean
     */
    protected $autoexpire;

    /**
     * @var boolean
     */
    protected $ignorepricingandchangedays;

    // -------------------- Public Functions -------------------- //

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return boolean
     */
    public function getAffectsavailability()
    {
        return $this->affectsavailability;
    }

    /**
     * @return integer
     */
    public function getExpirydays()
    {
        return $this->expirydays;
    }

    /**
     * @return integer
     */
    public function getExpiryhours()
    {
        return $this->expiryhours;
    }

    /**
     * @return integer
     */
    public function getExpiryminutes()
    {
        return $this->expiryminutes;
    }

    /**
     * @return boolean
     */
    public function getAutoexpire()
    {
        return $this->autoexpire;
    }

    /**
     * @return boolean
     */
    public function getIgnorepricingandchangedays()
    {
        return $this->ignorepricingandchangedays;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return integer
     */
    public function totalExpiryminutes()
    {
        return ($this->expirydays * 1440) + ($this->expiryhours * 60) + $this->expiryminutes;
    }
}