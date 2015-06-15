<?php

/**
 * Tabs Rest API ConfirmedBooking object.
 *
 * PHP Version 5.4
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\booking;

/**
 * Tabs Rest API ConfirmedBooking object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getDatetime()       Return the datetime
 * @method string    getContract()       Return the contract
 * @method \DateTime getBalanceduedate() Return the balanceduedate
 * 
 * @method ConfirmedBooking setDatetime(\DateTime $datetime)             Set the datetime
 * @method ConfirmedBooking setContract(string $contract)                Set the contract
 * @method ConfirmedBooking setBalanceduedate(\DateTime $balanceduedate) Set the balanceduedate
 */
class ConfirmedBooking extends \tabs\apiclient\core\Base
{
    /**
     * Datetime
     *
     * @var \DateTime
     */
    protected $datetime;
    
    /**
     * Contract
     *
     * @var string
     */
    protected $contract;
    
    /**
     * Balanceduedate
     *
     * @var \DateTime
     */
    protected $balanceduedate;
        
    // -------------------------- Public Functions -------------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'datetime' => $this->getDatetime(),
            'contract' => $this->getContract(),
            'balanceduedate' => $this->getBalanceduedate(),
        );
    }
    
}