<?php

namespace tabs\apiclient\actor;


use tabs\apiclient\Builder;

/**
 * Tabs Rest API Payment object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Payment setPaymentdatetime(\DateTime $var) Sets the paymentdatetime
 * 
 * @method Payment setReference(string $var) Sets the reference
 * 
 * @method Payment setAmount(float $var) Sets the amount
 * 
 * @method Payment setRefunded(float $var) Sets the refunded
 * 
 * @method Payment setUnrefunded(float $var) Sets the unrefunded
 * 
 * @method Payment setUnitsperbaseunit(integer $var) Sets the unitsperbaseunit
 * 
 * @method Payment setBasecurrencyamount(float $var) Sets the basecurrencyamount
 * 
 */
class Payment extends Builder
{
    /**
     * Paymentdatetime
     *
     * @var \DateTime
     */
    protected $paymentdatetime;

    /**
     * Reference
     *
     * @var string
     */
    protected $reference;

    /**
     * Method
     *
     * @var \tabs\apiclient\PaymentMethod
     */
    protected $method;

    /**
     * Amount
     *
     * @var float
     */
    protected $amount;

    /**
     * Refunded
     *
     * @var float
     */
    protected $refunded;

    /**
     * Unrefunded
     *
     * @var float
     */
    protected $unrefunded;

    /**
     * Currency
     *
     * @var \tabs\apiclient\Currency
     */
    protected $currency;

    /**
     * Unitsperbaseunit
     *
     * @var integer
     */
    protected $unitsperbaseunit;

    /**
     * Basecurrencyamount
     *
     * @var float
     */
    protected $basecurrencyamount;

    /**
     * Madeby
     *
     * @var \tabs\apiclient\Actor
     */
    protected $madeby;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->paymentdatetime = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the method
     *
     * @param stdclass|array|\tabs\apiclient\PaymentMethod $method The Method
     *
     * @return Payment
     */
    public function setMethod($method)
    {
        $this->method = \tabs\apiclient\PaymentMethod::factory($method);

        return $this;
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|\tabs\apiclient\Currency $currency The Currency
     *
     * @return Payment
     */
    public function setCurrency($currency)
    {
        $this->currency = \tabs\apiclient\Currency::factory($currency);

        return $this;
    }

    /**
     * Set the madeby
     *
     * @param stdclass|array|\tabs\apiclient\TabsUser $madeby The Madeby
     *
     * @return Payment
     */
    public function setMadeby($madeby)
    {
        $this->madeby = \tabs\apiclient\TabsUser::factory($madeby);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'paymentdatetime' => $this->getPaymentdatetime()->format('Y-m-d H:i:s'),
            'reference' => $this->getReference(),
            'amount' => $this->getAmount()
        );
        
        if ($this->getMethod()) {
            $arr['paymentmethodid'] = $this->getMethod()->getId();
        }
        
        if ($this->getCurrency()) {
            $arr['currencyid'] = $this->getCurrency()->getId();
        }
        
        if (!$this->getMadeby() && $this->getParent()) {
            $arr['madebyactorid'] = $this->getParent()->getId();
        }
        
        if ($this->getMadeby() && $this->getMadeby()->getId()) {
            $arr['madebyactorid'] = $this->getMadeby()->getId();
        }
        
        return $arr;
    }

    /**
     * Returns the paymentdatetime
     *
     * @return \DateTime
     */
    public function getPaymentdatetime()
    {
        return $this->paymentdatetime;
    }

    /**
     * Returns the reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Returns the method
     *
     * @return \tabs\apiclient\PaymentMethod
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Returns the amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the refunded
     *
     * @return float
     */
    public function getRefunded()
    {
        return $this->refunded;
    }

    /**
     * Returns the unrefunded
     *
     * @return float
     */
    public function getUnrefunded()
    {
        return $this->unrefunded;
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
     * Returns the unitsperbaseunit
     *
     * @return integer
     */
    public function getUnitsperbaseunit()
    {
        return $this->unitsperbaseunit;
    }

    /**
     * Returns the basecurrencyamount
     *
     * @return float
     */
    public function getBasecurrencyamount()
    {
        return $this->basecurrencyamount;
    }

    /**
     * Returns the madeby
     *
     * @return \tabs\apiclient\Actor
     */
    public function getMadeby()
    {
        return $this->madeby;
    }
}