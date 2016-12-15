<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\branding\MarketingBrand;

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
 * @method MarketingBrand getMarketingbrand() Returns the marketingbrand
 */
class PropertyMarketingBrand extends Builder
{
    /**
     * Marketingbrand
     *
     * @var MarketingBrand
     */
    protected $marketingbrand;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the marketingbrand
     *
     * @param stdclass|array|MarketingBrand $marketingbrand The Marketingbrand
     *
     * @return PropertyMarketingBrand
     */
    public function setMarketingbrand($marketingbrand)
    {
        $this->marketingbrand = \tabs\apiclient\branding\MarketingBrand::factory(
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