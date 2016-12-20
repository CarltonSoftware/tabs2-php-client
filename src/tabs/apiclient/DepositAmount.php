<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Currency;
use tabs\apiclient\PricingPeriod;
use tabs\apiclient\DepositAmountType;
use tabs\apiclient\Property;
use tabs\apiclient\Branding;

/**
 * Tabs Rest API DepositAmount object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getType() Returns the type
 * @method DepositAmount setType(string $var) Sets the type
 * 
 * @method string getName() Returns the name
 * @method DepositAmount setName(string $var) Sets the name
 * 
 * @method string getDescription() Returns the description
 * @method DepositAmount setDescription(string $var) Sets the description
 * 
 * @method Currency getCurrency() Returns the currency
 * @method PricingPeriod getPricingperiod() Returns the pricingperiod
 * @method DepositAmountType getDepositamounttype() Returns the depositamounttype
 * @method float getAmount() Returns the amount
 * @method DepositAmount setAmount(float $var) Sets the amount
 * 
 * @method boolean getPlusincludedextras() Returns the plusincludedextras
 * @method DepositAmount setPlusincludedextras(boolean $var) Sets the plusincludedextras
 * 
 * @method boolean getPlusadditionalextras() Returns the plusadditionalextras
 * @method DepositAmount setPlusadditionalextras(boolean $var) Sets the plusadditionalextras
 * 
 * @method integer getDecimalplaces() Returns the decimalplaces
 * @method DepositAmount setDecimalplaces(integer $var) Sets the decimalplaces
 * 
 * @method Property getProperty() Returns the property
 * @method Branding getBranding() Returns the branding
 * 
 * @method \DateTime getFromdate() Returns the fromdate
 * @method DepositAmount setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method DepositAmount setTodate(\DateTime $var) Sets the todate
 * 
 * @method integer getMinimumamount() Returns the minimumamount
 * @method DepositAmount setMinimumamount(integer $var) Sets the minimumamount
 */
class DepositAmount extends Builder
{
    /**
     * Type
     *
     * @var string
     */
    protected $type;

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
     * Currency
     *
     * @var Currency
     */
    protected $currency;

    /**
     * Pricingperiod
     *
     * @var PricingPeriod
     */
    protected $pricingperiod;

    /**
     * Depositamounttype
     *
     * @var DepositAmountType
     */
    protected $depositamounttype;

    /**
     * Amount
     *
     * @var float
     */
    protected $amount;

    /**
     * Plusincludedextras
     *
     * @var boolean
     */
    protected $plusincludedextras;

    /**
     * Plusadditionalextras
     *
     * @var boolean
     */
    protected $plusadditionalextras;

    /**
     * Decimalplaces
     *
     * @var integer
     */
    protected $decimalplaces;

    /**
     * Property
     *
     * @var Property
     */
    protected $property;

    /**
     * Branding
     *
     * @var Branding
     */
    protected $branding;

    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;

    /**
     * Minimumamount
     *
     * @var integer
     */
    protected $minimumamount;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|Currency $currency The Currency
     *
     * @return DepositAmount
     */
    public function setCurrency($currency)
    {
        $this->currency = Currency::factory($currency);

        return $this;
    }

    /**
     * Set the pricingperiod
     *
     * @param stdclass|array|PricingPeriod $pricingperiod The Pricingperiod
     *
     * @return DepositAmount
     */
    public function setPricingperiod($pricingperiod)
    {
        $this->pricingperiod = PricingPeriod::factory($pricingperiod);

        return $this;
    }

    /**
     * Set the depositamounttype
     *
     * @param stdclass|array|DepositAmountType $depositamounttype The Depositamounttype
     *
     * @return DepositAmount
     */
    public function setDepositamounttype($depositamounttype)
    {
        $this->depositamounttype = DepositAmountType::factory($depositamounttype);

        return $this;
    }

    /**
     * Set the property
     *
     * @param stdclass|array|Property $property The Property
     *
     * @return DepositAmount
     */
    public function setProperty($property)
    {
        $this->property = Property::factory($property);

        return $this;
    }

    /**
     * Set the branding
     *
     * @param stdclass|array|Branding $branding The branding
     *
     * @return DepositAmount
     */
    public function setBranding($branding)
    {
        $this->branding = Branding::factory($branding);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'type' => $this->getType(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'currencyid' => $this->getCurrency()->getId(),
            'pricingperiod' => $this->getPricingperiod()->getPricingperiod(),
            'depositamounttype' => $this->getDepositamounttype()->getDepositamounttype(),
            'amount' => $this->getAmount(),
            'plusincludedextras' => $this->boolToStr($this->getPlusincludedextras()),
            'plusadditionalextras' => $this->boolToStr($this->getPlusadditionalextras()),
            'decimalplaces' => $this->getDecimalplaces(),
            'minimumamount' => $this->getMinimumamount(),
        );
        
        if ($this->getType() == 'Property') {
            $arr['propertyid'] = $this->getProperty()->getId();
        }
        
        if ($this->getType() == 'Branding') {
            $arr['brandingid'] = $this->getBranding()->getId();
        }
        
        if ($this->getType() != 'Booking') {
            $arr['fromdate'] = $this->getFromdate()->format('Y-m-d');
            $arr['todate'] = $this->getTodate()->format('Y-m-d');
        }
        
        return $arr;
    }
}