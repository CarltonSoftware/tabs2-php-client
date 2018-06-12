<?php

namespace tabs\apiclient;
use tabs\apiclient\property\Inspection;
use tabs\apiclient\note\PropertyNote;
use tabs\apiclient\property\Attribute;
use tabs\apiclient\property\Comment;
use tabs\apiclient\property\Commission;
use tabs\apiclient\property\Office;
use tabs\apiclient\property\Owner;
use tabs\apiclient\property\OwnerPaymentTerms;
use tabs\apiclient\property\SecurityDeposit;
use tabs\apiclient\property\SecurityFeature;
use tabs\apiclient\property\Supplier;
use tabs\apiclient\property\Room;
use tabs\apiclient\property\Target;
use tabs\apiclient\property\AvailableBreak;

/**
 * Tabs Rest API Property object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string   getTabspropref()            Returns the tabs property ref
 * @method Property setTabspropref(string $ref) Sets the tabs property ref
 * 
 * @method string   getName()             Returns the property name
 * @method Property setName(string $name) Sets the tabs property name
 * 
 * @method string   getNamequalifier()                      Returns the qualifier
 * @method Property setNamequalifier(string $namequalifier) Sets the qualifier
 * 
 * @method string   getAccomodationdescription()             Returns the accomodation description
 * @method Property setAccomodationdescription(string $desc) Sets the accomodation description
 * 
 * @method Address  getAddress() Returns the address
 * 
 * @method Status   getStatus() Returns the status
 * 
 * @method integer  getSleeps()                Returns the sleeps value
 * @method Property setSleeps(integer $sleeps) Sets the sleeps value
 * 
 * @method integer  getBedrooms()                  Returns the bedrooms value
 * @method Property setBedrooms(integer $bedrooms) Sets the bedrooms value
 * 
 * @method integer getMaximumpets() Returns the maximumpets
 * @method Property setMaximumpets(integer $var) Sets the maximumpets
 * 
 * @method string getTelephonenumber() Returns the telephonenumber
 * @method Property setTelephonenumber(string $var) Sets the telephonenumber
 * 
 * @method string getCheckinearliesttime() Returns the checkinearliesttime
 * @method Property setCheckinearliesttime(string $var) Sets the checkinearliesttime
 * 
 * @method string getCheckinlatesttime() Returns the checkinlatesttime
 * @method Property setCheckinlatesttime(string $var) Sets the checkinlatesttime
 * 
 * @method string getCheckouttime() Returns the checkouttime
 * @method Property setCheckouttime(string $var) Sets the checkouttime
 * 
 * @method string getCheckintext() Returns the checkintext
 * @method Property setCheckintext(string $var) Sets the checkintext
 * 
 * @method string getCheckouttext() Returns the checkouttext
 * @method Property setCheckouttext(string $var) Sets the checkouttext
 * 
 * @method integer  getRating() Returns the property rating
 * 
 * @method Collection|property\Document[] getDocuments() Get the documents
 * 
 * @method Collection|PropertyNote[] getNotes() Get the Notes
 * 
 * @method Collection|property\MarketingBrand[] getMarketingbrands() Get the property marketing brands
 * 
 * @method Collection|property\BookingBrand[] getBookingbrands() Get the property booking brands
 * 
 * @method Collection|property\Branding[] getBrandings() Get the property brandings
 * 
 * @method property\Branding getPrimarypropertybranding() Get the primary property branding
 * 
 * @method Collection|Inspection[] getInspections() Get the property inspections
 * 
 * @method Collection|Comment[] getComments() Get the property comments
 * 
 * @method Collection|Attribute[] getAttributes() Get the property attributes
 * 
 * @method Collection|Commission[] getCommissions() Get the property commissions
 * 
 * @method Collection|Office[] getOffices() Get the property offices
 * 
 * @method Collection|Owner[] getOwners() Get the property owners
 * 
 * @method Collection|OwnerPaymentTerms[] getOwnerpaymenttermss() Get the property owner payment terms
 * 
 * @method Collection|SecurityDeposit[] getSecuritydeposits() Get the property security deposits
 * 
 * @method Collection|SecurityFeature[] getSecurityfeatures() Get the property security features
 * 
 * @method Collection|Supplier[] getSuppliers() Get the property suppliers
 * 
 * @method Collection|Room[] getRooms() Get the property rooms
 * 
 * @method Collection|Target[] getTargets() Get the property targets
 * 
 * @method Collection|AvailableBreak[] getAvailablebreaks() Get the available breaks for a property
 * 
 * @method string getPrimarybookingbrand() Get the primary booking brand (name)
 * 
 * @method string getLocation() Returns the property's primary location (only available when using 'fields' filter)
 * 
 * @method Collection|Booking[] getBookings() Returns the properties bookings as a collection
 */
class Property extends Builder
{
    /**
     * Tabs reference
     * 
     * @var string
     */
    protected $tabspropref = '';
    
    /**
     * Property name
     * 
     * @return string
     */
    protected $name = '';
    
    /**
     * Name differentiator
     * 
     * @var string
     */
    protected $namequalifier = '';
    
