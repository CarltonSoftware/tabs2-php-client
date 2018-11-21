<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Vatband;

/**
 * Tabs Rest API Service object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Service setName(string $var) Sets the name
 * 
 * @method Service setDescription(string $var) Sets the description
 * 
 * @method Service setDonotmodify(boolean $var) Sets the donotmodify
 * 
 * @method Service setDatetouse(string $var) Sets the datetouse
 * 
 * @method Service setCustomerbookings(boolean $var) Sets the customerbookings
 * 
 * @method Service setOwnerbookings(boolean $var) Sets the ownerbookings
 * 
 */
class Service extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Donotmodify
     *
     * @var boolean
     */
    protected $donotmodify;

    /**
     * Vatband
     *
     * @var Vatband
     */
    protected $vatband;

    /**
     * Datetouse
     *
     * @var string
     */
    protected $datetouse;

    /**
     * Customerbookings
     *
     * @var boolean
     */
    protected $customerbookings;

    /**
     * Ownerbookings
     *
     * @var boolean
     */
    protected $ownerbookings;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the vatband
     *
     * @param stdclass|array|Vatband $vatband The Vatband
     *
     * @return Service
     */
    public function setVatband($vatband)
    {
        $this->vatband = Vatband::factory($vatband);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'donotmodify' => $this->boolToStr($this->getDonotmodify()),
            'vatbandid' => $this->getVatband()->getId(),
            'datetouse' => $this->getDatetouse(),
            'customerbookings' => $this->boolToStr($this->getCustomerbookings()),
            'ownerbookings' => $this->boolToStr($this->getOwnerbookings()),
        );
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the donotmodify
     *
     * @return boolean
     */
    public function getDonotmodify()
    {
        return $this->donotmodify;
    }

    /**
     * Returns the vatband
     *
     * @return Vatband
     */
    public function getVatband()
    {
        return $this->vatband;
    }

    /**
     * Returns the datetouse
     *
     * @return string
     */
    public function getDatetouse()
    {
        return $this->datetouse;
    }

    /**
     * Returns the customerbookings
     *
     * @return boolean
     */
    public function getCustomerbookings()
    {
        return $this->customerbookings;
    }

    /**
     * Returns the ownerbookings
     *
     * @return boolean
     */
    public function getOwnerbookings()
    {
        return $this->ownerbookings;
    }
}