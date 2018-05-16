<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;

/**
 * Tabs Rest API BookingEnquiry object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getGuestype() Returns the guestype
 * @method BookingEnquiry setGuestype(string $var) Sets the guestype
 * 
 * @method \tabs\apiclient\property\Branding getPropertyBranding() Returns the property branding
 * 
 * @method \DateTime getFromdate() Returns the fromdate
 * @method BookingEnquiry setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method BookingEnquiry setTodate(\DateTime $var) Sets the todate
 * 
 * @method integer getAdults() Returns the adults
 * @method BookingEnquiry setAdults(integer $var) Sets the adults
 * 
 * @method integer getChildren() Returns the children
 * @method BookingEnquiry setChildren(integer $var) Sets the children
 * 
 * @method integer getInfants() Returns the infants
 * @method BookingEnquiry setInfants(integer $var) Sets the infants
 * 
 * @method integer getPets() Returns the pets
 * @method BookingEnquiry setPets(integer $var) Sets the pets
 * 
 * @method \tabs\apiclient\Currency getCurrency() Returns the currency
 * @method \tabs\apiclient\SalesChannel getSaleschannel() Returns the saleschannel
 * 
 * @method string|\tabs\apiclient\PricingPeriod getPricingperiod() Returns the pricingperiod
 * 
 * @method string getPromotionalcode() Returns the promotionalcode
 * @method BookingEnquiry setPromotionalcode(string $var) Sets the promotionalcode
 * 
 * @method boolean getCalculatebrochureprice() Returns the calculatebrochureprice
 * @method BookingEnquiry setCalculatebrochureprice(boolean $var) Sets the calculatebrochureprice
 * 
 * @method boolean getCalculateadditionalextras() Returns the calculateadditionalextras
 * @method BookingEnquiry setCalculateadditionalextras(boolean $var) Sets the calculateadditionalextras
 * 
 * @method boolean getCalculateincludedextras() Returns the calculateincludedextras
 * @method BookingEnquiry setCalculateincludedextras(boolean $var) Sets the calculateincludedextras
 * 
 * @method boolean getIncludedpartysizepricing() Returns the includedpartysizepricing
 * @method BookingEnquiry setIncludedpartysizepricing(boolean $var) Sets the includedpartysizepricing
 * 
 * @method boolean getIncludespecialoffers() Returns the includespecialoffers
 * @method BookingEnquiry setIncludespecialoffers(boolean $var) Sets the includespecialoffers
 * 
 * @method boolean getCalculatedeposit() Returns the calculatedeposit
 * @method BookingEnquiry setCalculatedeposit(boolean $var) Sets the calculatedeposit
 * 
 * @method integer getBrochurepricedecimalplaces() Returns the brochurepricedecimalplaces
 * @method BookingEnquiry setBrochurepricedecimalplaces(integer $var) Sets the brochurepricedecimalplaces
 * 
 * @method integer getBasicpricedecimalplaces() Returns the basicpricedecimalplaces
 * @method BookingEnquiry setBasicpricedecimalplaces(integer $var) Sets the basicpricedecimalplaces
 * 
 * @method \tabs\apiclient\Booking getCurrentbooking() Returns the currentbooking
 * 
 * @method boolean getBookingok() Returns the bookingok
 * @method BookingEnquiry setBookingok(boolean $var) Sets the bookingok
 * 
 * @method boolean getPartyok() Returns the partyok
 * @method BookingEnquiry setPartyok(boolean $var) Sets the partyok
 * 
 * @method boolean getPetsok() Returns the petsok
 * @method BookingEnquiry setPetsok(boolean $var) Sets the petsok
 * 
 * @method boolean getAvailable() Returns the available
 * @method BookingEnquiry setAvailable(boolean $var) Sets the available
 * 
 * @method boolean getChangedaysok() Returns the changedaysok
 * @method BookingEnquiry setChangedaysok(boolean $var) Sets the changedaysok
 * 
 * @method boolean getPriceok() Returns the priceok
 * @method BookingEnquiry setPriceok(boolean $var) Sets the priceok
 * 
 * @method boolean getWebbookingok() Returns the webbookingok
 * @method BookingEnquiry setWebbookingok(boolean $var) Sets the webbookingok
 * 
 * @method Property       getProperty() Returns the enquiry property
 * @method BookingEnquiry setProperty(Property $property) Set the property
 */
