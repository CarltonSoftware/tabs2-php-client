<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Payment object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method float getAmount() Returns the amount
 * @method Payment setAmount(float $var) Sets the amount
 * 
 * @method string getType() Returns the type
 * @method Payment setType(string $var) Sets the type
 * 
 * @method \DateTime getPaymentdatetime() Returns the paymentdatetime
 * @method Payment setPaymentdatetime(\DateTime $var) Sets the paymentdatetime
 * 
 * @method float getBookingamount() Returns the bookingamount
 * @method Payment setBookingamount(float $var) Sets the bookingamount
 * 
 * @method float getSecuritydepositamount() Returns the securitydepositamount
 * @method Payment setSecuritydepositamount(float $var) Sets the securitydepositamount
 * 
 * @method boolean getDonotconfirmbooking() Returns the donotconfirmbooking
 * @method Payment setDonotconfirmbooking(boolean $var) Sets the donotconfirmbooking
 * 
 * @method \tabs\apiclient\Booking getTransferbooking() Returns the transferbooking
 */
class Payment extends Builder
{
    /**
     * Amount
     *
     * @var float
     */
    protected $amount = 0;

    /**
     * Type
     *
     * @var string
     */
    protected $type = 'Booking';

    /**
     * Paymentdatetime
     *
     * @var \DateTime
     */
    protected $paymentdatetime;

    /**
     * Bookingamount
     *
     * @var float
     */
    protected $bookingamount;

    /**
     * Securitydepositamount
     *
     * @var float
     */
    protected $securitydepositamount;

    /**
     * Transferbooking
     *
     * @var \tabs\apiclient\Booking
     */
    protected $transferbooking;
    
    /**
     * Donotconfirmbooking
     *
     * @var boolean
     */
    protected $donotconfirmbooking = false;    

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->paymentdatetime = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the transferbooking
     *
     * @param stdclass|array|\tabs\apiclient\Booking $transferbooking The Transferbooking
     *
     * @return Payment
     */
    public function setTransferbooking($transferbooking)
    {
        $this->transferbooking = \tabs\apiclient\Booking::factory($transferbooking);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'amount' => $this->getAmount(),
            'type' => $this->getType(),
            'paymentdatetime' => $this->getPaymentdatetime()->format('Y-m-d')
        );
        
        if ($this->getTransferbooking()) {
            $arr['transferbookingid'] = $this->getTransferbooking()->getId();
        }
        
        if ($this->getType() == 'BookingAndSecurityDeposit') {
            $arr['bookingamount'] = $this->getBookingamount();
            $arr['securitydepositamount'] = $this->getSecuritydepositamount();
        }
        
        if ($this->getDonotconfirmbooking() === true) {
            $arr['donotconfirmbooking'] = true;
        }
        
        return $arr;
    }
}