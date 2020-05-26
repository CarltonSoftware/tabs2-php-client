<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API OwnerCharge object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method OwnerCharge setType(string $var) Sets the type
 * @method OwnerCharge setBookeddate(\DateTime $var) Sets the bookeddate
 * @method OwnerCharge setWorkdonedate(\DateTime $var) Sets the workdonedate
 * @method OwnerCharge setOwnerchargecode(\tabs\apiclient\OwnerChargeCode $var) Sets the ownerchargecode
 * @method OwnerCharge setRecharge(boolean $var) Sets the recharge
 * @method OwnerCharge setInactive(boolean $var) Sets the inactive
 * @method OwnerCharge setAllowableagainsttax(boolean $var) Sets the allowableagainsttax
 * @method OwnerCharge setShowonallownerpaymentruns(boolean $var) Sets the showonallownerpaymentruns
 * @method OwnerCharge setDescription(string $var) Sets the description
 * @method OwnerCharge setAmountnet(float $var) Sets the amountnet
 * @method OwnerCharge setAmountvat(float $var) Sets the amountvat
 * @method OwnerCharge setVatband(\tabs\apiclient\Vatband $var) Sets the vatband
 * @method OwnerCharge setExchangerate(\tabs\apiclient\ExchangeRate $var) Sets the exchangerate
 * @method OwnerCharge setCreated(\DateTime $var) Sets the created
 * @method OwnerCharge setCreatedby(\tabs\apiclient\Tabsuser $var) Sets the createdby
 * @method OwnerCharge setCancelled(\DateTime $var) Sets the cancelled
 * @method OwnerCharge setCancelledby(\tabs\apiclient\Tabsuser $var) Sets the cancelledby
 * @method OwnerCharge setLastupdated(\DateTime $var) Sets the lastupdated
 * @method OwnerCharge setSupplierpaiddate(\DateTime $var) Sets the supplierpaiddate
 * @method OwnerCharge setInvoicenumber(string $var) Sets the invoicenumber
 * @method OwnerCharge setInvoicedate(\DateTime $var) Sets the invoicedate
 * @method OwnerCharge setChequenumber(string $var) Sets the chequenumber
 * @method OwnerCharge setBooking(\tabs\apiclient\Booking $var) Sets the booking
 */
class OwnerCharge extends Builder
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var \DateTime
     */
    protected $bookeddate;

    /**
     * @var \DateTime
     */
    protected $workdonedate;

    /**
     * @var \tabs\apiclient\OwnerChargeCode
     */
    protected $ownerchargecode;

    /**
     * @var boolean
     */
    protected $recharge;

    /**
     * @var boolean
     */
    protected $inactive;

    /**
     * @var boolean
     */
    protected $allowableagainsttax;

    /**
     * @var boolean
     */
    protected $showonallownerpaymentruns;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $amountnet;

    /**
     * @var float
     */
    protected $amountvat;

    /**
     * @var \tabs\apiclient\Vatband
     */
    protected $vatband;

    /**
     * @var \tabs\apiclient\ExchangeRate
     */
    protected $exchangerate;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @var \tabs\apiclient\Tabsuser
     */
    protected $createdby;

    /**
     * @var \DateTime
     */
    protected $cancelled;

    /**
     * @var \tabs\apiclient\Tabsuser
     */
    protected $cancelledby;

    /**
     * @var \DateTime
     */
    protected $lastupdated;

    /**
     * @var \DateTime
     */
    protected $supplierpaiddate;

    /**
     * @var string
     */
    protected $invoicenumber;

    /**
     * @var \DateTime
     */
    protected $invoicedate;

    /**
     * @var string
     */
    protected $chequenumber;

    /**
     * @var \tabs\apiclient\Booking
     */
    protected $booking;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->bookeddate = new \DateTime();
        $this->workdonedate = new \DateTime();
        $this->ownerchargecode = new \tabs\apiclient\OwnerChargeCode();
        $this->vatband = new \tabs\apiclient\Vatband();
        $this->exchangerate = new \tabs\apiclient\ExchangeRate();
        $this->created = new \DateTime();
        $this->createdby = new \tabs\apiclient\TabsUser();
        $this->cancelled = new \DateTime();
        $this->cancelledby = new \tabs\apiclient\TabsUser();
        $this->lastupdated = new \DateTime();
        $this->supplierpaiddate = new \DateTime();
        $this->invoicedate = new \DateTime();
        $this->booking = new \tabs\apiclient\Booking();
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return \DateTime
     */
    public function getBookeddate()
    {
        return $this->bookeddate;
    }

    /**
     * @return \DateTime
     */
    public function getWorkdonedate()
    {
        return $this->workdonedate;
    }

    /**
     * @return \tabs\apiclient\OwnerChargeCode
     */
    public function getOwnerchargecode()
    {
        return $this->ownerchargecode;
    }

    /**
     * @return boolean
     */
    public function getRecharge()
    {
        return $this->recharge;
    }

    /**
     * @return boolean
     */
    public function getInactive()
    {
        return $this->inactive;
    }

    /**
     * @return boolean
     */
    public function getAllowableagainsttax()
    {
        return $this->allowableagainsttax;
    }

    /**
     * @return boolean
     */
    public function getShowonallownerpaymentruns()
    {
        return $this->showonallownerpaymentruns;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getAmountnet()
    {
        return $this->amountnet;
    }

    /**
     * @return float
     */
    public function getAmountvat()
    {
        return $this->amountvat;
    }

    /**
     * @return \tabs\apiclient\Vatband
     */
    public function getVatband()
    {
        return $this->vatband;
    }

    /**
     * @return \tabs\apiclient\ExchangeRate
     */
    public function getExchangerate()
    {
        return $this->exchangerate;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return \tabs\apiclient\Tabsuser
     */
    public function getCreatedby()
    {
        return $this->createdby;
    }

    /**
     * @return \DateTime
     */
    public function getCancelled()
    {
        return $this->cancelled;
    }

    /**
     * @return \tabs\apiclient\Tabsuser
     */
    public function getCancelledby()
    {
        return $this->cancelledby;
    }

    /**
     * @return \tabs\apiclient\Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return \DateTime
     */
    public function getLastupdated()
    {
        return $this->lastupdated;
    }

    /**
     * @return \DateTime
     */
    public function getSupplierpaiddate()
    {
        return $this->supplierpaiddate;
    }

    /**
     * @return string
     */
    public function getInvoicenumber()
    {
        return $this->invoicenumber;
    }

    /**
     * @return \DateTime
     */
    public function getInvoicedate()
    {
        return $this->invoicedate;
    }

    /**
     * @return string
     */
    public function getChequenumber()
    {
        return $this->chequenumber;
    }

    /**
     * @return \tabs\apiclient\Booking
     */
    public function getBooking()
    {
        return $this->booking;
    }
}