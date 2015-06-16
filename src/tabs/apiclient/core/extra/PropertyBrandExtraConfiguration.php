<?php

/**
 * Tabs Rest API Property Extra brand configuration object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core\extra;
use \tabs\apiclient\property\Property;

/**
 * Tabs Rest API Property Extra brand configuration object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Property getProperty() Return the property mapped to this class.
 */
class PropertyBrandExtraConfiguration extends Configuration
{
    /**
     * Property to add extra configuration to
     * 
     * @var \tabs\apiclient\property\Property
     */
    protected $property;
    
    /**
     * Set the property for this configuration
     * 
     * @param Property|string $property Property object or id
     * 
     * @return \tabs\apiclient\core\extra\PropertyBrandExtraConfiguration
     */
    public function setProperty($property)
    {
        if (is_string($property)) {
            $this->property = Property::get($property);
        } else {
            $this->property = $property;
        }
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            parent::toArray(),
            array(
                'property' => $this->getProperty()->getId()
            )
        );
    }
}