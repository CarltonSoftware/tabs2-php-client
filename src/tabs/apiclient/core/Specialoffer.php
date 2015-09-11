<?php

/**
 * Tabs Rest API Special offer object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;
use tabs\apiclient\core\PricingPeriod;
use tabs\apiclient\collection\core\BookingPeriod as BookingPeriodCollection;

/**
 * Tabs Rest API Special offer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getType() Returns the type
 * @method tabs\apiclient\core\Specialoffer setType(string $var) Sets the type
 * 
 * @method boolean getActive() Returns the active
 * @method tabs\apiclient\core\Specialoffer setActive(boolean $var) Sets the active
 * 
 * @method PricingPeriod getPricingperiod() Returns the pricingperiod
 * 
 * @method string getDescription() Returns the description
 * @method tabs\apiclient\core\Specialoffer setDescription(string $var) Sets the description
 * 
 * @method integer getMinimumholidaylength() Returns the minimumholidaylength
 * @method tabs\apiclient\core\Specialoffer setMinimumholidaylength(integer $var) Sets the minimumholidaylength
 * 
 * @method integer getMaximumholidaylength() Returns the maximumholidaylength
 * @method tabs\apiclient\core\Specialoffer setMaximumholidaylength(integer $var) Sets the maximumholidaylength
 * 
 * @method integer getMinimumoccupancy() Returns the minimumoccupancy
 * @method tabs\apiclient\core\Specialoffer setMinimumoccupancy(integer $var) Sets the minimumoccupancy
 * 
 * @method integer getMaximumoccupancy() Returns the maximumoccupancy
 * @method tabs\apiclient\core\Specialoffer setMaximumoccupancy(integer $var) Sets the maximumoccupancy
 * 
 * @method integer getMinimumdaysbeforeholiday() Returns the minimumdaysbeforeholiday
 * @method tabs\apiclient\core\Specialoffer setMinimumdaysbeforeholiday(integer $var) Sets the minimumdaysbeforeholiday
 * 
 * @method integer getMaximumdaysbeforeholiday() Returns the maximumdaysbeforeholiday
 * @method tabs\apiclient\core\Specialoffer setMaximumdaysbeforeholiday(integer $var) Sets the maximumdaysbeforeholiday
 * 
 * @method boolean getDaysbeforeappliestowholeholiday() Returns the daysbeforeappliestowholeholiday
 * @method tabs\apiclient\core\Specialoffer setDaysbeforeappliestowholeholiday(boolean $var) Sets the daysbeforeappliestowholeholiday
 * 
 * @method boolean getAdditional() Returns the additional
 * @method tabs\apiclient\core\Specialoffer setAdditional(boolean $var) Sets the additional
 * 
 * @method boolean getAdvertise() Returns the advertise
 * @method tabs\apiclient\core\Specialoffer setAdvertise(boolean $var) Sets the advertise
 * 
 * @method boolean getChangedaystartfinishonly() Returns the changedaystartfinishonly
 * @method tabs\apiclient\core\Specialoffer setChangedaystartfinishonly(boolean $var) Sets the changedaystartfinishonly
 * 
 * @method boolean getAmount() Returns the amount
 * @method tabs\apiclient\core\Specialoffer setAmount(boolean $var) Sets the amount
 * 
 * @method Currency getCurrency() Returns the currency
 * @method tabs\apiclient\core\Specialoffer setCurrency(Currency $var) Sets the currency
 * 
 * @method boolean getPerperiod() Returns the perperiod
 * @method tabs\apiclient\core\Specialoffer setPerperiod(boolean $var) Sets the perperiod
 * 
 * @method boolean getApplytopartysizepricing() Returns the applytopartysizepricing
 * @method tabs\apiclient\core\Specialoffer setApplytopartysizepricing(boolean $var) Sets the applytopartysizepricing
 * 
 */
class Specialoffer extends Builder
{
    /**
     * Type
     * 
     * @var string
     */
    protected $type = 'Amount';
    
    /**
     * Active bool
     * 
     * @var boolean
     */
    protected $active = false;
    
    /**
     * Applicable pricing period
     * 
     * @var PricingPeriod
     */
    protected $pricingperiod;
    
    /**
     * Description
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * Applicable only before a minimum holiday length
     * 
     * @var integer
     */
    protected $minimumholidaylength = 0;
    
    /**
     * Applicable only before a maximum holiday length
     * 
     * @var integer
     */
    protected $maximumholidaylength = 999;
    
    /**
     * Applicable only for a minimum occupancy
     * 
     * @var integer
     */
    protected $minimumoccupancy = 0;
    
    /**
     * Applicable only for a maximum occupancy
     * 
     * @var integer
     */
    protected $maximumoccupancy = 99;
    
    /**
     * Applicable only for a minimum days before the start of a holiday
     * 
     * @var integer
     */
    protected $minimumdaysbeforeholiday = 0;
    
    /**
     * Applicable only for a maximum days before the start of a holiday
     * 
     * @var integer
     */
    protected $maximumdaysbeforeholiday = 999;
    
    /**
     * See api documention for more info!
     * 
     * @var boolean
     */
    protected $daysbeforeappliestowholeholiday = true;
    
    /**
     * See api documention for more info!
     * 
     * @var boolean
     */
    protected $additional = true;
    
    /**
     * See api documention for more info!
     * 
     * @var boolean
     */
    protected $advertise = true;
    
    /**
     * See api documention for more info!
     * 
     * @var boolean
     */
    protected $changedaystartfinishonly = false;
    
    /**
     * Numerical amount of special offer
     * 
     * @var boolean
     */
    protected $amount = 0;
    
    /**
     * Applicable currency
     * 
     * @var Currency
     */
    protected $currency;
    
    /**
     * See api documention for more info!
     * 
     * @var boolean
     */
    protected $perperiod = true;
    
    /**
     * See api documention for more info!
     * 
     * @var boolean
     */
    protected $applytopartysizepricing = true;
    
    /**
     * Special offer booking periods
     * 
     * @var BookingPeriodCollection
     */
    protected $bookingperiods;
    
    /**
     * Special offer branding
     * 
     * @var BrandingCollection
     */
    protected $branding;
    
    /**
     * Special offer holiday periods
     * 
     * @var HolidayPeriodCollection
     */
    protected $holidayperiods;
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->bookingperiods = new BookingPeriodCollection();
        $this->bookingperiods->setElementParent($this);
    }
    
    /**
     * Add a booking period to the collection
     * 
     * @param \tabs\apiclient\core\BookingPeriod $bp Booking period
     * 
     * @return \tabs\apiclient\core\Specialoffer
     */
    public function addBookingPeriod(BookingPeriod $bp)
    {
        $bp->setParent($this);
        $this->bookingperiods->addElement($bp);
        
        return $this;
    }

    /**
     * Set the pricing period
     * 
     * @param PricingPeriod $pp Pricing period object
     * 
     * @return \tabs\apiclient\core\Specialoffer
     */
    public function setPricingperiod(PricingPeriod $pp)
    {
        $this->pricingperiod = PricingPeriod::factory($pp);
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'type' => $this->getType(),
            'active' => $this->boolToStr($this->getActive()),
            'pricingperiod' => $this->getPricingperiod()->toArray(),
            'description' => $this->getDescription()
        );
    }
}