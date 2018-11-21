<?php

namespace tabs\apiclient\extra\branding;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Configuration object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Configuration setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method Configuration setTodate(\DateTime $var) Sets the todate
 * 
 * @method Configuration setCompulsory(boolean $var) Sets the compulsory
 * 
 * @method Configuration setIncluded(boolean $var) Sets the included
 * 
 * @method Configuration setDecimalplaces(integer $var) Sets the decimalplaces
 * 
 * @method Configuration setPayagency(boolean $var) Sets the payagency
 * 
 * @method Configuration setPayowner(boolean $var) Sets the payowner
 * 
 * @method Configuration setVisibletoowner(boolean $var) Sets the visibletoowner
 * 
 * @method Configuration setVisibletocustomer(boolean $var) Sets the visibletocustomer
 * 
 * @method Configuration setCustomerselectable(boolean $var) Sets the customerselectable
 * 
 * @method Configuration setPriceoverrideallowed(boolean $var) Sets the priceoverrideallowed
 * 
 * @method Configuration setDefaultquantity(integer $var) Sets the defaultquantity
 * 
 * @method Configuration setQuantityoverrideallowed(boolean $var) Sets the quantityoverrideallowed
 * 
 * @method Configuration setMaximumquantity(integer $var) Sets the maximumquantity
 * 
 * @method Configuration setUsepropertyprimarybranding(boolean $var) Sets the usepropertyprimarybranding
 * 
 * @method Configuration setChangesbrochureprice(boolean $var) Sets the changesbrochureprice
 * 
 */
class Configuration extends Builder
{
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
     * Compulsory
     *
     * @var boolean
     */
    protected $compulsory = false;

    /**
     * Included
     *
     * @var boolean
     */
    protected $included = false;

    /**
     * Decimalplaces
     *
     * @var integer
     */
    protected $decimalplaces = 2;

    /**
     * Payagency
     *
     * @var boolean
     */
    protected $payagency = false;

    /**
     * Payowner
     *
     * @var boolean
     */
    protected $payowner = false;

    /**
     * Visibletoowner
     *
     * @var boolean
     */
    protected $visibletoowner = false;

    /**
     * Visibletocustomer
     *
     * @var boolean
     */
    protected $visibletocustomer = false;

    /**
     * Vatband
     *
     * @var \tabs\apiclient\Vatband
     */
    protected $vatband;

    /**
     * Customerselectable
     *
     * @var boolean
     */
    protected $customerselectable = false;

    /**
     * Priceoverrideallowed
     *
     * @var boolean
     */
    protected $priceoverrideallowed = false;

    /**
     * Defaultquantity
     *
     * @var integer
     */
    protected $defaultquantity = 0;

    /**
     * Quantityoverrideallowed
     *
     * @var boolean
     */
    protected $quantityoverrideallowed = false;

    /**
     * Maximumquantity
     *
     * @var integer
     */
    protected $maximumquantity = 1;

    /**
     * Usepropertyprimarybranding
     *
     * @var boolean
     */
    protected $usepropertyprimarybranding = false;

    /**
     * Changesbrochureprice
     *
     * @var boolean
     */
    protected $changesbrochureprice = false;

    /**
     * Property
     *
     * @var \tabs\apiclient\Property
     */
    protected $property;

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
     * Set the vatband
     *
     * @param stdclass|array|\tabs\apiclient\Vatband $vatband The Vatband
     *
     * @return Configuration
     */
    public function setVatband($vatband)
    {
        $this->vatband = \tabs\apiclient\Vatband::factory($vatband);

        return $this;
    }

    /**
     * Set the property
     *
     * @param stdclass|array|\tabs\apiclient\Property $property The Property
     *
     * @return Configuration
     */
    public function setProperty($property)
    {
        $this->property = \tabs\apiclient\Property::factory($property);

        return $this;
    }

