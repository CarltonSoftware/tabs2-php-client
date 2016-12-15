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

namespace tabs\apiclient\core\pricing;
use tabs\apiclient\core\pricing\PricingMethodBranding;
use tabs\apiclient\collection\core\pricing\PricingMethodBranding as PricingMethodBrandingCollection;

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
 * @method string getDescription()                      Returns the description of the pricing method
 * @method string getDescription(string $pricingmethod) Set the description of the pricing method
 *
 * @method PricingMethodBrandingCollection getBrandings() Returns the brandings of the pricing method
 */
class PricingMethod extends \tabs\apiclient\core\Builder
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

    /**
     * Brandings of the Pricing Method
     *
     * @var PricingMethodBrandingCollection
     */
    protected $brandings;

    // ------------------ Public Functions --------------------- //

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->brandings = new PricingMethodBrandingCollection();
        $this->brandings->setElementParent($this);
    }

    /**
     * Add a new branding to this pricing method
     *
     * @param PricingMethodBranding $branding Pricing method branding object
     *
     * @return PriceType
     */
    public function addBranding(PricingMethodBranding &$branding)
    {
        $branding->setParent($this);
        $this->getBrandings()->addElement($branding);

        return $this;
    }

    /**
     * Add some pricing method brandings to this pricing method
     *
     * @param PricingMethodBranding[] $brandings Array of pricing method branding objects
     *
     * @return PriceType
     */
    public function setBrandings(array $brandings)
    {
        foreach ($brandings as $item) {
            $branding = PricingMethodBranding::factory($item);
            $this->addBranding($branding);
        }

        return $this;
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
}