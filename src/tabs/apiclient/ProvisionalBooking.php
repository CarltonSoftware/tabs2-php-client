<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;
use tabs\apiclient\Tabsuser;
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
 * 
 * @method DepositAmount getDepositamount() Returns the depositamount
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
     * Depositoverridden
     *
     * @var boolean
     */
    protected $depositoverridden = false;

    /**
     * Depositduedate
     *
     * @var \DateTime
     */
    protected $depositduedate;

    /**
     * Balanceduedate
     *
     * @var \DateTime
     */
    protected $balanceduedate;

    /**
     * Commissionpercentage
     *
     * @var string
     */
    protected $commissionpercentage;

    /**
     * Commissionpercentagesetby
     *
     * @var string
     */
    protected $commissionpercentagesetby;

    /**
     * Ownerpaymentterms
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
        
        parent::__construct($id);
    }

    /**
     * Set the tabsuser
     *
     * @param stdclass|array|Tabsuser $tabsuser The Tabsuser
     *
     * @return ProvisionalBooking
     */
    public function setTabsuser($tabsuser)
    {
        $this->tabsuser = Tabsuser::factory($tabsuser);

        return $this;
    }

    /**
     * Set the depositamount
     *
     * @param stdclass|array|DepositAmount $depositamount The Depositamount
     *
     * @return ProvisionalBooking
     */
    public function setDepositamount($depositamount)
    {
        $this->depositamount = DepositAmount::factory($depositamount);

        return $this;
    }

    /**
     * Set the ownerpaymentterms
     *
     * @param stdclass|array|OwnerPaymentTerms $ownerpaymentterms The Ownerpaymentterms
     *
     * @return ProvisionalBooking
     */
    public function setOwnerpaymentterms($ownerpaymentterms)
    {
        $this->ownerpaymentterms = OwnerPaymentTerms::factory($ownerpaymentterms);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        if ($this->getTabsuser()) {
            $arr['tabsuserid'] = $this->getTabsuser()->getId();

            if ($this->getDepositamount()) {
                $arr['depositamountid'] = $this->getDepositamount()->getId();
            }

            if ($this->getCommissionpercentage()) {
                $arr['commissionpercentage'] = $this->getCommissionpercentage();
            }

            if ($this->getOwnerpaymentterms()) {
                $arr['ownerpaymenttermsid'] = $this->getOwnerpaymentterms()->getId();
            }
        }
        
        return $arr;
    }
}