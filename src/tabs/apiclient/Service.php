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
 * @method string getName() Returns the name
 * @method Service setName(string $var) Sets the name
 * 
 * @method string getDescription() Returns the description
 * @method Service setDescription(string $var) Sets the description
 * 
 * @method boolean getDonotmodify() Returns the donotmodify
 * @method Service setDonotmodify(boolean $var) Sets the donotmodify
 * 
 * @method Vatband getVatband() Returns the vatband
 * @method string getDatetouse() Returns the datetouse
 * @method Service setDatetouse(string $var) Sets the datetouse
 * 
 * @method boolean getCustomerbookings() Returns the customerbookings
 * @method Service setCustomerbookings(boolean $var) Sets the customerbookings
 * 
 * @method boolean getOwnerbookings() Returns the ownerbookings
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
}