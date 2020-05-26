<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ExchangeRateIssueType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ExchangeRateIssueType setExchangerateissuetype(string $var) Sets the exchangerateissuetype
 * @method ExchangeRateIssueType setDescription(string $var) Sets the description
 */
class ExchangeRateIssueType extends Builder
{
    /**
     * @var string
     */
    protected $exchangerateissuetype;

    /**
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        return $arr;
    }

    /**
     * @return string
     */
    public function getExchangerateissuetype()
    {
        return $this->exchangerateissuetype;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}