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
 * @method \DateTime getBookedfromdate() Returns the bookedfromdate
 * @method SecurityDeposit setBookedfromdate(\DateTime $var) Sets the bookedfromdate
 * 
 * @method \DateTime getBookedtodate() Returns the bookedtodate
 * @method SecurityDeposit setBookedtodate(\DateTime $var) Sets the bookedtodate
 * 
 * @method \DateTime getHolidayfromdate() Returns the holidayfromdate
 * @method SecurityDeposit setHolidayfromdate(\DateTime $var) Sets the holidayfromdate
 * 
 * @method \DateTime getHolidaytodate() Returns the holidaytodate
 * @method SecurityDeposit setHolidaytodate(\DateTime $var) Sets the holidaytodate
 * 
 * @method integer getAmount() Returns the amount
 * @method SecurityDeposit setAmount(integer $var) Sets the amount
 * 
 * @method Currency getCurrency() Returns the currency
 * @method integer getDaysduein() Returns the daysindue
 * @method SecurityDeposit setDaysduein(integer $var) Sets the daysindue
 * 
 * @method integer getDaysdueout() Returns the daysoutdue
 * @method SecurityDeposit setDaysdueout(integer $var) Sets the daysoutdue
 * 
 * @method boolean getRefundable() Returns the refundable
 * @method SecurityDeposit setRefundable(boolean $var) Sets the refundable
 * 
 * @method boolean getPeradult() Returns the peradult
 * @method SecurityDeposit setPeradult(boolean $var) Sets the peradult
 * 
 * @method boolean getPerchild() Returns the perchild
 * @method SecurityDeposit setPerchild(boolean $var) Sets the perchild
 * 
 * @method boolean getPerinfant() Returns the perinfant
 * @method SecurityDeposit setPerinfant(boolean $var) Sets the perinfant
 * 
 * @method boolean getPerperiod() Returns the perperiod
 * @method SecurityDeposit setPerperiod(boolean $var) Sets the perperiod
 * 
 * @method string getPricingperiod() Returns the pricingperiod
 * @method SecurityDeposit setPricingperiod(string $var) Sets the pricingperiod
 * 
 * @method integer getMinimumdays() Returns the minimumdays
 * @method SecurityDeposit setMinimumdays(integer $var) Sets the minimumdays
 * 
 * @method integer getMaximumdays() Returns the maximumdays
 * @method SecurityDeposit setMaximumdays(integer $var) Sets the maximumdays
 * 
 * @method string getComments() Returns the comments
 * @method SecurityDeposit setComments(string $var) Sets the comments
 * 
 * @method OwnerChargeCode getOwnerchargecode() Returns the ownerchargecode
 * @method integer getOwnerchargeamount() Returns the ownerchargeamount
 * @method SecurityDeposit setOwnerchargeamount(integer $var) Sets the ownerchargeamount
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
     * Minimumdays
     *
     * @var integer
     */
    protected $minimumdays;

    /**
     * Maximumdays
     *
     * @var integer
     */
    protected $maximumdays;

    /**
     * Comments
     *
     * @var string
     */
    protected $comments;

    /**
     * Ownerchargecode
     *
     * @var OwnerChargeCode
     */
    protected $ownerchargecode;

    /**
     * Ownerchargeamount
     *
     * @var integer
     */
    protected $ownerchargeamount;

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
        $arr = array(
            'bookedfromdate' => $this->getBookedfromdate()->format('Y-m-d'),
            'bookedtodate' => $this->getBookedtodate()->format('Y-m-d'),
            'holidayfromdate' => $this->getHolidayfromdate()->format('Y-m-d'),
            'holidaytodate' => $this->getHolidaytodate()->format('Y-m-d'),
            'amount' => $this->getAmount(),
            'currencycode' => $this->getCurrency()->getCode(),
            'daysduein' => $this->getDaysduein(),
            'daysdueout' => $this->getDaysdueout(),
            'refundable' => $this->getRefundable(),
            'peradult' => $this->boolToStr($this->getPeradult()),
            'perchild' => $this->boolToStr($this->getPerchild()),
            'perinfant' => $this->boolToStr($this->getPerinfant()),
            'perperiod' => $this->boolToStr($this->getPerperiod()),
            'pricingperiod' => $this->getPricingperiod(),
            'minimumdays' => $this->getMinimumdays(),
            'maximumdays' => $this->getMaximumdays(),
            'comments' => $this->getComments(),
            'ownerchargeamount' => $this->getOwnerchargeamount()
        );
        
        if ($this->getOwnerchargecode()) {
            $arr['ownerchargecodeid'] = $this->getOwnerchargecode()->getId();
        }
        
        return $arr;
    }
}