<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Voucher object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Voucher setGuid(string $var) Sets the guid
 * @method Voucher setValue(float $var) Sets the value
 * @method Voucher setPaidforbyactor(\tabs\apiclient\Customer $var) Sets the paidforbyactor
 * @method Voucher setForusebyactor(\tabs\apiclient\Customer $var) Sets the forusebyactor
 * @method Voucher setCreateddatetime(\DateTime $var) Sets the createddatetime
 * @method Voucher setCancelleddatetime(\DateTime $var) Sets the cancelleddatetime
 * @method Voucher setUseddatetime(\DateTime $var) Sets the useddatetime
 * @method Voucher setUsedbyactor(\tabs\apiclient\Customer $var) Sets the usedbyactor
 * @method Voucher setExpirydate(\DateTime $var) Sets the expirydate
 * @method Voucher setExpired(boolean $var) Sets the expired flag
 * @method Voucher setRefundable(boolean $var) Sets the refundable flag
 * @method Voucher setVouchersource(VoucherSource $var) Set the voucher source
 *
 * @method Collection|BookingPeriod[] getBookingperiods() Returns the booking periods
 * @method Collection|HolidayPeriod[] getHolidayperiods() Returns the holiday periods
 * @method Collection|Restriction[] getRestrictions() Returns the restrictions for the voucher
 */
class Voucher extends Builder
{
    /**
     * @var string
     */
    protected $guid;

    /**
     * @var float
     */
    protected $value;

    /**
     * @var \tabs\apiclient\Customer
     */
    protected $paidforbyactor;

    /**
     * @var \tabs\apiclient\Customer
     */
    protected $forusebyactor;

    /**
     * @var \DateTime
     */
    protected $createddatetime;

    /**
     * @var \DateTime
     */
    protected $cancelleddatetime;

    /**
     * @var \DateTime
     */
    protected $useddatetime;

    /**
     * @var \tabs\apiclient\Customer
     */
    protected $usedbyactor;

    /**
     * @var \DateTime
     */
    protected $expirydate;

    /**
     * @var boolean
     */
    protected $expired;

    /**
     * @var boolean
     */
    protected $refundable;

    /**
     * @var \tabs\apiclient\voucher\BookingPeriod[]\tabs\apiclient\Collection
     */
    protected $bookingperiods;

    /**
     * @var \tabs\apiclient\voucher\HolidayPeriod[]\tabs\apiclient\Collection
     */
    protected $holidayperiods;

    /**
     * @var \tabs\apiclient\voucher\Restriction[]\tabs\apiclient\Collection
     */
    protected $restrictions;

    /**
     * @var \tabs\apiclient\VoucherSource
     */
    protected $vouchersource;

    /**
     * @var \tabs\apiclient\Booking
     */
    protected $frombooking;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->paidforbyactor = new \tabs\apiclient\Customer();
        $this->forusebyactor = new \tabs\apiclient\Customer();
        $this->usedbyactor = new \tabs\apiclient\Customer();
        $this->createddatetime = new \DateTime();
        $this->cancelleddatetime = new \DateTime();
        $this->useddatetime = new \DateTime();
        $this->expirydate = new \DateTime();
        $this->vouchersource = new \tabs\apiclient\VoucherSource();

        $this->bookingperiods = Collection::factory(
            'bookingperiod',
            new voucher\BookingPeriod(),
            $this
        );

        $this->holidayperiods = Collection::factory(
            'holidayperiod',
            new voucher\HolidayPeriod(),
            $this
        );

        $this->restrictions = Collection::factory(
            'restriction',
            new voucher\Restriction(),
            $this
        );
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return \tabs\apiclient\Customer
     */
    public function getPaidforbyactor()
    {
        return $this->paidforbyactor;
    }

    /**
     * @return \tabs\apiclient\Customer
     */
    public function getForusebyactor()
    {
        return $this->forusebyactor;
    }

    /**
     * @return \DateTime
     */
    public function getCreateddatetime()
    {
        return $this->createddatetime;
    }

    /**
     * @return \DateTime
     */
    public function getCancelleddatetime()
    {
        return $this->cancelleddatetime;
    }

    /**
     * @return \DateTime
     */
    public function getUseddatetime()
    {
        return $this->useddatetime;
    }

    /**
     * @return \tabs\apiclient\Customer
     */
    public function getUsedbyactor()
    {
        return $this->usedbyactor;
    }

    /**
     * @return \DateTime
     */
    public function getExpirydate()
    {
        return $this->expirydate;
    }

    /**
     * @return boolean
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * @return boolean
     */
    public function getRefundable()
    {
        return $this->refundable;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        return $arr;
    }

    /**
     * @return \tabs\apiclient\VoucherSource
     */
    public function getVouchersource()
    {
        return $this->vouchersource;
    }

    /**
     * @return \tabs\apiclient\Booking
     */
    public function getFrombooking()
    {
        return $this->frombooking;
    }

    /**
     * @param Booking|Array $booking Booking
     *
     * @return $this
     */
    public function setFrombooking($booking)
    {
        $this->frombooking = new Booking();
        $this->setObjectProperty($this, 'frombooking', $booking);
        $this->addChange('frombooking', $this->frombooking);

        return $this;
    }
}