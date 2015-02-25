<?php

/**
 * Tabs Rest API Booking object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\booking;

use tabs\apiclient\property\Property;
use tabs\apiclient\property\brand\Branding;
use tabs\apiclient\booking\Price;
use tabs\apiclient\booking\SecurityDeposit;
use tabs\apiclient\core\Currency;
use tabs\apiclient\booking\PotentialBooking;
use tabs\apiclient\collection\booking\BookingCustomer as BookingCustomerCollection;
use tabs\apiclient\collection\booking\BookingGuest as BookingGuestCollection;
use tabs\apiclient\collection\booking\BookingExtra as BookingExtraCollection;
use tabs\apiclient\booking\ProvisionalBooking;
use tabs\apiclient\booking\PaymentSummary;
use tabs\apiclient\booking\ConfirmedBooking;
use tabs\apiclient\booking\TransferredBooking;
use tabs\apiclient\booking\CancelledBooking;
use tabs\apiclient\collection\core\Note as NoteCollection;

/**
 * Tabs Rest API Booking object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer                     getId()                   Return the id
 * @method string                      getBookref()              Return the bookref
 * @method string                      getGuesttype()            Return the guesttype
 * @method string                      getProperty()             Return the property
 * @method string                      getBranding()             Return the branding
 * @method \DateTime                   getFromdate()             Return the fromdate
 * @method \DateTime                   getTodate()               Return the todate
 * @method \DateTime                   getBookeddatetime()       Return the bookeddatetime
 * @method string                      getStatus                 Return the status
 * @method boolean                     getCancelled()            Return the cancelled flag
 * @method Price                       getPrice()                Return the price
 * @method BookingSecurityDeposit      getSecuritydeposit()      Return the securitydeposit
 * @method Currency                    getCurrency()             Return the currency
 * @method \DateTime                   getEstimatedarrivaltime() Return the estimatedarrivaltime
 * @method integer                     getAdults()               Return the adults
 * @method integer                     getChildren()             Return the children
 * @method integer                     getInfants()              Return the infants
 * @method PotentialBooking            getPotentialbooking()     Return the potentialbooking
 * @method ProvisionalBooking          getProvisionalbooking()   Return the provisionalbooking
 * @method PaymentSummary              getPaymentsummary()       Return the paymentsummary
 * @method ConfirmedBooking            getConfirmedbooking()     Return the confirmedbooking
 * @method TransferredBooking          getTransferredbooking()   Return the transferredbooking
 * @method CancelledBooking            getCancelledbooking()     Return the cancelledbooking
 * @method NoteCollection[]            getNotes()                Return the array of notes
 * 
 * @method Booking setId(integer $id)                                       Set the id
 * @method Booking setBookref(string $bookref)                              Set the bookref
 * @method Booking setGuesttype(string $guesttype)                          Set the guesttype
 * @method Booking setFromdate(\DateTime $fromdate)                         Set the fromdate
 * @method Booking setTodate(\DateTime $todate)                             Set the todate
 * @method Booking setBookeddatetime(\DateTime $bookeddatetime)             Set the bookeddatetime
 * @method Booking setStatus(string $status)                                Set the status
 * @method Booking setCancelled(boolean $cancelled)                         Set the cancelled bool
 * @method Booking setEstimatedarrivaltime(\DateTime $estimatedarrivaltime) Set the estimatedarrivaltime
 * @method Booking setAdults(integer $adults)                               Set the adults
 * @method Booking setChildren(integer $children)                           Set the children
 * @method Booking setInfants(integer $infants)                             Set the infants
 */
