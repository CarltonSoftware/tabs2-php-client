<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;
use tabs\apiclient\TabsUser;
use tabs\apiclient\DepositAmount;

/**
 * Tabs Rest API ProvisionalBooking object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ProvisionalBooking setTabsuser(Tabsuser $tu) Set a tabsuser
 * 
 * @method ProvisionalBooking setDepositamount(DepositAmount $da) Set the depositamount
 * 
 * @method ProvisionalBooking setDeposit(integer $var) Sets the deposit
 * 
 * @method ProvisionalBooking setDepositoverridden(boolean $var) Sets the depositoverridden
 * 
 * @method ProvisionalBooking setDepositduedate(\DateTime $var) Sets the depositduedate
 * 
 * @method ProvisionalBooking setBalanceduedate(\DateTime $var) Sets the balanceduedate
 * 
 * @method ProvisionalBooking setCommissionpercentage(string $var) Sets the commissionpercentage
 * 
 * @method ProvisionalBooking setCommissionpercentagesetby(string $var) Sets the commissionpercentagesetby
 * 
 * @method ProvisionalBooking setOwnerpaymentterms(OwnerPaymentTerms $var) Set the ownerpaymentterms
 */
class ProvisionalBooking extends Base
{
    /**
     * Tabsuser
     *
     * @var Tabsuser
     */
    protected $tabsuser;

    /**
     * Depositamount
     *
     * @var DepositAmount
     */
    protected $depositamount;

    /**
     * Deposit
     *
     * @var integer
     */
    protected $deposit;

    /**
     * Deposit overridden
     *
     * @var boolean
     */
    protected $depositoverridden = false;

    /**
     * Deposit duedate
     *
     * @var \DateTime
     */
    protected $depositduedate;

    /**
     * Balance duedate
     *
     * @var \DateTime
     */
    protected $balanceduedate;

    /**
     * Commission percentage
     *
     * @var string
     */
    protected $commissionpercentage;

    /**
     * Commission percentage set by
     *
     * @var string
     */
    protected $commissionpercentagesetby;

    /**
     * Owner payment terms
     *
     * @var OwnerPaymentTerms
     */
    protected $ownerpaymentterms;

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->depositduedate = new \DateTime();
        $this->balanceduedate = new \DateTime();
        $this->tabsuser = new TabsUser();
        $this->depositamount = new DepositAmount();
        $this->ownerpaymentterms = new OwnerPaymentTerms();
        
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * Returns the tabsuser
     *
     * @return Tabsuser
     */
    public function getTabsuser()
    {
        return $this->tabsuser;
    }

    /**
     * Returns the depositamount
     *
     * @return DepositAmount
     */
    public function getDepositamount()
    {
        return $this->depositamount;
    }

    /**
     * Returns the deposit
     *
     * @return integer
     */
    public function getDeposit()
    {
        return $this->deposit;
    }

    /**
     * Returns the depositoverridden
     *
     * @return boolean
     */
    public function getDepositoverridden()
    {
        return $this->depositoverridden;
    }

    /**
     * Returns the depositduedate
     *
     * @return \DateTime
     */
    public function getDepositduedate()
    {
        return $this->depositduedate;
    }

    /**
     * Returns the balanceduedate
     *
     * @return \DateTime
     */
    public function getBalanceduedate()
    {
        return $this->balanceduedate;
    }

    /**
     * Returns the commissionpercentage
     *
     * @return string
     */
    public function getCommissionpercentage()
    {
        return $this->commissionpercentage;
    }

    /**
     * Returns the commissionpercentagesetby
     *
     * @return string
     */
    public function getCommissionpercentagesetby()
    {
        return $this->commissionpercentagesetby;
    }

    /**
     * Returns the ownerpaymentterms
     *
     * @return OwnerPaymentTerms
     */
    public function getOwnerpaymentterms()
    {
        return $this->ownerpaymentterms;
    }
}