	/**
	 * @inheritDoc
	 */
	public function toArray()
	{
            $arr = array(
                'fromdate' => $this->getFromdate()->format('Y-m-d'),
                'todate' => $this->getTodate()->format('Y-m-d'),
                'compulsory' => $this->boolToStr($this->getCompulsory()),
                'included' => $this->boolToStr($this->getIncluded()),
                'decimalplaces' => $this->getDecimalplaces(),
                'payagency' => $this->boolToStr($this->getPayagency()),
                'payowner' => $this->boolToStr($this->getPayowner()),
                'visibletoowner' => $this->boolToStr($this->getVisibletoowner()),
                'visibletocustomer' => $this->boolToStr($this->getVisibletocustomer()),
                'vatband' => $this->getVatband()->getVatband(),
                'customerselectable' => $this->boolToStr($this->getCustomerselectable()),
                'priceoverrideallowed' => $this->boolToStr($this->getPriceoverrideallowed()),
                'defaultquantity' => $this->getDefaultquantity(),
                'quantityoverrideallowed' => $this->boolToStr($this->getQuantityoverrideallowed()),
                'maximumquantity' => $this->getMaximumquantity(),
                'usepropertyprimarybranding' => $this->boolToStr($this->getUsepropertyprimarybranding()),
                'changesbrochureprice' => $this->boolToStr($this->getChangesbrochureprice())
            );
            
            if ($this->getProperty()) {
                $arr['propertyid'] = $this->getProperty()->getId();
            }
            
            return $arr;
	}

    /**
     * Returns the fromdate
     *
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the todate
     *
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Returns the compulsory
     *
     * @return boolean
     */
    public function getCompulsory()
    {
        return $this->compulsory;
    }

    /**
     * Returns the included
     *
     * @return boolean
     */
    public function getIncluded()
    {
        return $this->included;
    }

    /**
     * Returns the decimalplaces
     *
     * @return integer
     */
    public function getDecimalplaces()
    {
        return $this->decimalplaces;
    }

    /**
     * Returns the payagency
     *
     * @return boolean
     */
    public function getPayagency()
    {
        return $this->payagency;
    }

    /**
     * Returns the payowner
     *
     * @return boolean
     */
    public function getPayowner()
    {
        return $this->payowner;
    }

    /**
     * Returns the visibletoowner
     *
     * @return boolean
     */
    public function getVisibletoowner()
    {
        return $this->visibletoowner;
    }

    /**
     * Returns the visibletocustomer
     *
     * @return boolean
     */
    public function getVisibletocustomer()
    {
        return $this->visibletocustomer;
    }

    /**
     * Returns the vatband
     *
     * @return \tabs\apiclient\Vatband
     */
    public function getVatband()
    {
        return $this->vatband;
    }

    /**
     * Returns the customerselectable
     *
     * @return boolean
     */
    public function getCustomerselectable()
    {
        return $this->customerselectable;
    }

    /**
     * Returns the priceoverrideallowed
     *
     * @return boolean
     */
    public function getPriceoverrideallowed()
    {
        return $this->priceoverrideallowed;
    }

    /**
     * Returns the defaultquantity
     *
     * @return integer
     */
    public function getDefaultquantity()
    {
        return $this->defaultquantity;
    }

    /**
     * Returns the quantityoverrideallowed
     *
     * @return boolean
     */
    public function getQuantityoverrideallowed()
    {
        return $this->quantityoverrideallowed;
    }

    /**
     * Returns the maximumquantity
     *
     * @return integer
     */
    public function getMaximumquantity()
    {
        return $this->maximumquantity;
    }

    /**
     * Returns the usepropertyprimarybranding
     *
     * @return boolean
     */
    public function getUsepropertyprimarybranding()
    {
        return $this->usepropertyprimarybranding;
    }

    /**
     * Returns the changesbrochureprice
     *
     * @return boolean
     */
    public function getChangesbrochureprice()
    {
        return $this->changesbrochureprice;
    }

    /**
     * Returns the property
     *
     * @return \tabs\apiclient\Property
     */
    public function getProperty()
    {
        return $this->property;
    }
}