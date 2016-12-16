<?php

namespace tabs\apiclient;

/**
 * Tabs Rest Customer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \DateTime getFirstbookingbookeddate() Returns the firstbookingbookeddate
 * @method integer getConfirmedbookings()        Returns the confirmedbookings
 * @method integer getConfirmedbookingsvalue()   Returns the confirmedbookingsvalue
 * @method integer getAccountbalance()           Returns the accountbalance
 */
class Customer extends Actor
{
    /**
     * First booking date
     * 
     * @var \DateTime
     */
    protected $firstbookingbookeddate;
    
    /**
     * Number of confirmed bookings
     * 
     * @var integer
     */
    protected $confirmedbookings = 0;
    
    /**
     * Value of confirmed bookings
     * 
     * @var integer
     */
    protected $confirmedbookingsvalue = 0;
    
    /**
     * Account balance
     * 
     * @var integer
     */
    protected $accountbalance = 0;

    // -------------------- Public Functions -------------------- //
    
    /**
     * Constructor
     *
     * @param integer $id ID
     * 
     * @return void
     */
    public function __construct($id = null)
    {
        $this->firstbookingbookeddate = new \DateTime();
        
        parent::__construct($id);
    }
}