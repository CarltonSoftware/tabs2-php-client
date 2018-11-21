<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\Currency;
use tabs\apiclient\OwnerChargeCode;

/**
 * Tabs Rest API SecurityDeposit object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method SecurityDeposit setBookedfromdate(\DateTime $var) Sets the bookedfromdate
 * 
 * @method SecurityDeposit setBookedtodate(\DateTime $var) Sets the bookedtodate
 * 
 * @method SecurityDeposit setHolidayfromdate(\DateTime $var) Sets the holidayfromdate
 * 
 * @method SecurityDeposit setHolidaytodate(\DateTime $var) Sets the holidaytodate
 * 
 * @method SecurityDeposit setAmount(integer $var) Sets the amount
 * 
 * @method SecurityDeposit setDaysduein(integer $var) Sets the daysindue
 * 
 * @method SecurityDeposit setDaysdueout(integer $var) Sets the daysoutdue
 * 
 * @method SecurityDeposit setRefundable(boolean $var) Sets the refundable
 * 
 * @method SecurityDeposit setPeradult(boolean $var) Sets the peradult
 * 
 * @method SecurityDeposit setPerchild(boolean $var) Sets the perchild
 * 
 * @method SecurityDeposit setPerinfant(boolean $var) Sets the perinfant
 * 
 * @method SecurityDeposit setPerperiod(boolean $var) Sets the perperiod
 * 
 * @method SecurityDeposit setPricingperiod(string $var) Sets the pricingperiod
 * 
 * @method SecurityDeposit setMinimumdays(integer $var) Sets the minimumdays
 * 
 * @method SecurityDeposit setMaximumdays(integer $var) Sets the maximumdays
 * 
 * @method SecurityDeposit setMaximumdaysbeforeholiday(integer $var) Sets the maximumdays beforeholiday
 * 
 * @method SecurityDeposit setComments(string $var) Sets the comments
 * 
 * @method SecurityDeposit setOwnerchargeamount(integer $var) Sets the ownerchargeamount
 * 
 * @method SecurityDeposit setDescription(string $var) Set the description
 * 
 * @method SecurityDeposit setDefaultforperiod(boolean $var) Set defaultforperiod
 */
class SecurityDeposit extends Builder
{
    /**
     * Bookedfromdate
     *
     * @var \DateTime
     */
    protected $bookedfromdate;

    /**
     * Bookedtodate
     *
     * @var \DateTime
     */
    protected $bookedtodate;

    /**
     * Holidayfromdate
     *
     * @var \DateTime
     */
    protected $holidayfromdate;

    /**
     * Holidaytodate
     *
     * @var \DateTime
     */
    protected $holidaytodate;

    /**
     * Amount
     *
     * @var integer
     */
    protected $amount;

    /**
     * Currency
     *
     * @var Currency
     */
    protected $currency;

    /**
     * Days in due
     *
     * @var integer
     */
    protected $daysduein;

    /**
     * Days out due
     *
     * @var integer
     */
    protected $daysdueout;

    /**
     * Refundable
     *
     * @var boolean
     */
    protected $refundable;

    /**
     * Peradult
     *
     * @var boolean
     */
    protected $peradult;

    /**
     * Perchild
     *
     * @var boolean
     */
    protected $perchild;

    /**
     * Perinfant
     *
     * @var boolean
     */
    protected $perinfant;

    /**
     * Perperiod
     *
     * @var boolean
     */
    protected $perperiod;

    /**
     * Pricingperiod
     *
     * @var string
     */
    protected $pricingperiod;

    /**
     * Minimum days
     *
     * @var integer
     */
    protected $minimumdays;

    /**
     * Maximum days
     *
     * @var integer
     */
    protected $maximumdays;

    /**
     * Maximum days before holiday
     *
     * @var integer
     */
    protected $maximumdaysbeforeholiday;

    /**
     * Comments
     *
     * @var string
     */
    protected $comments;

