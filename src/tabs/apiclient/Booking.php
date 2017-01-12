<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\PropertyLink;
use tabs\apiclient\SalesChannel;
use tabs\apiclient\Currency;
use tabs\apiclient\PricingPeriod;
use tabs\apiclient\Source;
use tabs\apiclient\PotentialBooking;
use tabs\apiclient\WebBooking;
use tabs\apiclient\ProvisionalBooking;
use tabs\apiclient\note\BookingNote;
use tabs\apiclient\booking\Guest;

/**
 * Tabs Rest API Booking object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getBookref() Returns the bookref
 * @method Booking setBookref(string $var) Sets the bookref
 * 
 * @method PropertyLink getProperty() Returns the property
 * 
 * @method \tabs\apiclient\Branding getBranding() Returns the branding
 * 
 * @method \tabs\apiclient\property\Branding getPropertybranding() Returns the propertybranding
 * 
 * @method \DateTime getBookeddatetime() Returns the bookeddatetime
 * @method Booking setBookeddatetime(\DateTime $var) Sets the bookeddatetime
 * 
 * @method \DateTime getFromdate() Returns the fromdate
 * @method Booking setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method Booking setTodate(\DateTime $var) Sets the todate
 * 
 * @method integer getAdults() Returns the adults
 * @method Booking setAdults(integer $var) Sets the adults
 * 
 * @method integer getChildren() Returns the children
 * @method Booking setChildren(integer $var) Sets the children
 * 
 * @method integer getInfants() Returns the infants
 * @method Booking setInfants(integer $var) Sets the infants
 * 
 * @method integer getPets() Returns the pets
 * @method Booking setPets(integer $var) Sets the pets
 * 
 * @method boolean getIgnorechangedayrules() Returns the ignorechangedayrules
 * @method Booking setIgnorechangedayrules(boolean $var) Sets the ignorechangedayrules
 * 
 * @method boolean getBypasschecks() Returns the bypasschecks
 * @method Booking setBypasschecks(boolean $var) Sets the bypasschecks
 * 
 * @method boolean getBypasspetchecks() Returns the bypasspetchecks
 * @method Booking setBypasspetchecks(boolean $var) Sets the bypasspetchecks
 * 
 * @method string  getGuestype() Returns the guesttype
 * @method Booking setGuesttype(string $var) Sets the guestype
 * 
 * @method StaticCollection|booking\Supplier[]|property\Supplier[] getSuppliers() Returns the assigned suppliers
 * 
 * @method string getStatus() Returns the status
 * @method Booking setStatus(string $var) Sets the status
 * 
 * @method boolean getCancelled() Returns the cancelled
 * @method Booking setCancelled(boolean $var) Sets the cancelled
 * 
 * @method SalesChannel getSaleschannel() Returns the saleschannel
 * 
 * @method Currency getCurrency() Returns the currency
 * 
 * @method PricingPeriod getPricingperiod() Returns the pricingperiod
 * 
 * @method Source getSource() Returns the source
 * 
 * @method string getEstimatedarrivaltime() Returns the estimatedarrivaltime
 * @method Booking setEstimatedarrivaltime(string $var) Sets the estimatedarrivaltime
 * 
 * @method string getCheckinearliesttime() Returns the checkinearliesttime
 * @method Booking setCheckinearliesttime(string $var) Sets the checkinearliesttime
 * 
 * @method string getCheckinlatesttime() Returns the checkinlatesttime
 * @method Booking setCheckinlatesttime(string $var) Sets the checkinlatesttime
 * 
 * @method string getCheckouttime() Returns the checkouttime
 * @method Booking setCheckouttime(string $var) Sets the checkouttime
 * 
 * @method PotentialBooking getPotentialbooking() Returns the potentialbooking
 * 
 * @method WebBooking getWebbooking() Returns the webbooking
 * 
 * @method ProvisionalBooking getProvisionalbooking() Returns the provisionalbooking
 * 
 * @method Collection|booking\SecurityDeposit[] getSecuritydeposits() Returns the securitydeposits
 * 
 * @method Collection|booking\Customer[] getCustomers() Returns the customers
 * 
 * @method Collection|booking\Document[] getDocuments() Returns the booking documents
 * 
 * @method Collection|BookingNote[] getNotes() Returns the booking notes
 */
class Booking extends Builder
{
    /**
     * Bookref
     *
     * @var string
     */
    protected $bookref;
    
    /**
     * Guesttype
     * 
     * @var string
     */
    protected $guesttype = 'Customer';

    /**
     * Property
     *
     * @var PropertyLink
     */
    protected $property;
    
    /**
     * Branding
     *
     * @var \tabs\apiclient\Branding
     */
    protected $branding;
    
    /**
     * Property Branding
     *
     * @var \tabs\apiclient\property\Branding
     */
    protected $propertybranding;

