<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Ownerpaymentterms object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Ownerpaymentterms setName(string $var) Sets the name
 * 
 * @method Ownerpaymentterms setDescription(string $var) Sets the description
 * 
 * @method Ownerpaymentterms setOndeposit(boolean $var) Sets the ondeposit
 * 
 * @method Ownerpaymentterms setOninterim(boolean $var) Sets the oninterim
 * 
 * @method Ownerpaymentterms setOnbalance(boolean $var) Sets the onbalance
 * 
 * @method Ownerpaymentterms setAmountperperiod(float $var) Sets the amountperperiod
 * 
 * @method Ownerpaymentterms setPercentageofbasic(integer $var) Sets the percentageofbasic
 * 
 * @method Ownerpaymentterms setOwnerpaid(string $var) Sets the ownerpaid
 * 
 */
class OwnerPaymentTerms extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Ondeposit
     *
     * @var boolean
     */
    protected $ondeposit;

    /**
     * Oninterim
     *
     * @var boolean
     */
    protected $oninterim;

    /**
     * Onbalance
     *
     * @var boolean
     */
    protected $onbalance;

    /**
     * Amountperperiod
     *
     * @var float
     */
    protected $amountperperiod;

    /**
     * Percentageofbasic
     *
     * @var integer
     */
    protected $percentageofbasic;

    /**
     * Ownerpaid
     *
     * @var string
     */
    protected $ownerpaid;

    /**
     * Currency
     *
     * @var \tabs\apiclient\Currency
     */
    protected $currency;

    /**
     * Extras
     *
     * @var Collection|Extra[]
     */
    protected $extras;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->extras = Collection::factory('extra', new \tabs\apiclient\ownerpaymentterms\Extra, $this);
        
        parent::__construct($id);
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|\tabs\apiclient\Currency $currency The Currency
     *
     * @return Ownerpaymentterms
     */
    public function setCurrency($currency)
    {
        $this->currency = \tabs\apiclient\Currency::factory($currency);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'ondeposit' => $this->getOndeposit(),
            'oninterim' => $this->getOninterim(),
            'onbalance' => $this->getOnbalance(),
            'amountperperiod' => $this->getAmountperperiod(),
            'percentageofbasic' => $this->getPercentageofbasic(),
            'ownerpaid' => $this->getOwnerpaid(),
            'currencyid' => $this->getCurrency()->getId()
        );
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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

    /**
     * Returns the ondeposit
     *
     * @return boolean
     */
    public function getOndeposit()
    {
        return $this->ondeposit;
    }

    /**
     * Returns the oninterim
     *
     * @return boolean
     */
    public function getOninterim()
    {
        return $this->oninterim;
    }

    /**
     * Returns the onbalance
     *
     * @return boolean
     */
    public function getOnbalance()
    {
        return $this->onbalance;
    }

    /**
     * Returns the amountperperiod
     *
     * @return float
     */
    public function getAmountperperiod()
    {
        return $this->amountperperiod;
    }

    /**
     * Returns the percentageofbasic
     *
     * @return integer
     */
    public function getPercentageofbasic()
    {
        return $this->percentageofbasic;
    }

    /**
     * Returns the ownerpaid
     *
     * @return string
     */
    public function getOwnerpaid()
    {
        return $this->ownerpaid;
    }

    /**
     * Returns the currency
     *
     * @return \tabs\apiclient\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Returns the extras
     *
     * @return Collection|Extra[]
     */
    public function getExtras()
    {
        return $this->extras;
    }
}