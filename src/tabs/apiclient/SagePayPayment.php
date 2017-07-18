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
 * @method float getAmount() Returns the amount
 * @method SagePayPayment setAmount(float $var) Sets the amount
 * 
 * @method Currency       getCurrency()              Returns the currency
 * @method PaymentMethod  getPaymentmethod()         Returns the paymentmethod
 * @method actor\Address  getAddress()               Returns the address
 * @method Customer       getCustomer()              Returns the booking
 * @method Booking        getBooking()               Returns the booking
 * @method float          getBookingamount()         Returns the bookingamount
 * @method float          getSecuritydepositamount() Returns the securitydepositamount
 * @method string         getCallbackurl()           Returns the callback url
 * @method string         getFailureurl()            Returns the failure url
 * @method string         getPaymenttype()           Returns the payment type
 * 
 * @method SagePayPayment setBookingamount(float $var)         Sets the bookingamount
 * @method SagePayPayment setSecuritydepositamount(float $var) Sets the securitydepositamount
 * @method SagePayPayment setCallbackurl(string $var)          Set callback url 
 * @method SagePayPayment setFailureurl(string $var)           Set failure url 
 * @method SagePayPayment setPaymenttype(string $var)          Set payment type
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
     * Payment type.  Can be either PAYMENT OR DEFERRED.
     * 
     * @var string
     */
    protected $paymenttype = 'PAYMENT';

    // -------------------- Public Functions -------------------- //

    /**
     * Set the currency
     *
     * @param stdclass|array|\tabs\apiclient\Currency $currency The Currency
     *
     * @return SagePayPayment
     */
    public function setCurrency($currency)
    {
        $this->currency = \tabs\apiclient\Currency::factory($currency);

        return $this;
    }

    /**
     * Set the customer
     *
     * @param stdclass|array|\tabs\apiclient\Customer $customer Customer
     *
     * @return SagePayPayment
     */
    public function setCustomer($customer)
    {
        $this->customer = \tabs\apiclient\Customer::factory($customer);

        return $this;
    }

    /**
     * Set the paymentmethod
     *
     * @param stdclass|array|\tabs\apiclient\PaymentMethod $paymentmethod The Paymentmethod
     *
     * @return SagePayPayment
     */
    public function setPaymentmethod($paymentmethod)
    {
        $this->paymentmethod = \tabs\apiclient\PaymentMethod::factory($paymentmethod);

        return $this;
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
     * Set the booking
     *
     * @param stdclass|array|\tabs\apiclient\Booking $booking The Booking
     *
     * @return SagePayPayment
     */
    public function setBooking($booking)
    {
        $this->booking = \tabs\apiclient\Booking::factory($booking);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'amount' => $this->getAmount(),
            'callbackurl' => $this->getCallbackurl(),
            'failureurl' => $this->getFailureurl(),
            'paymenttype' => $this->getPaymenttype()
        );
        
        if ($this->getPaymentmethod()) {
            $arr['paymentmethodid'] = $this->getPaymentmethod()->getId();
        }
        
        if ($this->getCurrency()) {
            $arr['currencyid'] = $this->getCurrency()->getId();
        }
        
        if ($this->getCustomer()) {
            $arr['customerid'] = $this->getCustomer()->getId();
        }
        
        if ($this->getAddress()) {
            if (!$this->getAddress()->getId()) {
                $arr = array_merge($arr, $this->getAddress()->toArray());
            } else {
                $arr['contactdetailpostalid'] = $this->getAddress()->getId();
            }
        }
        
        if ($this->getBooking()) {
            $arr['bookingid'] = $this->getBooking()->getId();
        }
        
        if ($this->getBookingamount() > 0) {
            $arr['bookingamount'] = $this->getBookingamount();
        }
        
        if ($this->getSecuritydepositamount() > 0) {
            $arr['securitydepositamount'] = $this->getBookingamount();
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
                (integer) $id
            );
        }
        
        return (string) $req->getBody();
    }
}