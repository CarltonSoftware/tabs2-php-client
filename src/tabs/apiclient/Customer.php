<?php

namespace tabs\apiclient;

use tabs\apiclient\actor\MarketingBrand;
use tabs\apiclient\Collection;
use tabs\apiclient\Booking;

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
 * 
 * @method Collection|MarketingBrand[] getMarketingbrands() Returns the customer MarketingBrands
 * @method Customer setMarketingbrands(Collection $col) Set the marketing brands
 * 
 * @method Collection|Booking[] getBookings() Returns the customer bookings
 * @method Customer setBookings(Collection $col) Set the bookings
 * 
 * @method Collection|actor\Category[] getCategories() Returns the customer categories
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
    
    /**
     * Marketing brands collection
     * 
     * @var Collection|MarketingBrand[]
     */
    protected $marketingbrands;
    
    /**
     * Customer bookings
     * 
     * @var Collection|Booking[]
     */
    protected $bookings;
    
    /**
     * Customer categories
     * 
     * @var Collection|actor\Category[]
     */
    protected $categories;

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
        $this->marketingbrands = Collection::factory(
            'marketingbrand',
            new MarketingBrand(),
            $this
        );
        
        $this->bookings = Collection::factory(
            'booking',
            new Booking(),
            $this
        );
        
        $this->categories = Collection::factory(
            'category',
            new actor\Category(),
            $this
        );
        
        parent::__construct($id);
    }
}