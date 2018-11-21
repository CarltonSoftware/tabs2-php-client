<?php

namespace tabs\apiclient;

use tabs\apiclient\Collection;
use tabs\apiclient\Booking;
use tabs\apiclient\marketingbrand\EmailList;

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
 * 
 * @method Customer setMarketingbrands(Collection $col) Set the marketing brands
 * 
 * @method Customer setBookings(Collection $col) Set the bookings
 * 
 * 
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
    
    /**
     * Customer payments
     * 
     * @var Collection|actor\Payment[]
     */
    protected $payments;

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
            new actor\MarketingBrand(),
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
        
        $this->payments = Collection::factory(
            'payment',
            new actor\Payment(),
            $this
        );
        
        parent::__construct($id);
    }
    
    /**
     * Subscribe or unsubscribe to a mailing list
     * 
     * @param EmailList $eml          Mailing list to subscribe to
     * @param boolean   $nocontact    The customer marketing brand optin flag
     * @param boolean   $unsubscribed The mailing list optin preference
     * 
     * @return Customer
     */
    public function subscribeToMailingList(
        \tabs\apiclient\marketingbrand\EmailList $eml,
        $nocontact = false,
        $unsubscribed = false
    ) {
        $cmbs = $this->getMarketingbrands()->findBy(function($ele) use ($eml) {
            return intval($ele->getMarketingbrand()->getId()) === intval($eml->getParent()->getId());
        });
        
        if ($cmbs->count() === 0) {
            $cmb = new \tabs\apiclient\actor\MarketingBrand();
            $cmb->setMarketingbrand($eml->getParent());
            $cmb->setNocontact(false);
            $this->getMarketingbrands()->addElement($cmb);
            $cmb->create();
        } else {
            $cmb = $cmbs->first();
        }
        
        // Check if the no contact boolean is the same and if not, update.
        if ($cmb->getNocontact() != $nocontact) {
            $cmb->setNocontact($nocontact)->update();
        }
        
        $sub = $cmb->getEmaillists()->findBy(function($ele) use ($eml) {
            return intval($ele->getMarketingbrandemaillist()->getId()) === intval($eml->getId());
        });

        // Get a mailing list for that marketing brand
        if ($sub->count() === 0) {
            // Create a mailing list as there isnt one
            $ceml = new \tabs\apiclient\actor\marketingbrand\EmailList();
            $ceml->setMarketingbrandemaillist($eml)
                ->setUnsubscribed($unsubscribed);
            $cmb->getEmaillists()->addElement($ceml);
            $ceml->create();
        } else {
            // As there is one, set the unsubscribed flag to false if 
            // its different
            if ($sub->first()->getUnsubscribed() != $unsubscribed) {
                $sub->first()->setUnsubscribed($unsubscribed)->update();
            }
        }
        
        return $this;
    }

    /**
     * Returns the firstbookingbookeddate
     *
     * @return \DateTime
     */
    public function getFirstbookingbookeddate()
    {
        return $this->firstbookingbookeddate;
    }

    /**
     * Returns the confirmedbookings
     *
     * @return integer
     */
    public function getConfirmedbookings()
    {
        return $this->confirmedbookings;
    }

    /**
     * Returns the confirmedbookingsvalue
     *
     * @return integer
     */
    public function getConfirmedbookingsvalue()
    {
        return $this->confirmedbookingsvalue;
    }

    /**
     * Returns the accountbalance
     *
     * @return integer
     */
    public function getAccountbalance()
    {
        return $this->accountbalance;
    }

    /**
     * Returns the customer MarketingBrands
     *
     * @return Collection|MarketingBrand[]
     */
    public function getMarketingbrands()
    {
        return $this->marketingbrands;
    }

    /**
     * Returns the customer bookings
     *
     * @return Collection|Booking[]
     */
    public function getBookings()
    {
        return $this->bookings;
    }

    /**
     * Returns the customer categories
     *
     * @return Collection|actor\Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Returns the customer categories
     *
     * @return Collection|actor\Payment[]
     */
    public function getPayments()
    {
        return $this->payments;
    }
}