    /**
     * Accomodation description
     * 
     * @var string
     */
    protected $accomodationdescription = '';
    
    /**
     * Property address
     * 
     * @var Address
     */
    protected $address;
    
    /**
     * Property status
     * 
     * @var Status
     */
    protected $status;    
    
    /**
     * Property accommodation limit
     * 
     * @var integer
     */
    protected $sleeps = 0;
    
    /**
     * Property bedrooms
     * 
     * @var integer
     */
    protected $bedrooms = 0;
    
    /**
     * Property rating
     * 
     * @var integer
     */
    protected $rating = 0;
    
    /**
     * Property documents
     * 
     * @var Collection|property\Document[]
     */
    protected $documents;
    
    /**
     * Primary property branding
     * 
     * @var Branding
     */
    protected $primarypropertybranding;
    
    /**
     * Property notes
     * 
     * @var Collection|PropertyNote[]
     */
    protected $notes;
    
    /**
     * Property mb
     * 
     * @var Collection|property\MarketingBrand[]
     */
    protected $marketingbrands;
    
    /**
     * Property bb
     * 
     * @var Collection|property\BookingBrand[]
     */
    protected $bookingbrands;
    
    /**
     * Property branding
     * 
     * @var Collection|property\Branding[]
     */
    protected $brandings;
    
    /**
     * Property inspections
     * 
     * @var Collection|Inspection[]
     */
    protected $inspections;
    
    /**
     * Property Attributes
     * 
     * @var Collection|Attribute[]
     */
    protected $attributes;
    
    /**
     * Property Comments
     * 
     * @var Collection|Comment[]
     */
    protected $comments;
    
    /**
     * Property Commission
     * 
     * @var Collection|Commission[]
     */
    protected $commissions;
    
    /**
     * Property Offices
     * 
     * @var Collection|Office[]
     */
    protected $offices;
    
    /**
     * Property Owners
     * 
     * @var Collection|Owner[]
     */
    protected $owners;
    
    /**
     * Owner payment terms
     * 
     * @var Collection|OwnerPaymentTerms[]
     */
    protected $ownerpaymenttermss;
    
    /**
     * Security deposits
     * 
     * @var Collection|SecurityDeposit[]
     */
    protected $securitydeposits;
    
    /**
     * Security features
     * 
     * @var Collection|SecurityFeature[]
     */
    protected $securityfeatures;
    
    /**
     * Property Suppliers
     * 
     * @var Collection|Supplier[]
     */
    protected $suppliers;
    
    /**
     * Property Rooms
     * 
     * @var Collection|Room[]
     */
    protected $rooms;
    
    /**
     * Property Targets
     * 
     * @var Collection|Target[]
     */
    protected $targets;
    
    /**
     * Property AvailableBreaks
     * 
     * @var Collection|AvailableBreaks[]
     */
    protected $availablebreaks;
    
    /**
     * Maximumpets
     *
     * @var integer
     */
    protected $maximumpets = 0;
    
    /**
     * Telephone number
     *
     * @var string
     */
    protected $telephonenumber = '';
    
    /**
     * Check in time
     *
     * @var string
     */
    protected $checkinearliesttime = '';
    
    /**
     * Check in time
     *
     * @var string
     */
    protected $checkinlatesttime = '';
    
    /**
     * Check out time
     *
     * @var string
     */
    protected $checkouttime = '';
    
    /**
     * @var string
     */
    protected $checkintext = '';
    
    /**
     * @var string
     */
    protected $checkouttext = '';
    
    /*
     * Primary booking brand (name)
     * 
     * @var string
     */
    protected $primarybookingbrand;
    
    /**
     * Location
     *
     * @var string
     */
    protected $location;
    
    /**
     * @var Collection|Booking[]
     */
    protected $bookings;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Constructor.
     * 
     * Creates a new property address
     * 
     * @return void
     */
    public function __construct($id = null)
    {
        $this->address = new Address();
        $this->status = Status::factory(array('name' => 'New'));
        
        $collections = array(
            'document' => new property\Document(),
            'note' => new PropertyNote(),
            'commission' => new property\Commission(),
            'marketingbrand' => new property\MarketingBrand(),
            'bookingbrand' => new property\BookingBrand(),
            'branding' => new property\Branding(),
            'inspection' => new Inspection(),
            'attribute' => new Attribute(),
            'comment' => new Comment(),
            'offices' => new Office(),
            'owner' => new Owner(),
            'ownerpaymentterms' => new OwnerPaymentTerms(),
            'securitydeposit' => new SecurityDeposit(),
            'securityfeature' => new SecurityFeature(),
            'supplier' => new Supplier(),
            'room' => new Room(),
            'target' => new Target(),
            'availablebreak' => new AvailableBreak()
        );
        
        foreach ($collections as $route => $obj) {
            $prop = $route . 's';
            
            $this->$prop = Collection::factory(
                $route,
                $obj,
                $this
            );
        }
        
        $this->bookings = Collection::factory(new Booking());
        
        parent::__construct($id);
    }
    
