<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ExchangeRateIssue object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ExchangeRateIssue setType(\tabs\apiclient\ExchangeRateIssueType $var) Sets the exchangerateissuetype
 * @method ExchangeRateIssue setCurrency(\tabs\apiclient\Currency $var) Sets the currency
 * @method ExchangeRateIssue setIssuenumber(string $var) Sets the issuenumber
 * @method ExchangeRateIssue setDescription(string $var) Sets the description
 * @method ExchangeRateIssue setFromdate(\DateTime $var) Sets the fromdate
 * @method ExchangeRateIssue setTodate(\DateTime $var) Sets the todate
 * @method ExchangeRateIssue setExchangerates(Collection|\tabs\apiclient\ExchangeRate[] $var) Sets the exchangerates
 */
class ExchangeRateIssue extends Builder
{
    /**
     * @var \tabs\apiclient\ExchangeRateIssueType
     */
    protected $type;

    /**
     * @var \tabs\apiclient\Currency
     */
    protected $currency;

    /**
     * @var string
     */
    protected $issuenumber;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * @var \DateTime
     */
    protected $todate;

    /**
     * @var Collection|\tabs\apiclient\ExchangeRate[]
     */
    protected $exchangerates;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->type = new \tabs\apiclient\ExchangeRateIssueType();
        $this->currency = new \tabs\apiclient\Currency();
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->exchangerates = Collection::factory(
            'rate',
            new \tabs\apiclient\ExchangeRate,
            $this
        );
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        return $arr;
    }

    /**
     * @return \tabs\apiclient\ExchangeRateIssueType
     */
    public function getType()
    {
        return $this->type;
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
    public function getIssuenumber()
    {
        return $this->issuenumber;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * @return Collection|\tabs\apiclient\ExchangeRate[]
     */
    public function getExchangerates()
    {
        return $this->exchangerates;
    }
}