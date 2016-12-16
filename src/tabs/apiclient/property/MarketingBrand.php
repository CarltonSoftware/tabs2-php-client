<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\property\Brochure;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API PropertyMarketingBrand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\MarketingBrand getMarketingbrand() Returns the marketingbrand
 */
class MarketingBrand extends Builder
{
    /**
     * Marketingbrand
     *
     * @var \tabs\apiclient\branding\MarketingBrand
     */
    protected $marketingbrand;
    
    /**
     * Property Brochure
     * 
     * @var Collection|Brochure[]
     */
    protected $brochures;

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->brochures = Collection::factory(
            'brochure',
            new Brochure(),
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the marketingbrand
     *
     * @param stdclass|array|\tabs\apiclient\MarketingBrand $marketingbrand The Marketingbrand
     *
     * @return PropertyMarketingBrand
     */
    public function setMarketingbrand($marketingbrand)
    {
        $this->marketingbrand = \tabs\apiclient\MarketingBrand::factory(
            $marketingbrand
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'marketingbrandid' => $this->getMarketingbrand()->getId()
        );
    }
}