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

use tabs\apiclient\booking\Price;
use tabs\apiclient\booking\SecurityDeposit;
use tabs\apiclient\core\Currency;
use tabs\apiclient\booking\PotentialBooking;
use tabs\apiclient\collection\actor\Customer as CustomerCollection;
use tabs\apiclient\collection\booking\Guest as GuestCollection;
use tabs\apiclient\collection\booking\Extra as ExtraCollection;
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
 * @method integer            getId()                   Return the id
 * @method string             getBookref()              Return the bookref
 * @method string             getGuesttype()            Return the guesttype
 * @method string             getProperty()             Return the property
 * @method string             getBranding()             Return the branding
 * @method \DateTime          getFromdate()             Return the fromdate
 * @method \DateTime          getTodate()               Return the todate
 * @method \DateTime          getBookeddatetime()       Return the bookeddatetime
 * @method string             getStatus                 Return the status
 * @method boolean            getCancelled()            Return the cancelled flag
 * @method Price              getPrice()                Return the price
 * @method SecurityDeposit    getSecuritydeposit()      Return the securitydeposit
 * @method Currency           getCurrency()             Return the currency
 * @method \DateTime          getEstimatedarrivaltime() Return the estimatedarrivaltime
 * @method integer            getAdults()               Return the adults
 * @method integer            getChildren()             Return the children
 * @method integer            getInfants()              Return the infants
 * @method PotentialBooking   getPotentialbooking()     Return the potentialbooking
 * @method CustomerCollection[]         getCustomers()            Return the array of customers
 * @method GuestCollection[]            getGuests()               Return the array of guests
 * @method ExtraCollection[]            getExtras()               Return the array of extras
 * @method ProvisionalBooking getProvisionalbooking()   Return the provisionalbooking
 * @method PaymentSummary     getPaymentsummary()       Return the paymentsummary
 * @method ConfirmedBooking   getConfirmedbooking()     Return the confirmedbooking
 * @method TransferredBooking getTransferredbooking()   Return the transferredbooking
 * @method CancelledBooking   getCancelledbooking()     Return the cancelledbooking
 * @method NoteCollection[]             getNotes()                Return the array of notes
 * 
 * @method Booking            setId(integer $id)          Set the id
 * @method Booking            setBookref(string $bookref) Set the bookref
 * 
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
    protected $bookref = '';
    
    /**
     * Guesttype
     *
     * @var string
     */
    protected $guesttype = 'Customer';
    
    /**
     * Property
     *
     * @var string
     */
    protected $property = '';
    
    /**
     * Branding
     *
     * @var string
     */
    protected $branding = '';
    
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
    protected $status = '';
    
    /**
     * Cancelled
     *
     * @var boolean
     */
    protected $cancelled = false;
    
    /**
     * Price
     *
     * @var \tabs\apiclient\booking\Price
     */
    protected $price;
    
    /**
     * SecurityDeposit
     *
     * @var \tabs\apiclient\booking\SecurityDeposit
     */
    protected $securitydeposit;
    
    /**
     * Currency
     *
     * @var \tabs\apiclient\core\Currency
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
     * @var \tabs\apiclient\booking\PotentialBooking
     */
    protected $potentialbooking;
    
    /**
     * Customers
     *
     * Array of Customers
     *
     * @var Customer[]
     */
    protected $customers = array();
    
    /**
     * Guests
     *
     * Array of Guests
     *
     * @var Guest[]
     */
    protected $guests = array();
    
    /**
     * Extras
     *
     * Array of Extras
     *
     * @var Extra[]
     */
    protected $extras = array();
    
    /**
     * ProvisionalBooking
     *
     * @var \tabs\apiclient\booking\ProvisionalBooking
     */
    protected $provisionalbooking;
    
    /**
     * PaymentSummary
     *
     * @var \tabs\apiclient\booking\PaymentSummary
     */
    protected $paymentsummary;
    
    /**
     * ConfirmedBooking
     *
     * @var \tabs\apiclient\booking\ConfirmedBooking
     */
    protected $confirmedbooking;
    
    /**
     * TransferredBooking
     *
     * @var \tabs\apiclient\booking\TransferredBooking
     */
    protected $transferredbooking;
    
    /**
     * CancelledBooking
     *
     * @var \tabs\apiclient\booking\CancelledBooking
     */
    protected $cancelledbooking;
    
    /**
     * Notes
     *
     * Array of Notes
     *
     * @var Note[]
     */
    protected $notes = array();

    
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
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return array(

        );
    }
}