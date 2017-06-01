<?php

/**
 * Tabs Rest API Confirmed Booking object.
 *
 * PHP Version 5.4
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient;

/**
 * Tabs Rest API Confirmed Booking object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getDatetime()            Return the datetime
 * @method \DateTime getDepositpaiddate()     Return the deposit paid date
 * @method \DateTime getBalancepaiddate()     Return the balance paid date
 * @method TabsUser  getConfirmedbytabsuser() Return the confirming user
 * 
 * @method ConfirmedBooking setDatetime(\DateTime $datetime) Set the datetime
 */
class ConfirmedBooking extends Base
{
    /**
     * Datetime
     *
     * @var \DateTime
     */
    protected $datetime;
    
    /**
     * Deposit paid date
     *
     * @var \DateTime
     */
    protected $depositpaiddate;
    
    /**
     * Balance paid date
     *
     * @var \DateTime
     */
    protected $balancepaiddate;
    
    /**
     * Confirmed by tabs user
     *
     * @var Tabsuser
     */
    protected $confirmedbytabsuser;
        
    // -------------------------- Public Functions -------------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->datetime = new \DateTime();
        
        parent::__construct($id);
    }
    
    /**
     * Set the deposit paid date
     * 
     * @param \DateTime|string $date Date
     * 
     * @return \tabs\apiclient\ConfirmedBooking
     */
    public function setDepositpaiddate($date)
    {
        if (is_string($date) && strlen($date) > 0) {
            $date = new \DateTime($date);
            $this->depositpaiddate = $date;
        } else if ($date instanceof \DateTime) {
            $this->depositpaiddate = $date;
        }
        
        return $this;
    }
    
    /**
     * Set the balance paid date
     * 
     * @param \DateTime|string $date Date
     * 
     * @return \tabs\apiclient\ConfirmedBooking
     */
    public function setBalancepaiddate($date)
    {
        if (is_string($date) && strlen($date) > 0) {
            $date = new \DateTime($date);
            $this->balancepaiddate = $date;
        } else if ($date instanceof \DateTime) {
            $this->balancepaiddate = $date;
        }
        
        return $this;
    }
    
    /**
     * Set the confirming tabs user
     * 
     * @param array|\stdClass|Tabsuser $tabsuser User
     * 
     * @return \tabs\apiclient\ConfirmedBooking
     */
    public function setConfirmedbytabsuser($tabsuser)
    {
        $this->confirmedbytabsuser = Tabsuser::factory($tabsuser);
        
        return $this;
    }
    
    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        $arr = array();
        if ($this->getConfirmedbytabsuser()) {
            $arr['tabsuserid'] = $this->getConfirmedbytabsuser()->getId();
        }
        
        return $arr;
    }
    
}