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
 * @method Payment setAmount(float $var)                Sets the amount
 * @method Payment setType(string $var)                 Sets the type
 * @method Payment setPaymentdatetime(\DateTime $var)   Sets the paymentdatetime
 * @method Payment setBookingamount(float $var)         Sets the bookingamount
 * @method Payment setSecuritydepositamount(float $var) Sets the securitydepositamount
 * @method Payment setDonotconfirmbooking(boolean $var) Sets the donotconfirmbooking
 * 
 * @method Actor   getActor()                           Get the actor
 */
class Payment extends Builder
{
    /**
     * @var float
     */
    protected $amount = 0;

    /**
     * @var string
     */
    protected $type = 'Booking';

    /**
     * @var \DateTime
     */
    protected $paymentdatetime;

    /**
     * @var float
     */
    protected $bookingamount;

    /**
     * @var float
     */
    protected $securitydepositamount;

    /**
     * @var \tabs\apiclient\Booking
     */
    protected $transferbooking;
    
    /**
     * @var boolean
     */
    protected $donotconfirmbooking = false;    
    
    /**
     * @var \tabs\apiclient\Actor
     */
    protected $actor;

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
     * Set the actor paying responsible for paying for this booking
     * 
     * @param \tabs\apiclient\Actor|array|\stdClass $actor Actor
     * 
     * @return $this
     */
    public function setActor($actor)
    {
        $this->actor = \tabs\apiclient\Actor::factory($actor);
        
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
        
        if ($this->getActor()) {
            $arr['actorid'] = $this->getActor()->getId();
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

    /**
     * Returns the amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Returns the type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the paymentdatetime
     *
     * @return \DateTime
     */
    public function getPaymentdatetime()
    {
        return $this->paymentdatetime;
    }

    /**
     * Returns the bookingamount
     *
     * @return float
     */
    public function getBookingamount()
    {
        return $this->bookingamount;
    }

    /**
     * Returns the securitydepositamount
     *
     * @return float
     */
    public function getSecuritydepositamount()
    {
        return $this->securitydepositamount;
    }

    /**
     * Returns the donotconfirmbooking
     *
     * @return boolean
     */
    public function getDonotconfirmbooking()
    {
        return $this->donotconfirmbooking;
    }

    /**
     * Returns the transferbooking
     *
     * @return \tabs\apiclient\Booking
     */
    public function getTransferbooking()
    {
        return $this->transferbooking;
    }
}