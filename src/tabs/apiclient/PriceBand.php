<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PriceBand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PriceBand setPriceband(string $var) Sets the band
 * 
 * @method PriceType setDescription(string $var) Sets the description
 */
class PriceBand extends Builder
{
    /**
     * @var string
     */
    protected $priceband;

    /**
     * @var string
     */
    protected $description;

    /**
     * Returns the band
     *
     * @return string
     */
    public function getPriceband()
    {
        return $this->priceband;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}