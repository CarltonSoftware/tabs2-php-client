<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API MarketingBrand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class MarketingBrand extends Builder
{
    /**
     * Branding
     *
     * @var \tabs\apiclient\MarketingBrand
     */
    protected $marketingbrand;


    // -------------------- Public Functions -------------------- //

    /**
     * Set the branding
     *
     * @param stdclass|array|\tabs\apiclient\MarketingBrand $marketingbrand The Marketing Brand
     *
     * @return MarketingBrand
     */
    public function setMarketingBrand($marketingbrand)
    {
        $this->marketingbrand = \tabs\apiclient\MarketingBrand::factory($marketingbrand);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getMarketingBrang()) {
            $arr['marketingbrandid'] = $this->getMarketingBrand()->getId();
        }

        return $arr;
    }

    /**
     * Returns the branding object
     *
     * @return \tabs\apiclient\MarketingBrand
     */
    public function getMarketingBrand()
    {
        return $this->marketingbrand;
    }

}