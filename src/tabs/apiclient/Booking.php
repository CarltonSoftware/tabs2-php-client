<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\PropertyLink;
use tabs\apiclient\SalesChannel;
use tabs\apiclient\Currency;
use tabs\apiclient\PricingPeriod;
use tabs\apiclient\Source;
use tabs\apiclient\SourceMarketingBrand;
use tabs\apiclient\PotentialBooking;
use tabs\apiclient\WebBooking;
use tabs\apiclient\ProvisionalBooking;
use tabs\apiclient\note\BookingNote;
use tabs\apiclient\booking\Guest;
use tabs\apiclient\booking\OwnerPaymentSummary;
use tabs\apiclient\AgencyBookingType;
use tabs\apiclient\OwnerBookingType;

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
 * @method Booking setBookref(string $var) Sets the bookref
 *
 * @method Booking setBookeddatetime(\DateTime $var) Sets the bookeddatetime
 *
 * @method Booking setFromdate(\DateTime $var) Sets the fromdate
 *
 * @method Booking setTodate(\DateTime $var) Sets the todate
 *
 * @method Booking setAdults(integer $var) Sets the adults
 *
 * @method Booking setChildren(integer $var) Sets the children
 *
 * @method Booking setInfants(integer $var) Sets the infants
 *
 * @method Booking setPets(integer $var) Sets the pets
 *
 * @method Booking setIgnorechangedayrules(boolean $var) Sets the ignorechangedayrules
 *
 * @method Booking setBypasschecks(boolean $var) Sets the bypasschecks
 *
 * @method Booking setBypasspetchecks(boolean $var) Sets the bypasspetchecks
 *
 * @method Booking setGuesttype(string $var) Sets the guestype
 *
 * @method Booking setStatus(string $var) Sets the status
 *
 * @method Booking setCancelled(boolean $var) Sets the cancelled
 *
 * @method Booking setEstimatedarrivaltime(string $var) Sets the estimatedarrivaltime
 *
 * @method Booking setCheckinearliesttime(string $var) Sets the checkinearliesttime
 *
 * @method Booking setCheckinlatesttime(string $var) Sets the checkinlatesttime
 *
 * @method Booking setCheckouttime(string $var) Sets the checkouttime
 *
 * @method Booking setCheckintext(string $var) Sets the check in text
 *
 * @method Booking setCheckouttext(string $var) Sets the check out text
 *
 * @method Booking setPromotioncode(string $var) Sets the promotion code
 *
 * @method Booking setSourcecode(string $var) Sets the source code
 *
 * @method Booking setOverridestatus(boolean $var) Set the override status flag
 *
 * @method Booking setSourcemarketingbrand(SourceMarketingBrand $var) Set the source marketing brand
 *
 * @method Booking setSource(Source $var) Set the source
 *
 * @method Booking setWebbooking(WebBooking $var) Set the webbooking
 *
 * @method Collection|booking\SecurityDeposit[] getSecuritydeposits() Returns the securitydeposits
 *
 * @method booking\SecurityDeposit getSecuritydeposit() Returns booking securitydeposit
 *
 * @method Collection|booking\Customer[] getCustomers() Returns the customers
 *
 * @method Collection|booking\Document[] getDocuments() Returns the booking documents
 *
 * @method Collection|BookingNote[] getNotes() Returns the booking notes
 *
 * @method Collection|booking\Extra[] getExtras() Returns the booking extras
 *
 * @method Collection|booking\Guest[] getGuests() Returns the booking guests
 *
 * @method Collection|booking\Voucher[] getVouchers() Returns the booking vouchers
 *
 * @method Collection|booking\Approval[] getApprovals() Returns the booking approvals
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
     * Source marketing brand
     *
     * @var SourceMarketingBrand
     */
    protected $sourcemarketingbrand;

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
     * @var string
     */
    protected $checkouttext = '';

    /**
     * @var string
     */
    protected $checkintext = '';

    /**
     * Promotion code
     *
     * @var string
     */
    protected $promotioncode = '';

    /**
     * Source code
     *
     * @var string
     */
    protected $sourcecode = '';

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
     * Confirmed Booking
     *
     * @var ConfirmedBooking
     */
    protected $confirmedbooking;

    /**
     * Cancelled Booking
     *
     * @var CancelledBooking
     */
    protected $cancelledbooking;

    /**
     * Potential cancellation
     *
     * @var PotentialCancellation
     */
    protected $potentialcancellation;

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
     * Security Deposit
     *
     * @var booking\SecurityDeposit[]
     */
    protected $securitydeposit;

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

    /**
     * Extras
     *
     * @var Collection|booking\Extra[]
     */
    protected $extras;

    /**
     * @var Collection|booking\Voucher[]
     */
    protected $vouchers;

    /**
     * @var Collection|booking\Vehicles[]
     */
    protected $vehicles;

    /**
     * Owner payment summary
     *
     * @var OwnerPaymentSummary
     */
    protected $ownerpaymentsummary;

    /**
     * Agency booking type
     *
     * @var AgencyBookingType
     */
    protected $agencybookingtype;

    /**
     * Owner booking type
     *
     * @var OwnerBookingType
     */
    protected $ownerbookingtype;

    /**
     * Transferred booking
     *
     * @var TransferredBooking
     */
    protected $transferredtobooking;

    /**
     * Transferred booking
     *
     * @var TransferredBooking
     */
    protected $transferredfrombooking;

    /**
     * @var boolean
     */
    protected $overridestatus = false;

    /**
     * @var int
     */
    protected $propertyid;

    /**
     * Approvals
     *
     * @var Collection|booking\Approval[]
     */
    protected $approvals;

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
        $this->extras = Collection::factory(
            'extra',
            new booking\Extra(),
            $this
        );
        $this->vouchers = Collection::factory(
            'voucher',
            new booking\Voucher(),
            $this
        );

        $this->vehicles = Collection::factory(
            'vehicle',
            new booking\Vehicle(),
            $this
        );

        $this->ownerpaymentsummary = new OwnerPaymentSummary();
        $this->sourcemarketingbrand = new SourceMarketingBrand();
        $this->source = new Source();
        $this->webbooking = new WebBooking();
        $this->approvals = Collection::factory(
            'approval',
            new booking\Approval(),
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
                    $bs = booking\Supplier::factory($supplier->route, $this);
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
     * Set the security deposit
     *
     * @param stdclass|array|booking\SecurityDeposit $sd Security deposit
     *
     * @return Booking
     */
    public function setSecuritydeposit($sd)
    {
        $this->securitydeposit = booking\SecurityDeposit::factory($sd);

        if ($this->getId() && $this->securitydeposit) {
            $this->securitydeposit->setParent($this);
        }

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
     * Set the confirmed booking
     *
     * @param stdclass|array|ConfirmedBooking $confirmedbooking Confirmed Booking
     *
     * @return Booking
     */
    public function setConfirmedbooking($confirmedbooking)
    {
        $this->confirmedbooking = ConfirmedBooking::factory($confirmedbooking);

        return $this;
    }

    /**
     * Set the cancelled booking
     *
     * @param stdclass|array|CancelledBooking $cancelledbooking Cancelled Booking
     *
     * @return Booking
     */
    public function setCancelledbooking($cancelledbooking)
    {
        $this->cancelledbooking = CancelledBooking::factory($cancelledbooking);

        return $this;
    }

    /**
     * Set the potential cancellation
     *
     * @param stdclass|array|PotentialCancellation $potentialcancellation Potential Cancellation
     *
     * @return Booking
     */
    public function setPotentialcancellation($potentialcancellation)
    {
        $this->potentialcancellation = PotentialCancellation::factory($potentialcancellation);

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
        if ($property instanceof Property) {
            $this->property = $property;
        } else {
            $this->property = PropertyLink::factory($property);
        }

        return $this;
    }

    /**
     * Return the property object
     *
     * @return Property
     */
    public function getProperty()
    {
        if ($this->property instanceof PropertyLink) {
            return $this->property->getDetails();
        } else {
            return $this->property;
        }
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
     * Set the OwnerPaymentSummary on the booking
     *
     * @param OwnerPaymentSummary|stdClass|Array $ops OwnerPaymentSummary object/array
     *
     * @return Booking
     */
    public function setOwnerPaymentSummary($ops)
    {
        $this->ownerpaymentsummary = OwnerPaymentSummary::factory($ops);

        return $this;
    }

    /**
     * Set the AgencyBookingType on the booking
     *
     * @param AgencyBookingType|stdClass|Array $abt AgencyBookingType
     *
     * @return Booking
     */
    public function setAgencybookingtype($abt)
    {
        $this->agencybookingtype = AgencyBookingType::factory($abt);

        return $this;
    }

    /**
     * Set the OwnerBookingType on the booking
     *
     * @param OwnerBookingType|stdClass|Array $obt OwnerBookingType
     *
     * @return Booking
     */
    public function setOwnerbookingtype($obt)
    {
        $this->ownerbookingtype = OwnerBookingType::factory($obt);

        return $this;
    }

    /**
     * Shortcut function for adding a note
     *
     * @param \tabs\apiclient\Note $note Note
     *
     * @return \tabs\apiclient\Booking
     */
    public function addNote(Note $note)
    {
        $bn = new BookingNote();
        $bn->setNote($note);
        $this->notes->addElement($bn);

        if ($this->getId()) {
            $bn->create();
        }

        return $this;
    }

    /**
     * Get the source
     *
     * @return Source
     */
    public function getSource()
    {
        if ($this->getSourcemarketingbrand()) {
            return $this->getSourcemarketingbrand()->getSource();
        } else if ($this->source) {
            return $this->source;
        }
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if (!$this->getId()) {
            $arr['guesttype'] = $this->getGuesttype();
            $arr['ignorechangedayrules'] = $this->boolToStr($this->getIgnorechangedayrules());
            $arr['bypasschecks'] = $this->boolToStr($this->getBypasschecks());
            $arr['bypasspetchecks'] = $this->boolToStr($this->getBypasspetchecks());

            if ($this->notes->count() > 0) {
                $bookingnote = $this->notes->first();
                if ($bookingnote->getNote()) {
                    $this->prefixToArray(
                        $arr,
                        'note',
                        $bookingnote->getNote()
                    );
                }
            }

            if ($this->getCurrency()) {
                $arr['currencycode'] = $this->getCurrency()->getCode();
            }

            if ($this->getSaleschannel()) {
                $arr['saleschannel'] = $this->getSaleschannel()->getSaleschannel();
            }

            if ($this->getPricingperiod()) {
                $arr['pricingperiod'] = $this->getPricingperiod()->getPricingperiod();
            } else {
                // Set to week as default.  This shouldn't be used very much.
                $arr['pricingperiod'] = 'Week';
            }

            if ($this->getSecuritydeposit()) {
                $this->prefixToArray(
                    $arr,
                    'securitydeposit',
                    $this->getSecuritydeposit()
                );
            }
        }

        if ($this->getGuesttype() !== 'Customer' && $this->getProperty()) {
            $arr['propertyid'] = $this->getProperty()->getId();
        }

        if (($this->getGuesttype() === 'Agency' || $this->getGuesttype() === 'None') && $this->getAgencybookingtype()) {
            $arr['agencybookingtypeid'] = $this->getAgencybookingtype()->getId();
        }

        if ($this->getGuesttype() === 'Owner' && $this->getOwnerbookingtype()) {
            $arr['ownerbookingtypeid'] = $this->getOwnerbookingtype()->getId();
        }

        if ($this->getGuesttype() === 'Customer' && $this->getPropertybranding()) {
            $arr['propertybrandingid'] = $this->getPropertybranding()->getId();
        }

        if ($this->getPotentialbooking()) {
            $this->prefixToArray(
                $arr,
                'potentialbooking',
                $this->getPotentialbooking()
            );
        }

        if ($this->hasChange('webbooking')) {
            $this->prefixToArray(
                $arr,
                'webbooking',
                $this->getWebbooking()
            );
        }

        if ($this->getProvisionalbooking()) {
            $this->prefixToArray(
                $arr,
                'provisionalbooking',
                $this->getProvisionalbooking()
            );
        }

        if ($this->getConfirmedbooking()) {
            $this->prefixToArray(
                $arr,
                'confirmedbooking',
                $this->getConfirmedbooking()
            );
        }

        if ($this->getCancelledbooking()) {
            $this->prefixToArray(
                $arr,
                'cancelledbooking',
                $this->getCancelledbooking()
            );
        }

        if ($this->getPotentialcancellation()) {
            $this->prefixToArray(
                $arr,
                'potentialcancellation',
                $this->getPotentialcancellation()
            );
        }

        if ($this->getTransferredfrombooking()
            && !$this->getTransferredfrombooking()->getId()
        ) {
            $this->prefixToArray(
                $arr,
                'transferredbooking',
                $this->getTransferredfrombooking()
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
     * Check if the booking is provisional or not
     *
     * @return boolean
     */
    public function isProvisional()
    {
        return $this->getGuesttype() == 'Customer'
            && $this->getProvisionalbooking()
            && $this->getProvisionalbooking()->getId()
            && !$this->isCancelled();
    }

    /**
     * Check if the booking is confirmed or not
     *
     * @return boolean
     */
    public function isConfirmed()
    {
        return $this->getGuesttype() == 'Customer'
            && $this->getConfirmedbooking()
            && $this->getConfirmedbooking()->getId()
            && !$this->isCancelled();
    }

    /**
     * Return true/false if the booking is cancelled or not
     *
     * @return boolean
     */
    public function isCancelled()
    {
        return $this->getCancelledbooking()
            && $this->getCancelledbooking()->getId();
    }

    /**
     * Return true/false if the booking is a potential cancellation or not
     *
     * @return boolean
     */
    public function isPotentialcancellation()
    {
        return $this->getPotentialcancellation()
            && $this->getPotentialcancellation()->getId();
    }

    /**
     * Transferred To Booking
     *
     * @param Booking|string|array|\stdClass $booking Booking
     *
     * @return \tabs\apiclient\TransferredBooking
     */
    public function setTransferredtobooking($booking)
    {
        $this->transferredtobooking = TransferredBooking::factory($booking);

        return $this;
    }

    /**
     * Transferred From Booking
     *
     * @param Booking|string|array|\stdClass $booking Booking
     *
     * @return \tabs\apiclient\TransferredBooking
     */
    public function setTransferredfrombooking($booking)
    {
        $this->transferredfrombooking = TransferredBooking::factory($booking);

        return $this;
    }

    /**
     * Return true/false if the booking is transferred or not
     *
     * @return boolean
     */
    public function isTransferred()
    {
        return $this->getTransferredtobooking()
            && $this->getTransferredtobooking()->getId();
    }

    /**
     * Return true/false if the booking was transferred from another booking or not
     *
     * @return boolean
     */
    public function wasTransferred()
    {
        return $this->getTransferredfrombooking()
            && $this->getTransferredfrombooking()->getId();
    }

    /**
     * Get the total price
     *
     * @return integer
     */
    public function getTotalPrice()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the standard price
     *
     * @return integer
     */
    public function getStandardPrice()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the party size saving
     *
     * @return integer
     */
    public function getPartySizeSaving()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the special offer saving price
     *
     * @return integer
     */
    public function getSpecialOfferSaving()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the saving from promotion codes
     *
     * @return integer
     */
    public function getPromotionCodeSaving()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the basic price
     *
     * @return integer
     */
    public function getBasicPrice()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the included extra price
     *
     * @return integer
     */
    public function getIncludedExtrasPrice()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the owner price
     *
     * @return integer
     */
    public function getOwnerPrice()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the sum of the extras which change the brochure price
     *
     * @return integer
     */
    public function getChangeBrochurePriceExtraPrice()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the brochure price
     *
     * @return integer
     */
    public function getBrochurePrice()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the additional extras price
     *
     * @return integer
     */
    public function getAdditionalExtrasPrice()
    {
        return $this->_getTotalPriceElement(substr(__FUNCTION__, 3));
    }

    /**
     * Get the total outstanding on the booking
     *
     * @return float
     */
    public function getTotalOutstanding()
    {
        return $this->_getPaymentSummaryElement('total', substr(__FUNCTION__, 8));
    }

    /**
     * Get the total paid on the booking
     *
     * @return float
     */
    public function getTotalPaid()
    {
        return $this->_getPaymentSummaryElement('total', substr(__FUNCTION__, 8));
    }

    /**
     * Get the total refunded on the booking
     *
     * @return float
     */
    public function getTotalRefunded()
    {
        return $this->_getPaymentSummaryElement('total', substr(__FUNCTION__, 8));
    }

    /**
     * Get the total paid in vouchers
     *
     * @return float
     */
    public function getVouchersPaid()
    {
        $total = 0;
        foreach ($this->getVouchers() as $v) {
            $total += $v->getVoucher()->getValue();
        }
        return $total;
    }

    /**
     * Get the booking special offers
     *
     * @return StaticCollection|booking\SpecialOffer[]
     */
    public function getSpecialOffers()
    {
        $col = StaticCollection::factory(new booking\SpecialOffer());
        $offers = $this->getDataFromResponse(
            'price',
            'specialoffers'
        );

        if (is_array($offers)) {
            $col->setElements($offers);
        }

        return $col;
    }

    /**
     * Check if a booking has a promotion or not
     *
     * @return boolean
     */
    public function hasPromotion()
    {
        return $this->getSpecialOffers()->filter(function($bso) {
            return $bso->getPromotion() && $bso->getPromotion()->getId();
        })->count() > 0;
    }

    /**
     * Get the tabs2 url for this booking
     *
     * @return string
     */
    public function getTabs2Url()
    {
        return \tabs\apiclient\client\Client::getClient()->getTabs2Uri(
            '/booking/' . $this->getId()
        );
    }

    /**
     * Check if an extra can be added to the booking
     *
     * @param \tabs\apiclient\Extra $extra Extra
     *
     * @return booking\Extra
     */
    public function checkExtra(Extra $extra, $quantity = 1)
    {
        $be = new booking\Extra();
        $be->setParent($this);

        client\Client::getClient()->map(
            $be,
            $this->getUpdateUrl() . '/enquiry',
            array(
                'extraid' => $extra->getId(),
                'quantity' => $quantity
            )
        );

        if ($error = $be->getDataFromResponse('errors')) {
            throw new exception\Exception(null, $error);
        }

        return $be;
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
     * Import a sagepay payment into this booking.  Note, you will need to
     * recall the booking object to see these changes.
     *
     * @param \tabs\apiclient\SagePayPayment $payment
     *
     * @return \tabs\apiclient\Booking
     */
    public function importSagePayPayment(SagePayPayment $payment)
    {
        $url = 'sagepaypayment/' . $payment->getId() . '/import/' . $this->getId();

        if ($payment->getDonotconfirmbooking() === true) {
            $url .= '/true';
        }

        \tabs\apiclient\client\Client::getClient()->put($url);

        return $this;
    }

    /**
     * Get the enquiry information about the booking
     *
     * @return \tabs\apiclient\BookingEnquiry
     */
    public function getEnquiry()
    {
        $be = new \tabs\apiclient\BookingEnquiry();
        $be->setGuestype($this->getGuesttype())
            ->setFromdate($this->getFromdate())
            ->setTodate($this->getTodate());

        if ($this->getId()) {
            $be->setCurrentbooking($this);
        }

        if ($this->getProperty()) {
            $be->setProperty(array('id' => $this->getProperty()->getId()));
        }
        if ($this->getId() && $this->getGuesttype() === 'Customer') {
            $be->setSaleschannel($this->getSaleschannel());

            if ($this->getBranding()) {
                $be->setBranding(array('id' => $this->getBranding()->getId()));
            }
        }

        if ($this->getGuesttype() === 'Owner') {
            $be->setBranding(array('id' => $this->getProperty()->getPrimarypropertybranding()->getBranding()->getId()));
        }

        return $be->get();
    }

    // -------------------------- Private Functions ------------------------- //

    /**
     * Return an element from the total price
     *
     * @param string $property Property to get
     *
     * @return integer
     */
    private function _getTotalPriceElement($property)
    {
        $price = $this->getDataFromResponse(
            'price',
            'total',
            strtolower($property)
        );
        if ($price && is_numeric($price)) {
            return $price;
        } else {
            return 0;
        }
    }

    /**
     * Return an element from the total price
     *
     * @param string $stub     Sub object name
     * @param string $property Property to get
     *
     * @return integer
     */
    private function _getPaymentSummaryElement($stub, $property)
    {
        $price = $this->getDataFromResponse(
            'paymentsummary',
            $stub,
            strtolower($property)
        );

        if ($price && is_numeric($price)) {
            return $price;
        } else {
            return 0;
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
     * For serialisation
     *
     * @return void
     */
    public function __sleep()
    {
        return array(
            'id',
            'responsedata'
        );
    }

    /**
     * Returns the bookref
     *
     * @return string
     */
    public function getBookref()
    {
        return $this->bookref;
    }

    /**
     * Returns the branding
     *
     * @return \tabs\apiclient\Branding
     */
    public function getBranding()
    {
        return $this->branding;
    }

    /**
     * Returns the propertybranding
     *
     * @return \tabs\apiclient\property\Branding
     */
    public function getPropertybranding()
    {
        return $this->propertybranding;
    }

    /**
     * Returns the bookeddatetime
     *
     * @return \DateTime
     */
    public function getBookeddatetime()
    {
        return $this->bookeddatetime;
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
     * Returns the ignorechangedayrules
     *
     * @return boolean
     */
    public function getIgnorechangedayrules()
    {
        return $this->ignorechangedayrules;
    }

    /**
     * Returns the bypasschecks
     *
     * @return boolean
     */
    public function getBypasschecks()
    {
        return $this->bypasschecks;
    }

    /**
     * Returns the bypasspetchecks
     *
     * @return boolean
     */
    public function getBypasspetchecks()
    {
        return $this->bypasspetchecks;
    }

    /**
     * Returns the guesttype
     *
     * @return string
     */
    public function getGuesttype()
    {
        return $this->guesttype;
    }

    /**
     * Returns the assigned suppliers
     *
     * @return StaticCollection|booking\Supplier[]|property\Supplier[]
     */
    public function getSuppliers()
    {
        return $this->suppliers;
    }

    /**
     * Returns the status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the cancelled
     *
     * @return boolean
     */
    public function getCancelled()
    {
        return $this->cancelled;
    }

    /**
     * Returns the saleschannel
     *
     * @return SalesChannel
     */
    public function getSaleschannel()
    {
        return $this->saleschannel;
    }

    /**
     * Returns the currency
     *
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Returns the pricingperiod
     *
     * @return PricingPeriod
     */
    public function getPricingperiod()
    {
        return $this->pricingperiod;
    }

    /**
     * Returns the source marketing brand
     *
     * @return SourceMarketingBrand
     */
    public function getSourcemarketingbrand()
    {
        return $this->sourcemarketingbrand;
    }

    /**
     * Returns the estimatedarrivaltime
     *
     * @return string
     */
    public function getEstimatedarrivaltime()
    {
        return $this->estimatedarrivaltime;
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
     * Returns the check in text
     *
     * @return string
     */
    public function getCheckintext()
    {
        return $this->checkintext;
    }

    /**
     * Returns the check out text
     *
     * @return string
     */
    public function getCheckouttext()
    {
        return $this->checkouttext;
    }

    /**
     * Returns the promotion code
     *
     * @return string
     */
    public function getPromotioncode()
    {
        return $this->promotioncode;
    }

    /**
     * Returns the source code
     *
     * @return string
     */
    public function getSourcecode()
    {
        return $this->sourcecode;
    }

    /**
     * Returns the potentialbooking
     *
     * @return PotentialBooking
     */
    public function getPotentialbooking()
    {
        return $this->potentialbooking;
    }

    /**
     * Returns the webbooking
     *
     * @return WebBooking
     */
    public function getWebbooking()
    {
        return $this->webbooking;
    }

    /**
     * Returns the provisionalbooking
     *
     * @return ProvisionalBooking
     */
    public function getProvisionalbooking()
    {
        return $this->provisionalbooking;
    }

    /**
     * Returns the confirmed booking
     *
     * @return ConfirmedBooking
     */
    public function getConfirmedbooking()
    {
        return $this->confirmedbooking;
    }

    /**
     * Returns the cancelled booking
     *
     * @return CancelledBooking
     */
    public function getCancelledbooking()
    {
        return $this->cancelledbooking;
    }

    /**
     * Returns the potential cancellation
     *
     * @return PotentialCancellation
     */
    public function getPotentialcancellation()
    {
        return $this->potentialcancellation;
    }

    /**
     * Returns the Ownerpaymentsummary
     *
     * @return OwnerPaymentSummary
     */
    public function getOwnerpaymentsummary()
    {
        return $this->ownerpaymentsummary;
    }

    /**
     * Returns the booking type for agency bookings
     *
     * @return AgencyBookingType
     */
    public function getAgencybookingtype()
    {
        return $this->agencybookingtype;
    }

    /**
     * Returns the booking type for owner bookings
     *
     * @return OwnerBookingType
     */
    public function getOwnerbookingtype()
    {
        return $this->ownerbookingtype;
    }

    /**
     * Returns the transferred booking
     *
     * @return TransferredBooking
     */
    public function getTransferredtobooking()
    {
        return $this->transferredtobooking;
    }

    /**
     * Returns the transferred booking
     *
     * @return TransferredBooking
     */
    public function getTransferredfrombooking()
    {
        return $this->transferredfrombooking;
    }

    /**
     * Get the override status flag
     *
     * @return boolean
     */
    public function getOverridestatus()
    {
        return $this->overridestatus;
    }

    /**
     * Returns the propertyid
     *
     * @return int
     */
    public function getPropertyid()
    {
        return $this->propertyid;
    }
}