class BookingEnquiry extends Base
{
    /**
     * Guestype
     *
     * @var string
     */
    protected $guestype = 'Customer';

    /**
     * Property Branding
     *
     * @var \tabs\apiclient\property\Branding
     */
    protected $propertyBranding;

    /**
     * @var \tabs\apiclient\Property
     */
    protected $property;

    /**
     * Branding
     *
     * @var \tabs\apiclient\Branding
     */
    protected $branding;

    /**
     * Status
     *
     * @var \tabs\apiclient\Status
     */
    protected $status;

    /**
     * Booking ok
     *
     * @var boolean
     */
    protected $bookingok = false;

    /**
     * Party ok
     *
     * @var boolean
     */
    protected $partyok = false;

    /**
     * Pets ok
     *
     * @var boolean
     */
    protected $petsok = false;

    /**
     * Available
     *
     * @var boolean
     */
    protected $available = false;

    /**
     * Changedays ok
     *
     * @var boolean
     */
    protected $changedaysok = false;

    /**
     * Price ok
     *
     * @var boolean
     */
    protected $priceok = false;

    /**
     * Web Booking ok
     *
     * @var boolean
     */
    protected $webbookingok = false;

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
     * Adults
     *
     * @var integer
     */
    protected $adults;

    /**
     * Children
     *
     * @var integer
     */
    protected $children;

    /**
     * Infants
     *
     * @var integer
     */
    protected $infants;

    /**
     * Pets
     *
     * @var integer
     */
    protected $pets;

    /**
     * Currency
     *
     * @var \tabs\apiclient\Currency
     */
    protected $currency;

    /**
     * Saleschannel
     *
     * @var \tabs\apiclient\SalesChannel
     */
    protected $saleschannel;

    /**
     * Pricingperiod
     *
     * @var \tabs\apiclient\PricingPeriod
     */
    protected $pricingperiod = 'Week';

    /**
     * Promotionalcode
     *
     * @var string
     */
    protected $promotionalcode = '';

    /**
     * Calculatebrochureprice
     *
     * @var boolean
     */
    protected $calculatebrochureprice = true;

    /**
     * Calculateadditionalextras
     *
     * @var boolean
     */
    protected $calculateadditionalextras = true;

    /**
     * Calculateincludedextras
     *
     * @var boolean
     */
    protected $calculateincludedextras = true;

    /**
     * Includedpartysizepricing
     *
     * @var boolean
     */
    protected $includedpartysizepricing = true;

    /**
     * Includespecialoffers
     *
     * @var boolean
     */
    protected $includespecialoffers = true;

    /**
     * Calculatedeposit
     *
     * @var boolean
     */
    protected $calculatedeposit = true;

    /**
     * Brochurepricedecimalplaces
     *
     * @var integer
     */
    protected $brochurepricedecimalplaces = 0;

    /**
     * Basicpricedecimalplaces
     *
     * @var integer
     */
    protected $basicpricedecimalplaces = 0;

    /**
     * Currentbooking
     *
     * @var \tabs\apiclient\Booking
     */
    protected $currentbooking;
    
