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
 * @method string  getGuesttype() Returns the guesttype
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
 * @method SourceMarketingBrand getSourcemarketingbrand() Returns the source marketing brand
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
 * @method string getPromotioncode() Returns the promotion code
 * @method Booking setPromotioncode(string $var) Sets the promotion code
 *
 * @method PotentialBooking getPotentialbooking() Returns the potentialbooking
 *
 * @method WebBooking getWebbooking() Returns the webbooking
 *
 * @method ProvisionalBooking getProvisionalbooking() Returns the provisionalbooking
 *
 * @method ConfirmedBooking getConfirmedbooking() Returns the confirmed booking
 *
 * @method CancelledBooking getCancelledbooking() Returns the cancelled booking
 *
 * @method Collection|booking\SecurityDeposit[] getSecuritydeposits() Returns the securitydeposits
 *
 * @method booking\SecurityDeposit[] getSecuritydeposit() Returns booking securitydeposit
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
 * @method OwnerPaymentSummary getOwnerpaymentsummary() Returns the Ownerpaymentsummary
 *
 * @method AgencyBookingType getAgencybookingtype() Returns the booking type for agency bookings
 *
 * @method TransferredBooking getTransferredtobooking() Returns the transferred booking
 *
 * @method TransferredBooking getTransferredfrombooking() Returns the transferred booking
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
     * Promotion code
     *
     * @var string
     */
    protected $promotioncode = '';

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
        $this->ownerpaymentsummary = new OwnerPaymentSummary();

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
     * Set the source marketing brand
     *
     * @param stdclass|array|SourceMarketingBrand $smb The Source
     *
     * @return Booking
     */
    public function setSourcemarketingbrand($smb)
    {
        $this->sourcemarketingbrand = SourceMarketingBrand::factory($smb);

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
     * Set the AgencyBookingType on the property
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
                    $arr = array_merge(
                        $arr,
                        $this->prefixToArray(
                            'note_',
                            $bookingnote->getNote()
                        )
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
                $arr = array_merge(
                    $arr,
                    $this->prefixToArray(
                        'securitydeposit_',
                        $this->getSecuritydeposit()
                    )
                );
            }
        }

        if ($this->getGuesttype() !== 'Customer' && $this->getProperty()) {
            $arr['propertyid'] = $this->getProperty()->getId();
        }

        if ($this->getSourcemarketingbrand()) {
            $arr['sourcemarketingbrandid'] = $this->getSourcemarketingbrand()->getId();
        } else if ($this->getSource()) {
            $arr['sourceid'] = $this->getSource()->getId();
        }

        if ($this->getGuesttype() === 'Agency' && $this->getAgencybookingtype()) {
            $arr['agencybookingtypeid'] = $this->getAgencybookingtype()->getId();
        }

        if ($this->getGuesttype() === 'Customer' && $this->getPropertybranding()) {
            $arr['propertybrandingid'] = $this->getPropertybranding()->getId();
        }

        if ($this->getPotentialbooking()) {
            $arr = array_merge(
                $arr,
                $this->prefixToArray(
                    'potentialbooking_',
                    $this->getPotentialbooking()
                )
            );
        }

        if ($this->getWebbooking()) {
            $arr = array_merge(
                $arr,
                $this->prefixToArray('webbooking_', $this->getWebbooking())
            );
        }

        if ($this->getProvisionalbooking()) {
            $arr = array_merge(
                $arr,
                $this->prefixToArray(
                    'provisionalbooking_',
                    $this->getProvisionalbooking()
                )
            );
        }

        if ($this->getConfirmedbooking()) {
            $arr = array_merge(
                $arr,
                $this->prefixToArray(
                    'confirmedbooking_',
                    $this->getConfirmedbooking()
                )
            );
        }

        if ($this->getCancelledbooking()) {
            $arr = array_merge(
                $arr,
                $this->prefixToArray(
                    'cancelledbooking_',
                    $this->getCancelledbooking()
                )
            );
        }

        if ($this->getTransferredfrombooking()
            && !$this->getTransferredfrombooking()->getId()
        ) {
            $arr = array_merge(
                $arr,
                $this->prefixToArray(
                    'transferredbooking',
                    $this->getTransferredfrombooking()
                )
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
        $this->transferredtobooking = TransferredBooking::factory($booking);

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
}