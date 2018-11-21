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
 * @method BookingEnquiry setGuestype(string $var) Sets the guestype
 * 
 * 
 * @method BookingEnquiry setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method BookingEnquiry setTodate(\DateTime $var) Sets the todate
 * 
 * @method BookingEnquiry setAdults(integer $var) Sets the adults
 * 
 * @method BookingEnquiry setChildren(integer $var) Sets the children
 * 
 * @method BookingEnquiry setInfants(integer $var) Sets the infants
 * 
 * @method BookingEnquiry setPets(integer $var) Sets the pets
 * 
 * 
 * 
 * @method BookingEnquiry setPromotionalcode(string $var) Sets the promotionalcode
 * 
 * @method BookingEnquiry setCalculatebrochureprice(boolean $var) Sets the calculatebrochureprice
 * 
 * @method BookingEnquiry setCalculateadditionalextras(boolean $var) Sets the calculateadditionalextras
 * 
 * @method BookingEnquiry setCalculateincludedextras(boolean $var) Sets the calculateincludedextras
 * 
 * @method BookingEnquiry setIncludedpartysizepricing(boolean $var) Sets the includedpartysizepricing
 * 
 * @method BookingEnquiry setIncludespecialoffers(boolean $var) Sets the includespecialoffers
 * 
 * @method BookingEnquiry setCalculatedeposit(boolean $var) Sets the calculatedeposit
 * 
 * @method BookingEnquiry setBrochurepricedecimalplaces(integer $var) Sets the brochurepricedecimalplaces
 * 
 * @method BookingEnquiry setBasicpricedecimalplaces(integer $var) Sets the basicpricedecimalplaces
 * 
 * 
 * @method BookingEnquiry setBookingok(boolean $var) Sets the bookingok
 * 
 * @method BookingEnquiry setPartyok(boolean $var) Sets the partyok
 * 
 * @method BookingEnquiry setPetsok(boolean $var) Sets the petsok
 * 
 * @method BookingEnquiry setAvailable(boolean $var) Sets the available
 * 
 * @method BookingEnquiry setChangedaysok(boolean $var) Sets the changedaysok
 * 
 * @method BookingEnquiry setPriceok(boolean $var) Sets the priceok
 * 
 * @method BookingEnquiry setWebbookingok(boolean $var) Sets the webbookingok
 * 
 * 
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
     * Set the property
     *
     * @param stdclass|array|\tabs\apiclient\Property $property The Property
     *
     * @return BookingEnquiry
     */
    public function setProperty($property)
    {
        $this->property = \tabs\apiclient\Property::factory(
            $property
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
     * Get the number of nights
     * 
     * @return integer
     */
    public function getNights()
    {
        return (int) $this->fromdate->diff($this->todate)->format('%a');
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
        } else {
            if ($this->getProperty()) {
                $arr['propertyid'] = $this->getProperty()->getId();
            }
            if ($this->getBranding()) {
                $arr['brandingid'] = $this->getBranding()->getId();
            }
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

    /**
     * Returns the guestype
     *
     * @return string
     */
    public function getGuestype()
    {
        return $this->guestype;
    }

    /**
     * Returns the property branding
     *
     * @return \tabs\apiclient\property\Branding
     */
    public function getPropertyBranding()
    {
        return $this->propertybranding;
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
     * Returns the adults
     *
     * @return integer
     */
    public function getAdults()
    {
        return $this->adults;
    }

    /**
     * Returns the children
     *
     * @return integer
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Returns the infants
     *
     * @return integer
     */
    public function getInfants()
    {
        return $this->infants;
    }

    /**
     * Returns the pets
     *
     * @return integer
     */
    public function getPets()
    {
        return $this->pets;
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
     * Returns the saleschannel
     *
     * @return \tabs\apiclient\SalesChannel
     */
    public function getSaleschannel()
    {
        return $this->saleschannel;
    }

    /**
     * Returns the pricingperiod
     *
     * @return string|\tabs\apiclient\PricingPeriod
     */
    public function getPricingperiod()
    {
        return $this->pricingperiod;
    }

    /**
     * Returns the promotionalcode
     *
     * @return string
     */
    public function getPromotionalcode()
    {
        return $this->promotionalcode;
    }

    /**
     * Returns the calculatebrochureprice
     *
     * @return boolean
     */
    public function getCalculatebrochureprice()
    {
        return $this->calculatebrochureprice;
    }

    /**
     * Returns the calculateadditionalextras
     *
     * @return boolean
     */
    public function getCalculateadditionalextras()
    {
        return $this->calculateadditionalextras;
    }

    /**
     * Returns the calculateincludedextras
     *
     * @return boolean
     */
    public function getCalculateincludedextras()
    {
        return $this->calculateincludedextras;
    }

    /**
     * Returns the includedpartysizepricing
     *
     * @return boolean
     */
    public function getIncludedpartysizepricing()
    {
        return $this->includedpartysizepricing;
    }

    /**
     * Returns the includespecialoffers
     *
     * @return boolean
     */
    public function getIncludespecialoffers()
    {
        return $this->includespecialoffers;
    }

    /**
     * Returns the calculatedeposit
     *
     * @return boolean
     */
    public function getCalculatedeposit()
    {
        return $this->calculatedeposit;
    }

    /**
     * Returns the brochurepricedecimalplaces
     *
     * @return integer
     */
    public function getBrochurepricedecimalplaces()
    {
        return $this->brochurepricedecimalplaces;
    }

    /**
     * Returns the basicpricedecimalplaces
     *
     * @return integer
     */
    public function getBasicpricedecimalplaces()
    {
        return $this->basicpricedecimalplaces;
    }

    /**
     * Returns the currentbooking
     *
     * @return \tabs\apiclient\Booking
     */
    public function getCurrentbooking()
    {
        return $this->currentbooking;
    }

    /**
     * Returns the bookingok
     *
     * @return boolean
     */
    public function getBookingok()
    {
        return $this->bookingok;
    }

    /**
     * Returns the partyok
     *
     * @return boolean
     */
    public function getPartyok()
    {
        return $this->partyok;
    }

    /**
     * Returns the petsok
     *
     * @return boolean
     */
    public function getPetsok()
    {
        return $this->petsok;
    }

    /**
     * Returns the available
     *
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Returns the changedaysok
     *
     * @return boolean
     */
    public function getChangedaysok()
    {
        return $this->changedaysok;
    }

    /**
     * Returns the priceok
     *
     * @return boolean
     */
    public function getPriceok()
    {
        return $this->priceok;
    }

    /**
     * Returns the webbookingok
     *
     * @return boolean
     */
    public function getWebbookingok()
    {
        return $this->webbookingok;
    }

    /**
     * Returns the enquiry property
     *
     * @return Property
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Returns the enquiry branding
     *
     * @return Branding
     */
    public function getBranding()
    {
        return $this->branding;
    }
}