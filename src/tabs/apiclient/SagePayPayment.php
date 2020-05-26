<?php

namespace tabs\apiclient;
use tabs\apiclient\Base;

/**
 * Tabs Rest API SagePayPayment object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method SagePayPayment setAmount(float $var) Sets the amount
 *
 *
 * @method SagePayPayment setBookingamount(float $var)         Sets the bookingamount
 * @method SagePayPayment setSecuritydepositamount(float $var) Sets the securitydepositamount
 * @method SagePayPayment setCallbackurl(string $var)          Set callback url
 * @method SagePayPayment setFailureurl(string $var)           Set failure url
 * @method SagePayPayment setPaymenttype(string $var)          Set payment type
 * @method SagePayPayment setRepeatpayment(boolean $var)       Set the repeat payment flag
 * @method SagePayPayment setBypassamountdue(boolean $var)     Set the bypass amount due flag
 * @method SagePayPayment setPaymentmethod(PaymentMethod $var) Set the payment method
 * @method SagePayPayment setCurrency(Currency $var)           Set the currency
 * @method SagePayPayment setCustomer(Customer $var)           Set the customer
 * @method SagePayPayment setOwner(Owner $var)                 Set the owner
 * @method SagePayPayment setBooking(Booking $var)             Set the booking
 * @method SagePayPayment setDonotconfirmbooking(boolean $var) Sets the donotconfirmbooking
 */
class SagePayPayment extends Base
{
    /**
     * Amount
     *
     * @var float
     */
    protected $amount = 0;

    /**
     * Currency
     *
     * @var \tabs\apiclient\Currency
     */
    protected $currency;

    /**
     * Paymentmethod
     *
     * @var \tabs\apiclient\PaymentMethod
     */
    protected $paymentmethod;

    /**
     * Address
     *
     * @var \tabs\apiclient\actor\Address
     */
    protected $address;

    /**
     * Booking
     *
     * @var \tabs\apiclient\Booking
     */
    protected $booking;

    /**
     * Customer
     *
     * @var \tabs\apiclient\Customer
     */
    protected $customer;

    /**
     * Customer
     *
     * @var \tabs\apiclient\Owner
     */
    protected $owner;

    /**
     * Bookingamount
     *
     * @var float
     */
    protected $bookingamount = 0;

    /**
     * Securitydepositamount
     *
     * @var float
     */
    protected $securitydepositamount = 0;

    /**
     * Callback url
     *
     * @var string
     */
    protected $callbackurl = '';

    /**
     * Failure url
     *
     * @var string
     */
    protected $failureurl = '';

    /**
     * Continuous authority bool
     *
     * @var boolean
     */
    protected $repeatpayment = false;

    /**
     * Bypass amount due bool
     *
     * @var boolean
     */
    protected $bypassamountdue = false;

    /**
     * Payment type.  Can be either PAYMENT OR DEFERRED.
     *
     * @var string
     */
    protected $paymenttype = 'PAYMENT';

    /**
     * Donotconfirmbooking
     *
     * @var boolean
     */
    protected $donotconfirmbooking = false;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->paymentmethod = new PaymentMethod();
        $this->currency = new Currency();
        $this->customer = new Customer();
        $this->owner = new Owner();
        $this->booking = new Booking();
    }

    /**
     * Set the address
     *
     * @param stdclass|array|\tabs\apiclient\actor\Address $address The Address
     *
     * @return SagePayPayment
     */
    public function setAddress($address)
    {
        $this->address = \tabs\apiclient\actor\Address::factory($address);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getAddress()) {
            if (!$this->getAddress()->getId()) {
                $arr = array_merge($arr, $this->getAddress()->toArray());
            } else {
                $arr['contactdetailpostalid'] = $this->getAddress()->getId();
            }
        }

        return $arr;
    }

    /**
     * Return the payment details from the sagepay api
     *
     * @return stdClass
     */
    public function getDetails()
    {
        return self::getJson(
            \tabs\apiclient\client\Client::getClient()->get(
                $this->getUpdateUrl() . '/detail'
            )
        );
    }

    /**
     * Release the payment
     *
     * @return \tabs\apiclient\SagePayPayment
     */
    public function releasePayment()
    {
        \tabs\apiclient\client\Client::getClient()->put(
            $this->getUpdateUrl() . '/release'
        );

        return $this;
    }

    /**
     * Perform a create request
     *
     * @throws \tabs\apiclient\client\Exception
     *
     * @return string
     */
    public function create()
    {
        // Perform post request
        $req = \tabs\apiclient\client\Client::getClient()->post(
            'ecommercepayment',
            $this->toArray()
        );

        // Set the id of the element
        $id = self::getRequestId($req);
        if ($id) {
            $this->setId(
                $id
            );
        }

        return (string) $req->getBody();
    }

    /**
     * Returns the amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
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
     * Returns the paymentmethod
     *
     * @return PaymentMethod
     */
    public function getPaymentmethod()
    {
        return $this->paymentmethod;
    }

    /**
     * Returns the address
     *
     * @return actor\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the booking
     *
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Returns the booking
     *
     * @return Booking
     */
    public function getBooking()
    {
        return $this->booking;
    }

    /**
     * Returns the bookingamount
     *
     * @return float
     */
    public function getBookingamount()
    {
        return $this->bookingamount;
    }

    /**
     * Returns the securitydepositamount
     *
     * @return float
     */
    public function getSecuritydepositamount()
    {
        return $this->securitydepositamount;
    }

    /**
     * Returns the callback url
     *
     * @return string
     */
    public function getCallbackurl()
    {
        return $this->callbackurl;
    }

    /**
     * Returns the failure url
     *
     * @return string
     */
    public function getFailureurl()
    {
        return $this->failureurl;
    }

    /**
     * Returns the payment type
     *
     * @return string
     */
    public function getPaymenttype()
    {
        return $this->paymenttype;
    }

    /**
     * Returns the repeat payment bool
     *
     * @return boolean
     */
    public function getRepeatpayment()
    {
        return $this->repeatpayment;
    }

    /**
     * Returns the bypass amount due flag
     *
     * @return boolean
     */
    public function getBypassamountdue()
    {
        return $this->bypassamountdue;
    }

    /**
     * Returns the donotconfirmbooking
     *
     * @return boolean
     */
    public function getDonotconfirmbooking()
    {
        return $this->donotconfirmbooking;
    }
}