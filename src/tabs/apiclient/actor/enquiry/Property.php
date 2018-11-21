<?php

namespace tabs\apiclient\actor\enquiry;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Property object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class Property extends Builder
{
    /**
     * Property
     *
     * @var \tabs\apiclient\Property
     */
    protected $property;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the property
     *
     * @param stdclass|array|\tabs\apiclient\Property $property The Property
     *
     * @return Property
     */
    public function setProperty($property)
    {
        $this->property = \tabs\apiclient\Property::factory($property);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'propertyid' => $this->getProperty()->getId(),
        );
    }

    /**
     * Returns the property \tabs\apiclient\Property
     *
     * @return \tabs\apiclient\Property
     */
    public function getProperty()
    {
        return $this->property;
    }
}