    /**
     * Set the address on the property
     * 
     * @param Address|stdClass|Array $addr Address object/array
     * 
     * @return \tabs\apiclient\property\Property
     */
    public function setAddress($addr)
    {
        $this->address = Address::factory($addr, $this);
        
        return $this;
    }
    
    /**
     * Set the status on the property
     * 
     * @param Status|stdClass|Array $addr Status object/array
     * 
     * @return \tabs\apiclient\property\Property
     */
    public function setStatus($addr)
    {
        $this->status = Status::factory($addr, $this);
        
        return $this;
    }    
    
    /**
     * Set the primary property branding
     * 
     * @param array|sdClass|PropertyBranding $branding Set the primary prop branding
     * 
     * @return Property
     */
    public function setPrimarypropertybranding($branding)
    {
        $this->primarypropertybranding = property\Branding::factory($branding);
        $this->primarypropertybranding->setParent($this);
        
        if ($this->primarypropertybranding->getBookingbrand()) {
            $this->primarypropertybranding->getBookingbrand()->setParent($this);
        }
        
        if ($this->primarypropertybranding->getMarketingbrand()) {
            $this->primarypropertybranding->getMarketingbrand()->setParent($this);
        }
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'namequalifier' => $this->getNamequalifier(),
            'address' => $this->getAddress()->toArray(),
            'status' => $this->getStatus()->toArray(),
            'sleeps' => $this->getSleeps(),
            'bedrooms' => $this->getBedrooms(),
            'tabspropref' => $this->getTabspropref(),
            'maximumpets' => $this->getMaximumpets(),
            'telephonenumber' => $this->getTelephonenumber(),
            'checkinearliesttime' => $this->getCheckinearliesttime(),
            'checkinlatesttime' => $this->getCheckinlatesttime(),
            'checkouttime' => $this->getCheckouttime(),
            'checkintext' => $this->getCheckintext(),
            'checkouttext' => $this->getCheckouttext()
        );
    }
    
    /**
     * For serialisation
     * 
     * @return array
     */
    public function __sleep()
    {
        return array(
            'id',
            'responsedata'
        );
    }
    
    /**
     * Get the price from the available breaks endpoint.  Returns zero if no 
     * price is found.
     * 
     * Note: This function only works for periods less than 14 days long.
     * 
     * @param \DateTime $fromDate From date
     * @param integer   $days     Days
     * 
     * @return integer
     */
    public function getAvailableBreaksPrice(
        \DateTime $fromDate,
        $days = 7
    ) {
        static $availablebreaksprices;
        if (!$availablebreaksprices) {
            $availablebreaksprices = $this->availablebreaks;
        }
        
        
        $availablebreaksprices->getPagination()->addParameter(
            'fromdate',
            $fromDate->format('Y-m-d')
        );
        
        $prices = $availablebreaksprices->findBy(
            function($ele) use ($fromDate) {
                return $ele->getFromdate() == $fromDate;
            }
        )->setFetched(true);
        
        if ($prices->getTotal() === 0) {
            $prices = $availablebreaksprices->fetch()->findBy(
                function($ele) use ($fromDate) {
                    return $ele->getFromdate() == $fromDate;
                }
            );
        }
        
        if ($prices->getTotal() > 0) {
            $price = $prices->findBy(
                function($ele) use ($days) {
                    return $ele->getDays() == $days;
                }
            );
            
            if ($days <= 7) {
                if ($price->getTotal() === 1) {
                    return $price->pop()->getPrice();
                }
            }
            
            if ($days > 7) {
                $getPrice = function(&$prices, $availablebreakprices, $fromDate, $days = 7) {
                    $price = $availablebreakprices->findBy(
                        function($ele) use ($fromDate, $days) {
                            return $ele->getDays() == $days 
                                && $ele->getFromdate()->format('Y-m-d') == $fromDate->format('Y-m-d');
                        }
                    );
                    
                    if ($price->getTotal() === 1) {
                        $prices[] = $price->first()->getPrice();
                    } else {
                        throw new \RuntimeException('Price not found');
                    }
                };
                
                $prices = array();
                $add = $days % 7;
                $weeks = ($days - $add) / 7;
                
                if ($days < 14) {
                    $add = $days;
                } else if ($add > 0) {
                    $add = $add + 7;
                }
                
                try {
                    $to = clone $fromDate;
                    for ($i = 0; $i < $weeks; $i++) {
                        $to->add(new \DateInterval('P' . ($i * 7) . 'D'));
                        $getPrice($prices, $availablebreaksprices, $to, 7);
                    }

                    if ($to && $add > 0) {
                        $getPrice($prices, $availablebreaksprices, $to, $add);
                    }
                    
                    return array_sum($prices);
                } catch (Exception $ex) {
                    return 0;
                }
            }
        }
        
        return 0;
    }
    
    /**
     * For serialisation
     * 
     * @return void
     */
    public function __wakeup()
    {
        if ($this->getResponsedata()) {
            // Remap collections
            $this->__construct($this->getId());
            $this->setObjectProperties($this, $this->getResponsedata());
        }
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}