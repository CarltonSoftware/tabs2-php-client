<?php

namespace tabs\apiclient\property\price;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PartySizePrice object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PartySizePrice setPrice(float $var) Sets the price
 */
class PartySizePrice extends Builder
{
    /**
     * Partysizepricing
     *
     * @var \tabs\apiclient\property\price\PartySizePricing
     */
    protected $partysizepricing;

    /**
     * Price
     *
     * @var float
     */
    protected $price = 0;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the partysizepricing
     *
     * @param stdclass|array|\tabs\apiclient\property\price\PartySizePricing $partysizepricing The Party size pricing
     *
     * @return PartySizePrice
     */
    public function setPartysizepricing($partysizepricing)
    {
        $this->partysizepricing = \tabs\apiclient\property\price\PartySizePricing::factory($partysizepricing);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'partysizepricingid' => $this->getPartysizepricing()->getId(),
            'price' => $this->getPrice(),
        );
    }

    /**
     * Returns the partysizepricing
     *
     * @return \tabs\apiclient\property\price\PartySizePricing
     */
    public function getPartysizepricing()
    {
        return $this->partysizepricing;
    }

    /**
     * Returns the price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}