    /**
     * Bookeddatetime
     *
     * @var \DateTime
     */
    protected $bookeddatetime;

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
    protected $adults = 0;

    /**
     * Children
     *
     * @var integer
     */
    protected $children = 0;

    /**
     * Infants
     *
     * @var integer
     */
    protected $infants = 0;

    /**
     * Pets
     *
     * @var integer
     */
    protected $pets = 0;
    
    /**
     * Status
     * 
     * @var string
     */
    protected $status = 'New';
    
    /**
     * Cancelled static flag
     * 
     * @var boolean
     */
    protected $cancelled = false;

    /**
     * Ignorechangedayrules
     *
     * @var boolean
     */
    protected $ignorechangedayrules = false;

    /**
     * Bypasschecks
     *
     * @var boolean
     */
    protected $bypasschecks = false;

    /**
     * Bypasspetchecks
     *
     * @var boolean
     */
    protected $bypasspetchecks = false;
    
    /**
     * Sales channel
     * 
     * @var SalesChannel
     */
    protected $saleschannel;
    
    /**
     * Currency
     * 
     * @var Currency
     */
    protected $currency;
    
    /**
     * PricingPeriod
     * 
     * @var PricingPeriod
     */
    protected $pricingperiod;
    
    /**
     * Source
     * 
     * @var Source
     */
    protected $source;

    /**
     * Estimatedarrivaltime
     *
     * @var string
     */
    protected $estimatedarrivaltime = '';

    /**
     * Checkinearliesttime
     *
     * @var string
     */
    protected $checkinearliesttime = '';

    /**
     * Checkinlatesttime
     *
     * @var string
     */
    protected $checkinlatesttime = '';

    /**
     * Checkouttime
     *
     * @var string
     */
    protected $checkouttime = '';
    
    /**
     * Potential Booking
     * 
     * @var PotentialBooking
     */
    protected $potentialbooking;
    
    /**
     * Web Booking
     * 
     * @var WebBooking
     */
    protected $webbooking;

    /**
     * Provisional Booking
     * 
     * @var ProvisionalBooking
     */
    protected $provisionalbooking;

    /**
     * Collection of suppliers for the booking
     * 
     * @var StaticCollection|booking\Supplier[]|property\Supplier[]
     */
    protected $suppliers;
    
    /**
     * Security Deposits
     * 
     * @var Collection|booking\SecurityDeposit[]
     */
    protected $securitydeposits;
    
    /**
     * Booking Customers
     * 
     * @var Collection|booking\Customer[]
     */
    protected $customers;
    
    /**
     * Booking Documents
     * 
     * @var Collection|booking\Documents[]
     */
    protected $documents;
    
    /**
     * Booking notes
     * 
     * @var Collection|BookingNote[]
     */
    protected $notes;
    
    /**
     * Booking guests
     * 
     * @var Collection|Guest[]
     */
    protected $guests;
    
    /**
     * Payments
     * 
     * @var Collection|booking\Payment[]
     */
    protected $payments;

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->bookeddatetime = new \DateTime();
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->suppliers = StaticCollection::factory(
            'supplier',
            new booking\Supplier()
        );
        $this->securitydeposits = Collection::factory(
            'securitydeposit',
            new booking\SecurityDeposit(),
            $this
        );
        $this->customers = Collection::factory(
            'customer',
            new booking\Customer(),
            $this
        );
        $this->documents = Collection::factory(
            'document',
            new booking\Document(),
            $this
        );
        $this->notes = Collection::factory(
            'note',
            new BookingNote(),
            $this
        );
        $this->guests = Collection::factory(
            'guest',
            new Guest(),
            $this
        );
        $this->payments = Collection::factory(
            'payment',
            new booking\Payment(),
            $this
        );
        