    /**
     * Owner charge code
     *
     * @var OwnerChargeCode
     */
    protected $ownerchargecode;

    /**
     * Owner charge amount
     *
     * @var integer
     */
    protected $ownerchargeamount;
    
    /**
     * Default for period?
     *
     * @var boolean
     */
    protected $defaultforperiod;

    /**
     * Description
     * 
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->bookedfromdate = new \DateTime();
        $this->bookedtodate = new \DateTime();
        $this->holidayfromdate = new \DateTime();
        $this->holidaytodate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|Currency $currency The Currency
     *
     * @return SecurityDeposit
     */
    public function setCurrency($currency)
    {
        $this->currency = Currency::factory($currency);

        return $this;
    }

    /**
     * Set the ownerchargecode
     *
     * @param stdclass|array|OwnerChargeCode $ownerchargecode The Ownerchargecode
     *
     * @return SecurityDeposit
     */
    public function setOwnerchargecode($ownerchargecode)
    {
        $this->ownerchargecode = OwnerChargeCode::factory($ownerchargecode);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * Returns the bookedfromdate
     *
     * @return \DateTime
     */
    public function getBookedfromdate()
    {
        return $this->bookedfromdate;
    }

    /**
     * Returns the bookedtodate
     *
     * @return \DateTime
     */
    public function getBookedtodate()
    {
        return $this->bookedtodate;
    }

    /**
     * Returns the holidayfromdate
     *
     * @return \DateTime
     */
    public function getHolidayfromdate()
    {
        return $this->holidayfromdate;
    }

    /**
     * Returns the holidaytodate
     *
     * @return \DateTime
     */
    public function getHolidaytodate()
    {
        return $this->holidaytodate;
    }

    /**
     * Returns the amount
     *
     * @return integer
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
     * Returns the daysindue
     *
     * @return integer
     */
    public function getDaysduein()
    {
        return $this->daysduein;
    }

    /**
     * Returns the daysoutdue
     *
     * @return integer
     */
    public function getDaysdueout()
    {
        return $this->daysdueout;
    }

    /**
     * Returns the refundable
     *
     * @return boolean
     */
    public function getRefundable()
    {
        return $this->refundable;
    }

    /**
     * Returns the peradult
     *
     * @return boolean
     */
    public function getPeradult()
    {
        return $this->peradult;
    }

    /**
     * Returns the perchild
     *
     * @return boolean
     */
    public function getPerchild()
    {
        return $this->perchild;
    }

    /**
     * Returns the perinfant
     *
     * @return boolean
     */
    public function getPerinfant()
    {
        return $this->perinfant;
    }

    /**
     * Returns the perperiod
     *
     * @return boolean
     */
    public function getPerperiod()
    {
        return $this->perperiod;
    }

    /**
     * Returns the pricingperiod
     *
     * @return string
     */
    public function getPricingperiod()
    {
        return $this->pricingperiod;
    }

    /**
     * Returns the minimumdays
     *
     * @return integer
     */
    public function getMinimumdays()
    {
        return $this->minimumdays;
    }

    /**
     * Returns the maximumdays
     *
     * @return integer
     */
    public function getMaximumdays()
    {
        return $this->maximumdays;
    }

    /**
     * Returns the maximumdays beforeholiday
     *
     * @return integer
     */
    public function getMaximumdaysbeforeholiday()
    {
        return $this->maximumdaysbeforeholiday;
    }

    /**
     * Returns the comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Returns the ownerchargecode
     *
     * @return OwnerChargeCode
     */
    public function getOwnerchargecode()
    {
        return $this->ownerchargecode;
    }

    /**
     * Returns the ownerchargeamount
     *
     * @return integer
     */
    public function getOwnerchargeamount()
    {
        return $this->ownerchargeamount;
    }

    /**
     * Get the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the defaultforperiod
     *
     * @return string
     */
    public function getDefaultforperiod()
    {
        return $this->defaultforperiod;
    }
}