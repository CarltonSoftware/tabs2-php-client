<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;
use tabs\apiclient\Property;

/**
 * Tabs Rest API PropertyLink object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PropertyLink setName(string $var) Sets the name
 * 
 */
class PropertyLink extends Base
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Details
     *
     * @var Property
     */
    protected $details;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the details
     *
     * @param stdclass|array|Property $details The Details
     *
     * @return PropertyLink
     */
    public function setDetails($details)
    {
        $this->details = Property::factory($details);

        return $this;
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
     * Returns the details
     *
     * @return Property
     */
    public function getDetails()
    {
        return $this->details;
    }
}