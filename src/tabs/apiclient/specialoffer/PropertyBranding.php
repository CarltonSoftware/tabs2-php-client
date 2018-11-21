<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PropertyBranding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PropertyBranding setDescription(string $var) Sets the description
 * 
 */
class PropertyBranding extends Builder
{
    /**
     * Propertybranding
     *
     * @var \tabs\apiclient\property\Branding
     */
    protected $propertybranding;

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    // -------------------- Public Functions -------------------- //

    /**
     * Set the propertybranding
     *
     * @param stdclass|array|\tabs\apiclient\property\Branding $propertybranding The Propertybranding
     *
     * @return PropertyBranding
     */
    public function setPropertybranding($propertybranding)
    {
        // Fudge the response into a property property object
        if ($propertybranding instanceof \stdClass
            && property_exists($propertybranding, 'property')
        ) {
            $p = \tabs\apiclient\Property::factory($propertybranding->property);
            $propertyBranding = \tabs\apiclient\property\Branding::factory($propertybranding);
            $propertyBranding->setParent($p);
            $this->propertybranding = $propertyBranding;
        } else {
            $this->propertybranding = \tabs\apiclient\property\Branding::factory($propertybranding);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getPropertybranding()) {
            $arr['propertybrandingid'] = $this->getPropertybranding()->getId();
        }

        return $arr;
    }

    /**
     * Returns the propertybranding object
     *
     * @return \tabs\apiclient\property\Branding
     */
    public function getPropertybranding()
    {
        return $this->propertybranding;
    }

    /**
     * Returns the description string
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}