class Booking extends \tabs\apiclient\core\Builder
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;
    
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
    protected $guesttype;
    
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
     * Bookeddatetime
     * 
     * @var \DateTime
     */
    protected $bookeddatetime;
    
    /**
     * Status
     *
     * @var string
     */
    protected $status;
    
    /**
     * Cancelled
     *
     * @var boolean
     */
    protected $cancelled;
    
    /**
     * Price
     *
     * @var Price
     */
    protected $price;
    
    /**
     * SecurityDeposit
     *
     * @var SecurityDeposit
     */
    protected $securitydeposit;
    
    /**
     * Currency
     *
     * @var Currency
     */
    protected $currency;
    
    /**
     * Estimatedarrivaltime
     * 
     * @var \DateTime
     */
    protected $estimatedarrivaltime;
    
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
     * PotentialBooking
     *
     * @var PotentialBooking
     */
    protected $potentialbooking;
    
    /**
     * Customers
     *
     * Array of Customers
     *
     * @var CustomerCollection[]
     */
    protected $customers = array();
    
    /**
     * Guests
     *
     * Array of Guests
     *
     * @var GuestCollection[]
     */
    protected $guests = array();
    
    /**
     * Extras
     *
     * Array of Extras
     *
     * @var ExtraCollection[]
     */
    protected $extras = array();
    
    /**
     * ProvisionalBooking
     *
     * @var ProvisionalBooking
     */
    protected $provisionalbooking;
    
    /**
     * PaymentSummary
     *
     * @var PaymentSummary
     */
    protected $paymentsummary;
    
    /**
     * ConfirmedBooking
     *
     * @var ConfirmedBooking
     */
    protected $confirmedbooking;
    
    /**
     * TransferredBooking
     *
     * @var TransferredBooking
     */
    protected $transferredbooking;
    
    /**
     * CancelledBooking
     *
     * @var CancelledBooking
     */
    protected $cancelledbooking;
    
    /**
     * Notes
     *
     * Array of Notes
     *
     * @var NoteCollection[]
     */
    protected $notes = array();
    
    /**
     * Collections array
     * 
     * @var \tabs\apiclient\collection\Collection[]
     */
    protected $collections = array();
    
    // -------------------------- Static Functions -------------------------- //

    /**
     * Create a Booking object from a given id
     *
     * @param string $id Booking id
     *
     * @return \tabs\apiclient\booking\Booking
     */
    public static function get($id)
    {
        $className = self::getClass();
        $routeName = strtolower($className);

        return parent::_get(sprintf('/%s/%s', $routeName, $id));
    }

    // -------------------------- Public Functions -------------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * Returns the property object
     *
     * @return Property
     */
    public function getPropertyObj()
    {
        if ($this->getProperty() === null) {
            throw new \tabs\apiclient\client\Exception(
                'A valid property URL is required (currently null).'
            );
        }
        
        list($prefix, $stub, $id) = explode('/', $this->getProperty());
        
        return Property::get($id);
    }
    
    /**
     * Returns the Branding object
     *
     * @return Branding
     */
    public function getBrandingObj()
    {
        if ($this->getBranding() === null) {
            throw new \tabs\apiclient\client\Exception(
                'A valid property URL is required (currently null).'
            );
        }
        
        list($prefix, $stub, $id) = explode('/', $this->getBranding());
        
        return Branding::get($id);
    }
    
    /**
     * Set the Price object on the booking
     * 
     * @param Price|stdClass|Array $p Price object/array
     * 
     * @return \tabs\apiclient\booking\Booking
     */
    public function setPrice($p)
    {
        $price = Price::factory($p);
        $price->setParent($this);
        $this->price = $price;
        
        return $this;
    }
    
    /**
     * Set the BookingSecurityDeposit object on the booking
     * 
     * @param BookingSecurityDeposit|stdClass|Array $sd BookingSecurityDeposit object/array
     * 
     * @return \tabs\apiclient\booking\Booking
     */
    public function setSecuritydeposit($sd)
    {
        $securitydeposit = BookingSecurityDeposit::factory($sd);
        $securitydeposit->setParent($this);
        $this->securitydeposit = $securitydeposit;
        
        return $this;
    }
    
    /**
     * Set the Currency object on the booking
     * 
     * @param Currency|stdClass|Array $c Currency object/array
     * 
     * @return \tabs\apiclient\booking\Booking
     */
    public function setCurrency($c)
    {
        $currency = Currency::factory($c);
        $currency->setParent($this);
        $this->currency = $currency;
        
        return $this;
    }
    
    /**
     * Set the PotentialBooking object on the booking
     * 
     * @param PotentialBooking|stdClass|Array $pb PotentialBooking object/array
     * 
     * @return \tabs\apiclient\booking\Booking
     */
    public function setPotentialbooking($pb)
    {
        $potentialbooking = PotentialBooking::factory($pb);
        $potentialbooking->setParent($this);
        $this->potentialbooking = $potentialbooking;
        
        return $this;
    }
    
    /**
     * Set the ProvisionalBooking object on the booking
     * 
     * @param ProvisionalBooking|stdClass|Array $pb ProvisionalBooking object/array
     * 
     * @return \tabs\apiclient\booking\Booking
     */
    public function setProvisionalbooking($pb)
    {
        $provisionalbooking = ProvisionalBooking::factory($pb);
        $provisionalbooking->setParent($this);
        $this->provisionalbooking = $provisionalbooking;
        
        return $this;
    }
    
    /**
     * Set the ConfirmedBooking object on the booking
     * 
     * @param ConfirmedBooking|stdClass|Array $cb ConfirmedBooking object/array
     * 
     * @return \tabs\apiclient\booking\Booking
     */
    public function setConfirmedBooking($cb)
    {
        $confirmedbooking = ConfirmedBooking::factory($cb);
        $confirmedbooking->setParent($this);
        $this->confirmedbooking = $confirmedbooking;
        
        return $this;
    }
    
    /**
     * Set the TransferredBooking object on the booking
     * 
     * @param TransferredBooking|stdClass|Array $tb TransferredBooking object/array
     * 
     * @return \tabs\apiclient\booking\Booking
     */
    public function setTransferredBooking($tb)
    {
        $transferredbooking = TransferredBooking::factory($tb);
        $transferredbooking->setParent($this);
        $this->transferredbooking = $transferredbooking;
        
        return $this;
    }
    
    /**
     * Set the CancelledBooking object on the booking
     * 
     * @param CancelledBooking|stdClass|Array $cb CancelledBooking object/array
     * 
     * @return \tabs\apiclient\booking\Booking
     */
    public function setCancelledBooking($cb)
    {
        $cancelledbooking = CancelledBooking::factory($cb);
        $cancelledbooking->setParent($this);
        $this->cancelledbooking = $cancelledbooking;
        
        return $this;
    }
    
    /**
     * Add a customer
     *
     * @param BookingCustomer $bc BookingCustomer object
     *
     * @return Booking
     */
    public function addCustomer(&$bc)
    {
        $bc->setParent($this);
        $this->getCustomers()->addElement($bc);
        
        return $this;
    }
    
    /**
     * Get all of the booking customers
     *
     * @return BookingCustomerCollection
     */
    public function getCustomers()
    {
        return $this->_getBookingCollection('BookingCustomer');
    }     
    
    /**
     * Set the booking customer objects
     * 
     * @param BookingCustomer $customers Customer array
     *
     * @return Booking
     */
    public function setCustomers($customers)
    {
        foreach ($customers as $bc) {
            $this->addCustomer($bc);
        }
        
        return $this;
    }
    
    /**
     * Add a guest
     *
     * @param BookingGuest $bg BookingGuest object
     *
     * @return Booking
     */
    public function addGuest(&$bg)
    {
        $bg->setParent($this);
        $this->getGuests()->addElement($bg);
        
        return $this;
    }
    
    /**
     * Get all of the booking guests
     *
     * @return BookingGuestCollection
     */
    public function getGuests()
    {
        return $this->_getBookingCollection('BookingGuest');
    }        
    
    /**
     * Set the booking guest objects
     * 
     * @param BookingGuest $guests Guest array
     *
     * @return Booking
     */
    public function setGuests($guests)
    {
        foreach ($guests as $bg) {
            $this->addGuest($bg);
        }
        
        return $this;
    }
    
    /**
     * Add an extra
     *
     * @param BookingExtra $be BookingExtra object
     *
     * @return Booking
     */
    public function addExtra(&$be)
    {
        $be->setParent($this);
        $this->getExtras()->addElement($be);
        
        return $this;
    }

    /**
     * Get all of the booking extras
     *
     * @return BookingExtraCollection
     */
    public function getExtras()
    {
        return $this->_getBookingCollection('BookingExtra');
    } 
    
    /**
     * Set the booking extra objects
     * 
     * @param BookingExtra $extras Extra array
     *
     * @return Booking
     */
    public function setExtras($extras)
    {
        foreach ($extras as $be) {
            $this->addExtra($be);
        }
        
        return $this;
    }

    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            //ToDo
        );
    }
    
    // ------------------------- Private Functions -------------------------- //
    
    /**
     * Return a new collection type and instantiate if needed
     * 
     * @param string $class Class string
     * 
     * @return \tabs\apiclient\collection\Collection
     */
    private function _getCollection($class)
    {
        if (!isset($this->collections[$class])) {
            $this->collections[$class] = new $class();
            $this->collections[$class]->setElementParent($this);
        }
        
        return $this->collections[$class];
    }
    
    /**
     * Get (and create) a booking collection
     * 
     * @param string $class Class name
     * 
     * @return BookingCustomerCollection|BookingGuestCollection|BookingExtraCollection
     */
    private function _getBookingCollection($class)
    {
        return $this->_getCollection(
            "\\tabs\\apiclient\\collection\\booking\\" . $class
        );
    }
    
    
    
    
    
    
    
}