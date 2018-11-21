<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\booking\securitydeposit\Hold;
use tabs\apiclient\OwnerChargeCode;

/**
 * Tabs Rest API SecurityDeposit object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method SecurityDeposit setAmount(integer $var) Sets the amount
 * 
 * @method SecurityDeposit setPaid(integer $var) Sets the paid
 * 
 * @method SecurityDeposit setRefunded(integer $var) Sets the refunded
 * 
 * @method SecurityDeposit setBalance(integer $var) Sets the balance
 * 
 * @method SecurityDeposit setOutstanding(integer $var) Sets the outstanding
 * 
 * @method SecurityDeposit setDueindate(\DateTime $var) Sets the dueindate
 * 
 * @method SecurityDeposit setPaiddate(\DateTime $var) Sets the paiddate
 * 
 * @method SecurityDeposit setWithheld(integer $var) Sets the withheld
 * 
 * @method SecurityDeposit setRefundable(integer $var) Sets the refundable
 * 
 * @method SecurityDeposit setHeld(boolean $var) Sets the held
 * 
 * @method SecurityDeposit setDueoutdate(\DateTime $var) Sets the dueoutdate
 * 
 * @method SecurityDeposit setRefundeddate(\DateTime $var) Sets the refundeddate
 * 
 * @method SecurityDeposit setOwnerchargeamount(integer $var) Sets the ownerchargeamount
 * 
 * @method SecurityDeposit setOwnercharge(string $var) Sets the ownercharge
 * 
 * @method \tabs\apiclient\property\SecurityDeposit getPropertysecuritydeposit() Get the property SD
 */
class SecurityDeposit extends Builder
{
    /**
     * Amount
     *
     * @var integer
     */
    protected $amount;

    /**
     * Paid
     *
     * @var integer
     */
    protected $paid = 0;

    /**
     * Refunded
     *
     * @var integer
     */
    protected $refunded = 0;

    /**
     * Balance
     *
     * @var integer
     */
    protected $balance = 0;

    /**
     * Outstanding
     *
     * @var integer
     */
    protected $outstanding = 0;

    /**
     * Dueindate
     *
     * @var \DateTime
     */
    protected $dueindate;

    /**
     * Paiddate
     *
     * @var \DateTime
     */
    protected $paiddate;

    /**
     * Withheld
     *
     * @var integer
     */
    protected $withheld = 0;

    /**
     * Refundable
     *
     * @var integer
     */
    protected $refundable = 0;

    /**
     * Held
     *
     * @var boolean
     */
    protected $held = false;

    /**
     * Dueoutdate
     *
     * @var \DateTime
     */
    protected $dueoutdate;

    /**
     * Refundeddate
     *
     * @var \DateTime
     */
    protected $refundeddate;

    /**
     * Ownerchargecode
     *
     * @var OwnerChargeCode
     */
    protected $ownerchargecode;

    /**
     * Property security deposit
     *
     * @var \tabs\apiclient\property\SecurityDeposit
     */
    protected $propertysecuritydeposit;

    /**
     * Ownerchargeamount
     *
     * @var integer
     */
    protected $ownerchargeamount = 0;

    /**
     * Ownercharge
     *
     * @var string
     */
    protected $ownercharge = '';

    /**
     * Holds
     *
     * @var Collection|Hold[]
     */
    protected $holds;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->dueindate = new \DateTime();
        $this->dueoutdate = new \DateTime();
        $this->refundeddate = new \DateTime();
        $this->paiddate = new \DateTime();
        $this->holds = Collection::factory(
            'hold',
            new Hold(),
            $this
        );

        parent::__construct($id);
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
     * Set the property security deposit
     *
     * @param stdclass|array|\tabs\apiclient\property\SecurityDeposit $sd Property sd
     *
     * @return SecurityDeposit
     */
    public function setPropertysecuritydeposit($sd)
    {
        $this->propertysecuritydeposit = \tabs\apiclient\property\SecurityDeposit::factory($sd);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        
        if ($this->getOwnerchargecode()) {
            $arr['ownerchargecodeid'] = $this->getOwnerchargecode()->getId();
        }
        
        if ($this->getPropertysecuritydeposit()) {
            $arr['propertysecuritydepositid'] = $this->getPropertysecuritydeposit()->getId();
        }
        
        return $arr;
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
     * Returns the paid
     *
     * @return integer
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Returns the refunded
     *
     * @return integer
     */
    public function getRefunded()
    {
        return $this->refunded;
    }

    /**
     * Returns the balance
     *
     * @return integer
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Returns the outstanding
     *
     * @return integer
     */
    public function getOutstanding()
    {
        return $this->outstanding;
    }

    /**
     * Returns the dueindate
     *
     * @return \DateTime
     */
    public function getDueindate()
    {
        return $this->dueindate;
    }

    /**
     * Returns the paiddate
     *
     * @return \DateTime
     */
    public function getPaiddate()
    {
        return $this->paiddate;
    }

    /**
     * Returns the withheld
     *
     * @return integer
     */
    public function getWithheld()
    {
        return $this->withheld;
    }

    /**
     * Returns the refundable
     *
     * @return integer
     */
    public function getRefundable()
    {
        return $this->refundable;
    }

    /**
     * Returns the held
     *
     * @return boolean
     */
    public function getHeld()
    {
        return $this->held;
    }

    /**
     * Returns the dueoutdate
     *
     * @return \DateTime
     */
    public function getDueoutdate()
    {
        return $this->dueoutdate;
    }

    /**
     * Returns the refundeddate
     *
     * @return \DateTime
     */
    public function getRefundeddate()
    {
        return $this->refundeddate;
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
     * Returns the ownercharge
     *
     * @return string
     */
    public function getOwnercharge()
    {
        return $this->ownercharge;
    }

    /**
     * Get the property SD
     *
     * @return \tabs\apiclient\property\SecurityDeposit
     */
    public function getPropertysecuritydeposit()
    {
        return $this->propertysecuritydeposit;
    }
}