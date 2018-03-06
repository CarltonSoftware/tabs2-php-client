<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Owner Booking Type object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2018 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string           getName()            Returns the name
 * @method OwnerBookingType setName(string $var) Sets the name
 * 
 * @method string           getDescription()            Returns the description
 * @method OwnerBookingType setDescription(string $var) Sets the description
 *
 * @method boolean          getInactive()             Returns whether the owner type is inactive
 * @method OwnerBookingType setInactive(boolean $var) Sets whether the owner booking type is inactive
 */
class OwnerBookingType extends Builder
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
     * Inactive
     *
     * @var boolean
     */
    protected $inactive;

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'inactive' => $this->getInactive(),
        );
    }
}