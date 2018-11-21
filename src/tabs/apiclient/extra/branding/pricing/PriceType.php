<?php

namespace tabs\apiclient\extra\branding\pricing;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PriceType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PriceType setPrice(float $var) Sets the price
 * 
 */
class PriceType extends Builder
{
    /**
     * Pricetype
     *
     * @var \tabs\apiclient\PriceType
     */
    protected $pricetype;

    /**
     * Price
     *
     * @var float
     */
    protected $price;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the pricetype
     *
     * @param stdclass|array|\tabs\apiclient\PriceType $pricetype The Pricetype
     *
     * @return PriceType
     */
    public function setPricetype($pricetype)
    {
        $this->pricetype = \tabs\apiclient\PriceType::factory($pricetype);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'pricetypeid' => $this->getPricetype()->getId(),
            'price' => $this->getPrice(),
        );
    }

    /**
     * Returns the pricetype
     *
     * @return \tabs\apiclient\PriceType
     */
    public function getPricetype()
    {
        return $this->pricetype;
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