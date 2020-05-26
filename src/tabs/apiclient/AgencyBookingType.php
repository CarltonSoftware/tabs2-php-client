<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API AgencyBookingType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method AgencyBookingType setName(string $var) Sets the name
 * @method AgencyBookingType setDescription(string $var) Sets the description
 */
class AgencyBookingType extends Builder
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

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
}