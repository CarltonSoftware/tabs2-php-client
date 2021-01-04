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
     * Bookingbookedfromdate
     *
     * @var \DateTime
     *
     *
     */

     protected $bookingbookedfromdate;

    /**
     * Bookingbookedtodate
     *
     */

     protected $bookingbookedtodate;

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
                'bookingbookedfromdate' => $this->getBookingbookedfromdate()->format('Y-m-d'),
                'bookingbookedtodate'=> $this->getBookingbookedtodate()->format('Y-m-d'),
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
     * Returns the bookingbookedfromdate
     *
     * @return \DateTime
     */
    public function getBookingbookedfromdate()
    {
        return $this->bookingbookedfromdate;
    }

    /**
     * Returns the bookingbookedtodate
     *
     * @return \DateTime
     */
    public function getBookingbookedtodate()
    {
        return $this->bookingbookedtodate;
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


    /**
     * Set the id
     *
     * @param integer $id The id
     *
     * @return Configuration
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the fromdate
     *
     * @param date $fromdate The fromdate
     *
     * @return Configuration
     */
    public function setFromdate($fromdate)
    {
        if (!$fromdate instanceof \DateTime) {
            $this->fromdate = new \DateTime($fromdate);
        } else {
            $this->fromdate = $fromdate;
        }

        return $this;
    }

    /**
     * Set the todate
     *
     * @param date $todate The todate
     *
     * @return Configuration
     */
    public function setTodate($todate)
    {
        if (!$todate instanceof \DateTime) {
            $this->todate = new \DateTime($todate);
        } else {
            $this->todate = $todate;
        }

        return $this;
    }

    /**
     * Set the bookingbookedfromdate
     *
     * @param date $bookingbookedfromdate The bookingbookedfromdate
     *
     * @return Configuration
     */
    public function setBookingbookedfromdate($bookingbookedfromdate)
    {
        if (!$bookingbookedfromdate instanceof \DateTime) {
            $this->bookingbookedfromdate = new \DateTime($bookingbookedfromdate);
        } else {
            $this->bookingbookedfromdate = $bookingbookedfromdate;
        }

        return $this;
    }

    /**
     * Set the bookingbookedtodate
     *
     * @param date $bookingbookedtodate The bookingbookedtodate
     *
     * @return Configuration
     */
    public function setBookingbookedtodate($bookingbookedtodate)
    {
        if (!$bookingbookedtodate instanceof \DateTime) {
            $this->bookingbookedtodate = new \DateTime($bookingbookedtodate);
        } else {
            $this->bookingbookedtodate = $bookingbookedtodate;
        }

        return $this;
    }

    /**
     * Set the compulsory
     *
     * @param boolean $compulsory The compulsory
     *
     * @return Configuration
     */
    public function setCompulsory($compulsory)
    {
        $this->compulsory = $compulsory;

        return $this;
    }

    /**
     * Set the compulsoryontransfer
     *
     * @param boolean $compulsoryontransfer The compulsoryontransfer
     *
     * @return Configuration
     */
    public function setCompulsoryontransfer($compulsoryontransfer)
    {
        $this->compulsoryontransfer = $compulsoryontransfer;

        return $this;
    }

    /**
     * Set the included
     *
     * @param boolean $included The included
     *
     * @return Configuration
     */
    public function setIncluded($included)
    {
        $this->included = $included;

        return $this;
    }

    /**
     * Set the decimalplaces
     *
     * @param integer $decimalplaces The decimalplaces
     *
     * @return Configuration
     */
    public function setDecimalplaces($decimalplaces)
    {
        $this->decimalplaces = $decimalplaces;

        return $this;
    }

    /**
     * Set the payagency
     *
     * @param boolean $payagency The payagency
     *
     * @return Configuration
     */
    public function setPayagency($payagency)
    {
        $this->payagency = $payagency;

        return $this;
    }

    /**
     * Set the payowner
     *
     * @param boolean $payowner The payowner
     *
     * @return Configuration
     */
    public function setPayowner($payowner)
    {
        $this->payowner = $payowner;

        return $this;
    }

    /**
     * Set the visibletoowner
     *
     * @param boolean $visibletoowner The visibletoowner
     *
     * @return Configuration
     */
    public function setVisibletoowner($visibletoowner)
    {
        $this->visibletoowner = $visibletoowner;

        return $this;
    }

    /**
     * Set the visibletocustomer
     *
     * @param boolean $visibletocustomer The visibletocustomer
     *
     * @return Configuration
     */
    public function setVisibletocustomer($visibletocustomer)
    {
        $this->visibletocustomer = $visibletocustomer;

        return $this;
    }

    /**
     * Set the customerselectable
     *
     * @param boolean $customerselectable The customerselectable
     *
     * @return Configuration
     */
    public function setCustomerselectable($customerselectable)
    {
        $this->customerselectable = $customerselectable;

        return $this;
    }

    /**
     * Set the priceoverrideallowed
     *
     * @param boolean $priceoverrideallowed The priceoverrideallowed
     *
     * @return Configuration
     */
    public function setPriceoverrideallowed($priceoverrideallowed)
    {
        $this->priceoverrideallowed = $priceoverrideallowed;

        return $this;
    }

    /**
     * Set the defaultquantity
     *
     * @param integer $defaultquantity The defaultquantity
     *
     * @return Configuration
     */
    public function setDefaultquantity($defaultquantity)
    {
        $this->defaultquantity = $defaultquantity;

        return $this;
    }

    /**
     * Set the quantityoverrideallowed
     *
     * @param boolean $quantityoverrideallowed The quantityoverrideallowed
     *
     * @return Configuration
     */
    public function setQuantityoverrideallowed($quantityoverrideallowed)
    {
        $this->quantityoverrideallowed = $quantityoverrideallowed;

        return $this;
    }

    /**
     * Set the maximumquantity
     *
     * @param integer $maximumquantity The maximumquantity
     *
     * @return Configuration
     */
    public function setMaximumquantity($maximumquantity)
    {
        $this->maximumquantity = $maximumquantity;

        return $this;
    }

    /**
     * Set the usepropertyprimarybranding
     *
     * @param boolean $usepropertyprimarybranding The usepropertyprimarybranding
     *
     * @return Configuration
     */
    public function setUsepropertyprimarybranding($usepropertyprimarybranding)
    {
        $this->usepropertyprimarybranding = $usepropertyprimarybranding;

        return $this;
    }

    /**
     * Set the changesbrochureprice
     *
     * @param boolean $changesbrochureprice The changesbrochureprice
     *
     * @return Configuration
     */
    public function setChangesbrochureprice($changesbrochureprice)
    {
        $this->changesbrochureprice = $changesbrochureprice;

        return $this;
    }

    /**
     * Set the commissionpercentage
     *
     * @param string $commissionpercentage The commissionpercentage
     *
     * @return Configuration
     */
    public function setCommissionpercentage($commissionpercentage)
    {
        $this->commissionpercentage = $commissionpercentage;

        return $this;
    }

    /**
     * Set the keeponbookingcancellation
     *
     * @param boolean $keeponbookingcancellation The keeponbookingcancellation
     *
     * @return Configuration
     */
    public function setKeeponbookingcancellation($keeponbookingcancellation)
    {
        $this->keeponbookingcancellation = $keeponbookingcancellation;

        return $this;
    }

    /**
     * Set the customerpaymentfirstperiod
     *
     * @param boolean $customerpaymentfirstperiod The customerpaymentfirstperiod
     *
     * @return Configuration
     */
    public function setCustomerpaymentfirstperiod($customerpaymentfirstperiod)
    {
        $this->customerpaymentfirstperiod = $customerpaymentfirstperiod;

        return $this;
    }

    /**
     * Set the customerpaymentlastperiod
     *
     * @param boolean $customerpaymentlastperiod The customerpaymentlastperiod
     *
     * @return Configuration
     */
    public function setCustomerpaymentlastperiod($customerpaymentlastperiod)
    {
        $this->customerpaymentlastperiod = $customerpaymentlastperiod;

        return $this;
    }

    /**
     * Set the bookingreasonrequired
     *
     * @param boolean $bookingreasonrequired The bookingreasonrequired
     *
     * @return Configuration
     */
    public function setBookingreasonrequired($bookingreasonrequired)
    {
        $this->bookingreasonrequired = $bookingreasonrequired;

        return $this;
    }

    /**
     * Set the type
     *
     * @param string $type The type
     *
     * @return Configuration
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}