    /**
     * Booking enquiry errors
     * 
     * @var \tabs\apiclient\booking\Error[]
     */
    protected $errors;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->errors = StaticCollection::factory(
            '',
            new booking\Error
        );
        parent::__construct($id);
    }

    /**
     * Set the property
     *
     * @param stdclass|array|\tabs\apiclient\property\Branding $propertyBranding The Property branding
     *
     * @return BookingEnquiry
     */
    public function setPropertyBranding($propertyBranding)
    {
        $this->propertyBranding = \tabs\apiclient\property\Branding::factory(
            $propertyBranding
        );

        return $this;
    }

    /**
     * Set the branding
     *
     * @param stdclass|array|\tabs\apiclient\Branding $branding The Branding
     *
     * @return BookingEnquiry
     */
    public function setBranding($branding)
    {
        $this->branding = \tabs\apiclient\Branding::factory($branding);

        return $this;
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|\tabs\apiclient\Currency $currency The Currency
     *
     * @return BookingEnquiry
     */
    public function setCurrency($currency)
    {
        $this->currency = \tabs\apiclient\Currency::factory($currency);

        return $this;
    }

    /**
     * Set the saleschannel
     *
     * @param stdclass|array|\tabs\apiclient\SalesChannel $saleschannel The Saleschannel
     *
     * @return BookingEnquiry
     */
    public function setSaleschannel($saleschannel)
    {
        $this->saleschannel = \tabs\apiclient\SalesChannel::factory($saleschannel);

        return $this;
    }

    /**
     * Set the currentbooking
     *
     * @param stdclass|array|\tabs\apiclient\Booking $currentbooking The Currentbooking
     *
     * @return BookingEnquiry
     */
    public function setCurrentbooking($currentbooking)
    {
        $this->currentbooking = \tabs\apiclient\Booking::factory($currentbooking);

        return $this;
    }
    
    /**
     * Set the pricing period
     * 
     * @param stdclass|array|\tabs\apiclient\PricingPeriod $pricingperiod Pricing period
     * 
     * @return BookingEnquiry
     */
    public function setPricingperiod($pricingperiod)
    {
        $this->pricingperiod = \tabs\apiclient\PricingPeriod::factory($pricingperiod);
        
        return $this;
    }
    
    /**
     * Get the booking enquiry data
     * 
     * @return BookingEnquiry
     */
    public function get()
    {
        $json = self::getJson(
            \tabs\apiclient\client\Client::getClient()->get(
                'bookingenquiry',
                $this->toArray()
            )
        );
        self::setObjectProperties(
            $this,
            $json
        );
        
        $this->setResponsedata($json);
        
        // ReMap the fromdate/todate/adults etc from the price criteria
        if (property_exists($json, 'price') && property_exists($json->price, 'criteria')) {
            foreach (get_object_vars($json->price->criteria) as $key => $val) {
                $gfn = 'get' . ucfirst($key);
                $sfn = 'get' . ucfirst($key);
                if (method_exists($this, $gfn) && !$this->$gfn()) {
                    $this->$sfn($val);
                }
            }
        }
        
        $errors = $this->getDataFromResponse('price', 'bookings', 0, 'errors');
        if (is_array($errors)) {
            foreach ($errors as $error) {
                $this->errors->addElement($error);
            }
        }
        
        return $this;
    }
    
    /**
     * Return the additional extras price
     * 
     * @return integer
     */
    public function getAdditionalExtrasPrice()
    {
        return $this->_sumTotalsData('additionalextrasprice');
    }
    
    /**
     * Return the basic price
     * 
     * @return integer
     */
    public function getBasicPrice()
    {
        return $this->_sumTotalsData('basicprice');
    }
    
    /**
     * Return the brochure price
     * 
     * @return integer
     */
    public function getBrochurePrice()
    {
        return $this->_sumTotalsData('brochureprice');
    }
    
    /**
     * Return the change brochure price extras price
     * 
     * @return integer
     */
    public function getChangeBrochurePriceExtrasPrice()
    {
        return $this->_sumTotalsData('changebrochurepriceextrasprice');
    }
    
    /**
     * Return the included extras price
     * 
     * @return integer
     */
    public function getIncludedExtrasPrice()
    {
        return $this->_sumTotalsData('includedextrasprice');
    }
    
    /**
     * Return the owner price
     * 
     * @return integer
     */
    public function getOwnerPrice()
    {
        return $this->_sumTotalsData('ownerprice');
    }
    
    /**
     * Return the party size saving
     * 
     * @return integer
     */
    public function getPartySizeSaving()
    {
        return $this->_sumTotalsData('partysizesaving');
    }
    
    /**
     * Return the promotional code saving
     * 
     * @return integer
     */
    public function getPromotionCodeSaving()
    {
        return $this->_sumTotalsData('promotioncodesaving');
    }
    
    /**
     * Return the special offer saving
     * 
     * @return integer
     */
    public function getSpecialOfferSaving()
    {
        return $this->_sumTotalsData('specialoffersaving');
    }
    
    /**
     * Return the standard price
     * 
     * @return integer
     */
    public function getStandardPrice()
    {
        return $this->_sumTotalsData('standardprice');
    }
    
    /**
     * Return the total price
     * 
     * @return integer
     */
    public function getTotalPrice()
    {
        return $this->_sumTotalsData('totalprice');
    }
    
    /**
     * Return the standard price
     * 
     * @return integer
     */
    public function getSecurityDepositPrice()
    {
        return $this->_sumTotalsData('standardprice');
    }
    
    /**
     * Return an collection of security deposit objects
     * 
     * @return StaticCollection|BookingEnquirySecurityDeposit[]
     */
    public function getSecurityDeposits()
    {
        $arr = $this->_getPriceObjects(function($booking) {
            return $booking->securitydeposit;
        });
        $col = new StaticCollection();
        $col->setElementClass(new BookingEnquirySecurityDeposit())
            ->setElements($arr)
            ->setTotal(count($arr));
        
        return $col;
    }
    
    /**
     * Return an collection of security deposit objects
     * 
     * @return StaticCollection|BookingEnquiryDeposit[]
     */
    public function getDeposits()
    {
        $arr = $this->_getPriceObjects(function($booking) {
            return $booking->deposit;
        });
        $col = new StaticCollection();
        $col->setElementClass(new BookingEnquiryDeposit())
            ->setElements($arr)
            ->setTotal(count($arr));
        
        return $col;
    }
    
    /**
     * Sum an integer element returned from a callable element
     * 
     * @param string $index Totals index
     * 
     * @return integer
     */
    private function _sumTotalsData($index)
    {
        return $this->_sumBookingsData(function($booking) use ($index) {
            return $booking->pricing->total->$index;
        });
    }
    
    /**
     * Sum an integer element returned from a callable element
     * 
     * @param callable $callable Callable function to use
     * 
     * @return integer
     */
    private function _sumBookingsData($callable)
    {
        $total = 0;        
        foreach ($this->_getPriceObjects($callable) as $element) {
            $total += $element;
        }
        
        return $total;
    }
    
    /**
     * Return an array of elements from the price response using a callable function
     * 
     * @param callable $callable Callable function to use
     * 
     * @return array
     */
    private function _getPriceObjects($callable)
    {
        $objs = array();
        if (!$this->getResponsedata()->price->bookings 
            || count($this->getResponsedata()->price->bookings) == 0
        ) {
            return $objs;
        }
        
        foreach ($this->getResponsedata()->price->bookings as $booking) {
            $objs[] = call_user_func($callable, $booking);
        }
        
        return $objs;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        $arr['guestype'] = $this->getGuestype();
        $arr['fromdate'] = $this->getFromdate()->format('Y-m-d');
        $arr['todate'] = $this->getTodate()->format('Y-m-d');
        $arr['calculatebrochureprice'] = $this->boolToStr($this->getCalculatebrochureprice());
        $arr['calculateadditionalextras'] = $this->boolToStr($this->getCalculateadditionalextras());
        $arr['calculateincludedextras'] = $this->boolToStr($this->getCalculateincludedextras());
        $arr['includedpartysizepricing'] = $this->boolToStr($this->getIncludedpartysizepricing());
        $arr['includespecialoffers'] = $this->boolToStr($this->getIncludespecialoffers());
        $arr['calculatedeposit'] = $this->boolToStr($this->getCalculatedeposit());
        $arr['brochurepricedecimalplaces'] = $this->getBrochurepricedecimalplaces();
        $arr['basicpricedecimalplaces'] = $this->getBasicpricedecimalplaces();
        
        if ($this->getPricingperiod() instanceof core\PricingPeriod) {
            $arr['pricingperiod'] = $this->getPricingperiod()->getPricingperiod();
        } else {
            $arr['pricingperiod'] = $this->getPricingperiod();
        }
        
        if ($this->getPropertyBranding()) {
            $arr['propertybrandingid'] = $this->getPropertyBranding()->getId();
        }
        
        if ($this->getCurrency()) {
            $arr['currencycode'] = $this->getCurrency()->getCode();
        }
        
        if ($this->getSaleschannel()) {
            $arr['saleschannel'] = $this->getSaleschannel()->getSaleschannel();
        }
        
        if ($this->getCurrentbooking()) {
            $arr['currentbookingid'] = $this->getCurrentbooking()->getId();
        }
        
        return $arr;
    }
}