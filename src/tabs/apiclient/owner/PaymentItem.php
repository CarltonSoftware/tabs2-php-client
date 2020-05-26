<?php

namespace tabs\apiclient\owner;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PaymentItem object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PaymentItem setAgencyincome(float $var) Sets the agencyincome
 * @method PaymentItem setAgencyvat(float $var) Sets the agencyvat
 * @method PaymentItem setOwnerincome(float $var) Sets the ownerincome
 * @method PaymentItem setOwnervat(float $var) Sets the ownervat
 * @method PaymentItem setTotalbasic(float $var) Sets the totalbasic
 * @method PaymentItem setTotalprice(float $var) Sets the totalprice
 * @method PaymentItem setVatrate(\tabs\apiclient\Vatrate $var) Sets the vatrate
 * @method PaymentItem setReason(string $var) Sets the reason
 * @method PaymentItem setType(string $var) Sets the type
 * @method PaymentItem setBooking(\tabs\apiclient\Booking $var) Sets the booking
 * @method PaymentItem setOwnercharge(\tabs\apiclient\OwnerCharge $var) Sets the ownercharge
 * @method PaymentItem setDescription(string $var) Sets the description
 * @method PaymentItem setBookingfromdate(\DateTime $var) Sets the bookingfromdate
 * @method PaymentItem setTodate(\DateTime $var) Sets the todate
 * @method PaymentItem setFromdate(\DateTime $var) Sets the fromdate
 * @method PaymentItem setBookingbrand(\tabs\apiclient\BookingBrand $var) Sets the bookingbrand
 */
class PaymentItem extends Builder
{
    /**
     * @var float
     */
    protected $agencyincome;

    /**
     * @var float
     */
    protected $agencyvat;

    /**
     * @var float
     */
    protected $ownerincome;

    /**
     * @var float
     */
    protected $ownervat;

    /**
     * @var float
     */
    protected $totalbasic;

    /**
     * @var float
     */
    protected $totalprice;

    /**
     * @var \tabs\apiclient\Vatrate
     */
    protected $vatrate;

    /**
     * @var string
     */
    protected $reason;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var \tabs\apiclient\Booking
     */
    protected $booking;

    /**
     * @var \tabs\apiclient\OwnerCharge
     */
    protected $ownercharge;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTime
     */
    protected $bookingfromdate;

    /**
     * @var \DateTime
     */
    protected $todate;

    /**
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * @var \tabs\apiclient\BookingBrand
     */
    protected $bookingbrand;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->vatrate = new \tabs\apiclient\Vatrate();
        $this->booking = new \tabs\apiclient\Booking();
        $this->ownercharge = new \tabs\apiclient\OwnerCharge();
        $this->bookingfromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->fromdate = new \DateTime();
        $this->bookingbrand = new \tabs\apiclient\BookingBrand();
        parent::__construct($id);
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
     * @return float
     */
    public function getAgencyincome()
    {
        return $this->agencyincome;
    }

    /**
     * @return float
     */
    public function getAgencyvat()
    {
        return $this->agencyvat;
    }

    /**
     * @return float
     */
    public function getOwnerincome()
    {
        return $this->ownerincome;
    }

    /**
     * @return float
     */
    public function getOwnervat()
    {
        return $this->ownervat;
    }

    /**
     * @return float
     */
    public function getTotalbasic()
    {
        return $this->totalbasic;
    }

    /**
     * @return float
     */
    public function getTotalprice()
    {
        return $this->totalprice;
    }

    /**
     * @return \tabs\apiclient\Vatrate
     */
    public function getVatrate()
    {
        return $this->vatrate;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return \tabs\apiclient\Booking
     */
    public function getBooking()
    {
        return $this->booking;
    }

    /**
     * @return \tabs\apiclient\OwnerCharge
     */
    public function getOwnercharge()
    {
        return $this->ownercharge;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return \DateTime
     */
    public function getBookingfromdate()
    {
        return $this->bookingfromdate;
    }

    /**
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * @return \tabs\apiclient\BookingBrand
     */
    public function getBookingbrand()
    {
        return $this->bookingbrand;
    }
}