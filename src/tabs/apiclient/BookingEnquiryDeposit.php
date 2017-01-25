<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API BookingEnquiryDeposit object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getBalanceduedate() Returns the balanceduedate
 * @method BookingEnquiryDeposit setBalanceduedate(\DateTime $var) Sets the balanceduedate
 * 
 * @method integer getDeposit() Returns the deposit
 * @method BookingEnquiryDeposit setDeposit(integer $var) Sets the deposit
 * 
 * @method \tabs\apiclient\DepositAmount getDepositamount() Returns the depositamount
 * @method string getDescription() Returns the description
 * @method BookingEnquiryDeposit setDescription(string $var) Sets the description
 * 
 * @method \DateTime getDuedate() Returns the duedate
 * @method BookingEnquiryDeposit setDuedate(\DateTime $var) Sets the duedate
 */
class BookingEnquiryDeposit extends Builder
{
    /**
     * Balanceduedate
     *
     * @var \DateTime
     */
    protected $balanceduedate;

    /**
     * Deposit
     *
     * @var integer
     */
    protected $deposit;

    /**
     * Depositamount
     *
     * @var \tabs\apiclient\DepositAmount
     */
    protected $depositamount;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Duedate
     *
     * @var \DateTime
     */
    protected $duedate;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->balanceduedate = new \DateTime();
        $this->duedate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the depositamount
     *
     * @param stdclass|array|\tabs\apiclient\DepositAmount $depositamount The Depositamount
     *
     * @return BookingEnquiryDeposit
     */
    public function setDepositamount($depositamount)
    {
        $this->depositamount = \tabs\apiclient\DepositAmount::factory(
            $depositamount
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'balanceduedate' => $this->getBalanceduedate()->format('Y-m-d'),
            'deposit' => $this->getDeposit(),
            'depositamountid' => $this->getDepositamount()->getId(),
            'description' => $this->getDescription(),
            'duedate' => $this->getDuedate()->format('Y-m-d'),
        );
    }
}