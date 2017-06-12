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
 * @method \DateTime getPaymentdatetime() Returns the paymentdatetime
 * @method Payment setPaymentdatetime(\DateTime $var) Sets the paymentdatetime
 * 
 * @method string getReference() Returns the reference
 * @method Payment setReference(string $var) Sets the reference
 * 
 * @method \tabs\apiclient\PaymentMethod getMethod() Returns the method
 * @method float getAmount() Returns the amount
 * @method Payment setAmount(float $var) Sets the amount
 * 
 * @method float getRefunded() Returns the refunded
 * @method Payment setRefunded(float $var) Sets the refunded
 * 
 * @method float getUnrefunded() Returns the unrefunded
 * @method Payment setUnrefunded(float $var) Sets the unrefunded
 * 
 * @method \tabs\apiclient\Currency getCurrency() Returns the currency
 * @method integer getUnitsperbaseunit() Returns the unitsperbaseunit
 * @method Payment setUnitsperbaseunit(integer $var) Sets the unitsperbaseunit
 * 
 * @method float getBasecurrencyamount() Returns the basecurrencyamount
 * @method Payment setBasecurrencyamount(float $var) Sets the basecurrencyamount
 * 
 * @method \tabs\apiclient\Actor getMadeby() Returns the madeby
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
}