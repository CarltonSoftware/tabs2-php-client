<?php

/**
 * Tabs Rest API Pricing Method object
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

namespace tabs\apiclient\core;
use tabs\apiclient\brand\Branding;
use tabs\apiclient\collection\core\PricingMethodBranding as PricingMethodBrandingCollection;

/**
 * Tabs Rest API Price Type object
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getPricingmethod()                      Returns the short name of the pricing method
 * @method string getPricingmethod(string $pricingmethod) Set the short name of the  pricing method
 *
 * @method string getDescription()                      Returns the short name of the pricing method
 * @method string getDescription(string $pricingmethod) Set the short name of the  pricing method
 */
class PricingMethod extends Builder
{
    /**
     * Short name of the Pricing Method
     *
     * @var string
     */
    protected $pricingmethod;

    /**
     * Description of the Pricing Method
     *
     * @var string
     */
    protected $description;

    // ------------------ Public Functions --------------------- //

    /**
     * Add a new branding to this Pricing Method
     *
     * @param Branding $branding Branding object
     *
     * @return PriceType
     */
    public function addBranding(Branding &$branding)
    {
        $branding->setParent($this);
        $this->getBrandings()->addElement($branding);

        return $this;
    }

    /**
     * Get the all the brandings for the pricing method
     *
     * @return PricingMethodBrandingCollection
     */
    public function getBrandings()
    {
        return $this->_getCollection(
            '\\tabs\\apiclient\\collection\\core\\PricingMethodBranding'
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'pricingmethod' => $this->getPricingmethod(),
            'description' => $this->getDescription(),
        );
    }

    /**
     * String magic method
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getDescription();
    }

    // ------------------------- Private Functions -------------------------- //
    
    /**
     * Return a new collection type and instantiate if needed
     *
     * @param string $class Class string
     *
     * @return \tabs\apiclient\collection\Collection
     */
    private function _getCollection($class)
    {
        if (!isset($this->collections[$class])) {
            $this->collections[$class] = new $class();
            $this->collections[$class]->setElementParent($this);
        }
        
        return $this->collections[$class];
    }
}