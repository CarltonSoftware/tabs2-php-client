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
 * @method string getName() Returns the name
 * @method PropertyLink setName(string $var) Sets the name
 * 
 * @method Property getDetails() Returns the details
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
}