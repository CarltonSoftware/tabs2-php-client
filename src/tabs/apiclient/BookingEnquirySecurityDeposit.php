<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;

/**
 * Tabs Rest API BookingEnquirySecurityDeposit object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer getAmount() Returns the amount
 * @method BookingEnquirySecurityDeposit setAmount(integer $var) Sets the amount
 * 
 * @method \DateTime getDueindate() Returns the dueindate
 * @method BookingEnquirySecurityDeposit setDueindate(\DateTime $var) Sets the dueindate
 * 
 * @method \DateTime getDueoutdate() Returns the dueoutdate
 * @method BookingEnquirySecurityDeposit setDueoutdate(\DateTime $var) Sets the dueoutdate
 */
class BookingEnquirySecurityDeposit extends Base
{
    /**
     * Amount
     *
     * @var integer
     */
    protected $amount = 0;

    /**
     * Dueindate
     *
     * @var \DateTime
     */
    protected $dueindate;

    /**
     * Dueoutdate
     *
     * @var \DateTime
     */
    protected $dueoutdate;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->dueindate = new \DateTime();
        $this->dueoutdate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'amount' => $this->getAmount(),
            'dueindate' => $this->getDueindate()->format('Y-m-d'),
            'dueoutdate' => $this->getDueoutdate()->format('Y-m-d')
        );
    }
}