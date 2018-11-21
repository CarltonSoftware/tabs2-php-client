<?php

namespace tabs\apiclient;
use tabs\apiclient\property\Inspection;
use tabs\apiclient\note\PropertyNote;
use tabs\apiclient\property\Attribute;
use tabs\apiclient\property\Comment;
use tabs\apiclient\property\Commission;
use tabs\apiclient\property\Office;
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
 * @method Property setTabspropref(string $ref) Sets the tabs property ref
 *
 * @method Property setName(string $name) Sets the tabs property name
 *
 * @method Property setNamequalifier(string $namequalifier) Sets the qualifier
 *
 * @method Property setAccomodationdescription(string $desc) Sets the accomodation description
 *
 *
 *
 * @method Property setSleeps(integer $sleeps) Sets the sleeps value
 *
 * @method Property setBedrooms(integer $bedrooms) Sets the bedrooms value
 *
 * @method Property setMaximumpets(integer $var) Sets the maximumpets
 *
 * @method Property setTelephonenumber(string $var) Sets the telephonenumber
 *
 * @method Property setCheckinearliesttime(string $var) Sets the checkinearliesttime
 *
 * @method Property setCheckinlatesttime(string $var) Sets the checkinlatesttime
 *
 * @method Property setCheckouttime(string $var) Sets the checkouttime
 *
 * @method Property setCheckintext(string $var) Sets the checkintext
 *
 * @method Property setCheckouttext(string $var) Sets the checkouttext
 *
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
     * @var Collection|property\Owner[]
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

    /**
     * @var \tabs\apiclient\BookingEnquiry
     */
    protected $enquiry;

    /**
     * @var array
     */
    protected $__COLLECTION_MAP = array(
        'documents' => array(
            'class' => 'property\\Document',
            'parent' => true
        ),
        'notes' => array(
            'class' => 'note\\PropertyNote',
            'parent' => true
        ),
        'commissions' => array(
            'class' => 'property\\Commission',
            'parent' => true
        ),
        'marketingbrands' => array(
            'class' => 'property\\MarketingBrand',
            'parent' => true
        ),
        'bookingbrands' => array(
            'class' => 'property\\BookingBrand',
            'parent' => true
        ),
        'brandings' => array(
            'class' => 'property\\Branding',
            'parent' => true
        ),
        'inspections' => array(
            'class' => 'property\\Inspection',
            'parent' => true
        ),
        'attributes' => array(
            'class' => 'property\\Attribute',
            'parent' => true
        ),
        'comments' => array(
            'class' => 'property\\Comment',
            'parent' => true
        ),
        'offices' => array(
            'class' => 'property\\Office',
            'parent' => true
        ),
        'owners' => array(
            'class' => 'property\\Owner',
            'parent' => true
        ),
        'ownerpaymenttermss' => array(
            'class' => 'property\\OwnerPaymentTerms',
            'parent' => true
        ),
        'securitydeposits' => array(
            'class' => 'property\\SecurityDeposit',
            'parent' => true
        ),
        'securityfeatures' => array(
            'class' => 'property\\SecurityFeature',
            'parent' => true
        ),
        'suppliers' => array(
            'class' => 'property\\Supplier',
            'parent' => true
        ),
        'rooms' => array(
            'class' => 'property\\Room',
            'parent' => true
        ),
        'answers' => array(
            'class' => 'property\\Answer',
            'parent' => true
        ),
        'availablebreaks' => array(
            'class' => 'property\\AvailableBreak',
            'parent' => true
        ),
        'bookings' => array(
            'class' => 'Booking',
            'parent' => true
        )
    );

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
            $availablebreaksprices = $this->getCollection('availablebreaks');
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
                        $to->add(new \DateInterval('P7D'));
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
     * Get a new booking enquiry for the property.
     *
     * Dates will need to be added.  See booking enquiry example for
     * more details.
     *
     * @return \tabs\apiclient\BookingEnquiry
     */
    public function getEnquiry()
    {
        if ($this->enquiry) {
            $be = BookingEnquiry::factory($this->enquiry);
            $be->setResponsedata($this->enquiry);

            return $be;
        } else {
            $be = new BookingEnquiry();
            $be->setProperty($this);

            return $be;
        }
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

    /**
     * Returns the tabs property ref
     *
     * @return string
     */
    public function getTabspropref()
    {
        return $this->tabspropref;
    }

    /**
     * Returns the property name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the qualifier
     *
     * @return string
     */
    public function getNamequalifier()
    {
        return $this->namequalifier;
    }

    /**
     * Returns the accomodation description
     *
     * @return string
     */
    public function getAccomodationdescription()
    {
        return $this->accomodationdescription;
    }

    /**
     * Returns the address
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the status
     *
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the sleeps value
     *
     * @return integer
     */
    public function getSleeps()
    {
        return $this->sleeps;
    }

    /**
     * Returns the bedrooms value
     *
     * @return integer
     */
    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    /**
     * Returns the maximumpets
     *
     * @return integer
     */
    public function getMaximumpets()
    {
        return $this->maximumpets;
    }

    /**
     * Returns the telephonenumber
     *
     * @return string
     */
    public function getTelephonenumber()
    {
        return $this->telephonenumber;
    }

    /**
     * Returns the checkinearliesttime
     *
     * @return string
     */
    public function getCheckinearliesttime()
    {
        return $this->checkinearliesttime;
    }

    /**
     * Returns the checkinlatesttime
     *
     * @return string
     */
    public function getCheckinlatesttime()
    {
        return $this->checkinlatesttime;
    }

    /**
     * Returns the checkouttime
     *
     * @return string
     */
    public function getCheckouttime()
    {
        return $this->checkouttime;
    }

    /**
     * Returns the checkintext
     *
     * @return string
     */
    public function getCheckintext()
    {
        return $this->checkintext;
    }

    /**
     * Returns the checkouttext
     *
     * @return string
     */
    public function getCheckouttext()
    {
        return $this->checkouttext;
    }

    /**
     * Returns the property rating
     *
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Get the documents
     *
     * @return Collection|property\Document[]
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * Get the Notes
     *
     * @return Collection|PropertyNote[]
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Get the property marketing brands
     *
     * @return Collection|property\MarketingBrand[]
     */
    public function getMarketingbrands()
    {
        return $this->marketingbrands;
    }

    /**
     * Get the property booking brands
     *
     * @return Collection|property\BookingBrand[]
     */
    public function getBookingbrands()
    {
        return $this->bookingbrands;
    }

    /**
     * Get the property brandings
     *
     * @return Collection|property\Branding[]
     */
    public function getBrandings()
    {
        return $this->brandings;
    }

    /**
     * Get the primary property branding
     *
     * @return property\Branding
     */
    public function getPrimarypropertybranding()
    {
        return $this->primarypropertybranding;
    }

    /**
     * Get the property inspections
     *
     * @return Collection|Inspection[]
     */
    public function getInspections()
    {
        return $this->inspections;
    }

    /**
     * Get the property comments
     *
     * @return Collection|Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Get the property attributes
     *
     * @return Collection|Attribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Get the property commissions
     *
     * @return Collection|Commission[]
     */
    public function getCommissions()
    {
        return $this->commissions;
    }

    /**
     * Get the property offices
     *
     * @return Collection|Office[]
     */
    public function getOffices()
    {
        return $this->offices;
    }

    /**
     * Get the property owners
     *
     * @return Collection|property\Owner[]
     */
    public function getOwners()
    {
        return $this->owners;
    }

    /**
     * Get the property owner payment terms
     *
     * @return Collection|OwnerPaymentTerms[]
     */
    public function getOwnerpaymenttermss()
    {
        return $this->ownerpaymenttermss;
    }

    /**
     * Get the property security deposits
     *
     * @return Collection|SecurityDeposit[]
     */
    public function getSecuritydeposits()
    {
        return $this->securitydeposits;
    }

    /**
     * Get the property security features
     *
     * @return Collection|SecurityFeature[]
     */
    public function getSecurityfeatures()
    {
        return $this->securityfeatures;
    }

    /**
     * Get the property suppliers
     *
     * @return Collection|Supplier[]
     */
    public function getSuppliers()
    {
        return $this->suppliers;
    }

    /**
     * Get the property rooms
     *
     * @return Collection|Room[]
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Get the property targets
     *
     * @return Collection|Target[]
     */
    public function getTargets()
    {
        return $this->targets;
    }

    /**
     * Get the available breaks for a property
     *
     * @return Collection|AvailableBreak[]
     */
    public function getAvailablebreaks()
    {
        return $this->availablebreaks;
    }

    /**
     * Get the primary booking brand (name)
     *
     * @return string
     */
    public function getPrimarybookingbrand()
    {
        return $this->primarybookingbrand;
    }

    /**
     * Returns the property's primary location (only available when using 'fields' filter)
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Returns the properties bookings as a collection
     *
     * @return Collection|Booking[]
     */
    public function getBookings()
    {
        return $this->bookings;
    }
}