        parent::__construct($id);
    }
    
    /**
     * Set up the static booking suppliers array
     * 
     * @param array $suppliers Suppliers
     * 
     * @return Booking
     */
    public function setSuppliers(array $suppliers)
    {
        foreach ($suppliers as $supplier) {
            if (is_object($supplier) && property_exists($supplier, 'type')) {
                if ($supplier->type == 'BookingOveride') {
                    $bs = booking\Supplier::factory($supplier->route);
                    $bs->setParent($this);
                    $this->suppliers->addElement($bs);
                } else if ($supplier->type == 'PropertyDefault') {
                    $ps = property\Supplier::factory($supplier->route);
                    if ($this->getProperty()) {
                        $prop = $this->getProperty();
                        $ps->setParent($prop);
                    }
                    $this->suppliers->addElement($ps);
                }
            }
        }
        
        return $this;
    }

    /**
     * Set the saleschannel
     *
     * @param stdclass|array|SalesChannel $saleschannel The Saleschannel
     *
     * @return Booking
     */
    public function setSaleschannel($saleschannel)
    {
        $this->saleschannel = SalesChannel::factory($saleschannel);

        return $this;
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|Currency $currency The Currency
     *
     * @return Booking
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
     * @return Booking
     */
    public function setPricingperiod($pricingperiod)
    {
        $this->pricingperiod = PricingPeriod::factory($pricingperiod);

        return $this;
    }

    /**
     * Set the source
     *
     * @param stdclass|array|Source $source The Source
     *
     * @return Booking
     */
    public function setSource($source)
    {
        $this->source = Source::factory($source);

        return $this;
    }

    /**
     * Set the potentialbooking
     *
     * @param stdclass|array|PotentialBooking $potentialbooking The Potentialbooking
     *
     * @return Booking
     */
    public function setPotentialbooking($potentialbooking)
    {
        $this->potentialbooking = PotentialBooking::factory($potentialbooking);

        return $this;
    }

    /**
     * Set the webbooking
     *
     * @param stdclass|array|WebBooking $webbooking The Webbooking
     *
     * @return Booking
     */
    public function setWebbooking($webbooking)
    {
        $this->webbooking = WebBooking::factory($webbooking);

        return $this;
    }
    
    /**
     * Set the provisionalbooking
     *
     * @param stdclass|array|ProvisionalBooking $provisionalbooking The Provisionalbooking
     *
     * @return Booking
     */
    public function setProvisionalbooking($provisionalbooking)
    {
        $this->provisionalbooking = ProvisionalBooking::factory($provisionalbooking);

        return $this;
    }

    /**
     * Set the property
     *
     * @param stdclass|array|PropertyLink $property The Property
     *
     * @return Booking
     */
    public function setProperty($property)
    {
        $this->property = PropertyLink::factory($property);

        return $this;
    }

    /**
     * Set the branding
     *
     * @param stdclass|array|\tabs\apiclient\Branding $branding The Branding
     *
     * @return Booking
     */
    public function setBranding($branding)
    {
        $this->branding = \tabs\apiclient\Branding::factory($branding);

        return $this;
    }

    /**
     * Set the propertybranding
     *
     * @param stdclass|array|\tabs\apiclient\property\Branding $propertybranding The Propertybranding
     *
     * @return Booking
     */
    public function setPropertybranding($propertybranding)
    {
        $this->propertybranding = \tabs\apiclient\property\Branding::factory($propertybranding);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'bookref' => $this->getBookref(),
            'guesttype' => $this->getGuesttype(),
            'property' => $this->getProperty()->getId(),
            'bookeddatetime' => $this->getBookeddatetime()->format('Y-m-d'),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'adults' => $this->getAdults(),
            'children' => $this->getChildren(),
            'infants' => $this->getInfants(),
            'pets' => $this->getPets(),
            'ignorechangedayrules' => $this->boolToStr($this->getIgnorechangedayrules()),
            'bypasschecks' => $this->boolToStr($this->getBypasschecks()),
            'bypasspetchecks' => $this->boolToStr($this->getBypasspetchecks()),
            'checkinearliesttime' => $this->getCheckinearliesttime(),
            'checkinlatesttime' => $this->getCheckinlatesttime(),
            'checkouttime' => $this->getCheckouttime(),
            'estimatedarrivaltime' => $this->getEstimatedarrivaltime()
        );
        
        if ($this->getPropertybranding()) {
            $arr['propertybrandingid'] = $this->getPropertybranding()->getId();
        }
        
        if ($this->getSaleschannel()) {
            $arr['saleschannel'] = $this->getSaleschannel()->getSaleschannel();
        }
        
        if ($this->getCurrency()) {
            $arr['currencycode'] = $this->getCurrency()->getCode();
        }
        
        if ($this->getPricingperiod()) {
            $arr['pricingperiod'] = $this->getPricingperiod()->getPricingperiod();
        } else {
            // Set to week as default.  This shouldn't be used very much.
            $arr['pricingperiod'] = 'Week';
        }
        
        if ($this->getPotentialbooking()) {
            $arr = array_merge(
                $arr,
                $this->_prefixToArray('potentialbooking_', $this->getPotentialbooking())
            );
        }
        
        if ($this->getWebbooking()) {
            $arr = array_merge(
                $arr,
                $this->_prefixToArray('webbooking_', $this->getWebbooking())
            );
        }
        
        if ($this->getProvisionalbooking()) {
            $arr = array_merge(
                $arr,
                $this->_prefixToArray('provisionalbooking_', $this->getWebbooking())
            );
        }
        
        
        
        return $arr;
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'booking';
    }
    
    /**
     * Prefix toarray indexes
     * 
     * @param string $prefix Prefix String
     * @param Base   $object Object
     * 
     * @return array
     */
    private function _prefixToArray($string, $object)
    {
        $arr = $object->toArray();
        foreach ($arr as $key => $value) {
            $arr[$string . $key] = $value;
            unset($arr[$key]);
        }
        
        return $arr;
    }
}