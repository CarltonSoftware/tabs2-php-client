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
 * @method Tabsuser getTabsuser() Returns the tabsuser
 * @method ProvisionalBooking setTabsuser(Tabsuser $tu) Set a tabsuser
 * 
 * @method DepositAmount getDepositamount() Returns the depositamount
 * @method ProvisionalBooking setDepositamount(DepositAmount $da) Set the depositamount
 * 
 * @method integer getDeposit() Returns the deposit
 * @method ProvisionalBooking setDeposit(integer $var) Sets the deposit
 * 
 * @method boolean getDepositoverridden() Returns the depositoverridden
 * @method ProvisionalBooking setDepositoverridden(boolean $var) Sets the depositoverridden
 * 
 * @method \DateTime getDepositduedate() Returns the depositduedate
 * @method ProvisionalBooking setDepositduedate(\DateTime $var) Sets the depositduedate
 * 
 * @method \DateTime getBalanceduedate() Returns the balanceduedate
 * @method ProvisionalBooking setBalanceduedate(\DateTime $var) Sets the balanceduedate
 * 
 * @method string getCommissionpercentage() Returns the commissionpercentage
 * @method ProvisionalBooking setCommissionpercentage(string $var) Sets the commissionpercentage
 * 
 * @method string getCommissionpercentagesetby() Returns the commissionpercentagesetby
 * @method ProvisionalBooking setCommissionpercentagesetby(string $var) Sets the commissionpercentagesetby
 * 
 * @method OwnerPaymentTerms getOwnerpaymentterms() Returns the ownerpaymentterms
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
}