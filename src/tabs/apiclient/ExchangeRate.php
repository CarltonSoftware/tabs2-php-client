<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ExchangeRate object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ExchangeRate setUnitsperbaseunit(integer $var) Sets the unitsperbaseunit
 * @method ExchangeRate setCurrency(\tabs\apiclient\Currency $var) Sets the currency
 */
class ExchangeRate extends Builder
{
    /**
     * @var integer
     */
    protected $unitsperbaseunit;

    /**
     * @var \tabs\apiclient\Currency
     */
    protected $currency;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->currency = new \tabs\apiclient\Currency();
        parent::__construct($id);
    }

    /**
     * @return integer
     */
    public function getUnitsperbaseunit()
    {
        return $this->unitsperbaseunit;
    }

    /**
     * @return \tabs\apiclient\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getCreateUrl()
    {
        return 'rate';
    }
}