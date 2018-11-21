<?php

namespace tabs\apiclient\extra\branding\pricing;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API RangeElement object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method RangeElement setLowvalue(integer $var) Sets the lowvalue
 * 
 * @method RangeElement setHighvalue(integer $var) Sets the highvalue
 * 
 * @method RangeElement setPrice(integer $var) Sets the price
 * 
 */
class RangeElement extends Builder
{
    /**
     * Lowvalue
     *
     * @var integer
     */
    protected $lowvalue;

    /**
     * Highvalue
     *
     * @var integer
     */
    protected $highvalue;

    /**
     * Price
     *
     * @var integer
     */
    protected $price;

    /**
     * Prices
     *
     * @var Collection|PriceType[]
     */
    protected $prices;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->prices = Collection::factory(
            'pricetype',
            new PriceType(),
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'lowvalue' => $this->getLowvalue(),
            'highvalue' => $this->getHighvalue(),
            'price' => $this->getPrice()
        );
    }

    /**
     * Returns the lowvalue
     *
     * @return integer
     */
    public function getLowvalue()
    {
        return $this->lowvalue;
    }

    /**
     * Returns the highvalue
     *
     * @return integer
     */
    public function getHighvalue()
    {
        return $this->highvalue;
    }

    /**
     * Returns the price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the prices
     *
     * @return Collection|PriceType[]
     */
    public function getPrices()
    {
        return $this->prices;
    }
}