<?php

/**
 * Tabs Rest API Price Type object
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
use tabs\apiclient\collection\core\PriceTypeBranding as PriceTypeBrandingCollection;

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
 * @method string    getPricetype()                  Returns the price type code
 * @method PriceType setPricetype(string $pricetype) Set the price type code
 *
 * @method string    getPricingperiod()               Returns the pricing period
 * @method PriceType setPricingperiod(string $period) Set the pricing period
 *
 * @method string    getDescription()                    Returns the description
 * @method PriceType setDescription($string description) Set the description
 *
 * @method integer   getPeriods()                 Returns the number of periods covered
 * @method PriceType setPeriods(integer $periods) Set the number of periods covered
 *
 * @method boolean   getAdditional()                  Returns the additional flag
 * @method PriceType setAddional(boolean $additional) Set the additional flag
 *
 * @method PriceTypeBrandingCollection getBrandings() Get the price type brandings
 */
class PriceType extends Builder
{
    /**
     * Price Type code
     *
     * @var string
     */
    protected $pricetype;

    /**
     * Pricing period
     *
     * @var string
     */
    protected $pricingperiod;

    /**
     * Description of period covered
     *
     * @var \DateTime
     */
    protected $description;

    /**
     * Number of periods covered
     *
     * @var integer
     */
    protected $periods = 1;

    /**
     * Whether number of periods is greater than the number of periods in the pricing period
     *
     * @var boolean
     */
    protected $additional = false;

    /*
     * The price type brandings
     *
     * @var PriceTypeBrandingCollection
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
        $this->brandings = new PriceTypeBrandingCollection();
        $this->brandings->setElementParent($this);
    }

    /**
     * Add a price type branding to this price type
     *
     * @param \tabs\apiclient\core\PriceTypeBranding $branding Price type branding object
     *
     * @return PriceType
     */
    public function addBranding(PriceTypeBranding &$branding)
    {
        $branding->setParent($this);
        $this->brandings->addElement($branding);

        return $this;
    }

    /**
     * Add some price type brandings to this price type
     *
     * @param \tabs\apiclient\core\PriceTypeBranding[] $brandings Array of price type branding objects
     *
     * @return PriceType
     */
    public function setBrandings(array $brandings)
    {
        foreach ($brandings as $item) {
            $branding = PriceTypeBranding::factory($item);
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
            'pricetype' => $this->getPricetype(),
            'pricingperiod' => $this->getPricingperiod(),
            'description' => $this->getDescription(),
            'periods' => $this->getPeriods(),
            'additional' => $this->getAdditional(),
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