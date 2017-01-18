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
 * @method \DateTime getFromdate() Returns the fromdate
 * @method Configuration setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method Configuration setTodate(\DateTime $var) Sets the todate
 * 
 * @method boolean getCompulsory() Returns the compulsory
 * @method Configuration setCompulsory(boolean $var) Sets the compulsory
 * 
 * @method boolean getIncluded() Returns the included
 * @method Configuration setIncluded(boolean $var) Sets the included
 * 
 * @method integer getDecimalplaces() Returns the decimalplaces
 * @method Configuration setDecimalplaces(integer $var) Sets the decimalplaces
 * 
 * @method boolean getPayagency() Returns the payagency
 * @method Configuration setPayagency(boolean $var) Sets the payagency
 * 
 * @method boolean getPayowner() Returns the payowner
 * @method Configuration setPayowner(boolean $var) Sets the payowner
 * 
 * @method boolean getVisibletoowner() Returns the visibletoowner
 * @method Configuration setVisibletoowner(boolean $var) Sets the visibletoowner
 * 
 * @method boolean getVisibletocustomer() Returns the visibletocustomer
 * @method Configuration setVisibletocustomer(boolean $var) Sets the visibletocustomer
 * 
 * @method \tabs\apiclient\Vatband getVatband() Returns the vatband
 * @method boolean getCustomerselectable() Returns the customerselectable
 * @method Configuration setCustomerselectable(boolean $var) Sets the customerselectable
 * 
 * @method boolean getPriceoverrideallowed() Returns the priceoverrideallowed
 * @method Configuration setPriceoverrideallowed(boolean $var) Sets the priceoverrideallowed
 * 
 * @method integer getDefaultquantity() Returns the defaultquantity
 * @method Configuration setDefaultquantity(integer $var) Sets the defaultquantity
 * 
 * @method boolean getQuantityoverrideallowed() Returns the quantityoverrideallowed
 * @method Configuration setQuantityoverrideallowed(boolean $var) Sets the quantityoverrideallowed
 * 
 * @method integer getMaximumquantity() Returns the maximumquantity
 * @method Configuration setMaximumquantity(integer $var) Sets the maximumquantity
 * 
 * @method boolean getUsepropertyprimarybranding() Returns the usepropertyprimarybranding
 * @method Configuration setUsepropertyprimarybranding(boolean $var) Sets the usepropertyprimarybranding
 * 
 * @method boolean getChangesbrochureprice() Returns the changesbrochureprice
 * @method Configuration setChangesbrochureprice(boolean $var) Sets the changesbrochureprice
 * 
 * @method \tabs\apiclient\Property getProperty() Returns the property
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
}