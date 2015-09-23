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

namespace tabs\apiclient\core\specialoffer;
use \tabs\apiclient\core\PricingPeriod;
use \tabs\apiclient\collection\core\specialoffer\BookingPeriod as BookingPeriodCollection;
use \tabs\apiclient\collection\core\specialoffer\HolidayPeriod as HolidayPeriodCollection;
use \tabs\apiclient\collection\brand\ElementBranding as BrandCollection;
use \tabs\apiclient\collection\core\specialoffer\SpecialofferPriceType as PriceTypeCollection;
use \tabs\apiclient\collection\core\specialoffer\Websitesection as WebsiteSectionCollection;
use \tabs\apiclient\collection\core\specialoffer\SalesChannel as SalesChannelCollection;
use \tabs\apiclient\collection\core\specialoffer\Promotion as PromotionCollection;

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
 * @method boolean      getActive()             Returns the active
 * @method Specialoffer setActive(boolean $var) Sets the active
 * 
 * @method PricingPeriod getPricingperiod() Returns the pricingperiod
 * 
 * @method string       getDescription()            Returns the description
 * @method Specialoffer setDescription(string $var) Sets the description
 * 
 * @method integer      getMinimumholidaylength()             Returns the minimumholidaylength
 * @method Specialoffer setMinimumholidaylength(integer $var) Sets the minimumholidaylength
 * 
 * @method integer      getMaximumholidaylength()             Returns the maximumholidaylength
 * @method Specialoffer setMaximumholidaylength(integer $var) Sets the maximumholidaylength
 * 
 * @method integer      getMinimumoccupancy()             Returns the minimumoccupancy
 * @method Specialoffer setMinimumoccupancy(integer $var) Sets the minimumoccupancy
 * 
 * @method integer      getMaximumoccupancy()             Returns the maximumoccupancy
 * @method Specialoffer setMaximumoccupancy(integer $var) Sets the maximumoccupancy
 * 
 * @method integer      getMinimumdaysbeforeholiday()             Returns the minimumdaysbeforeholiday
 * @method Specialoffer setMinimumdaysbeforeholiday(integer $var) Sets the minimumdaysbeforeholiday
 * 
 * @method integer      getMaximumdaysbeforeholiday()             Returns the maximumdaysbeforeholiday
 * @method Specialoffer setMaximumdaysbeforeholiday(integer $var) Sets the maximumdaysbeforeholiday
 * 
 * @method boolean      getDaysbeforeappliestowholeholiday()             Returns the daysbeforeappliestowholeholiday
 * @method Specialoffer setDaysbeforeappliestowholeholiday(boolean $var) Sets the daysbeforeappliestowholeholiday
 * 
 * @method boolean      getAdditional()             Returns the additional
 * @method Specialoffer setAdditional(boolean $var) Sets the additional
 * 
 * @method boolean      getAdvertise()             Returns the advertise
 * @method Specialoffer setAdvertise(boolean $var) Sets the advertise
 * 
 * @method boolean      getChangedaystartfinishonly()             Returns the changedaystartfinishonly
 * @method Specialoffer setChangedaystartfinishonly(boolean $var) Sets the changedaystartfinishonly
 * 
 * @method boolean      getPerperiod()             Returns the perperiod
 * @method Specialoffer setPerperiod(boolean $var) Sets the perperiod
 * 
 * @method boolean      getApplytopartysizepricing()             Returns the applytopartysizepricing
 * @method Specialoffer setApplytopartysizepricing(boolean $var) Sets the applytopartysizepricing
 * 
 * @method WebsiteSectionCollection getWebsitesections() Return the applicable website sections.
 */
abstract class Specialoffer extends \tabs\apiclient\core\Builder
{
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
    protected $brandings;
    
    /**
     * Special offer holiday periods
     * 
     * @var HolidayPeriodCollection
     */
    protected $holidayperiods;
    
    /**
     * Special offer price types
     * 
     * @var PriceTypeCollection
     */
    protected $pricetypes;
    
    /**
     * Website sections
     * 
     * @var WebsiteSectionCollection
     */
    protected $websitesections;
    
    /**
     * Sales channels
     * 
     * @var SalesChannelCollection
     */
    protected $saleschannels;
    
    /**
     * Promotions
     * 
     * @var PromotionCollection
     */
    protected $promotions;


    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->bookingperiods = new BookingPeriodCollection();
        $this->bookingperiods->setParent($this);
        $this->bookingperiods->setElementParent($this);
        
        $this->brandings = new BrandCollection();
        $this->brandings->setParent($this);
        $this->brandings->setElementParent($this);
        
        $this->holidayperiods = new HolidayPeriodCollection();
        $this->holidayperiods->setParent($this);
        $this->holidayperiods->setElementParent($this);
        
        $this->pricetypes = new PriceTypeCollection();
        $this->pricetypes->setParent($this);
        $this->pricetypes->setElementParent($this);
        
        $this->websitesections = new WebsiteSectionCollection();
        $this->websitesections->setParent($this);
        $this->websitesections->setElementParent($this);
        
        $this->saleschannels = new SalesChannelCollection();
        $this->saleschannels->setParent($this);
        $this->saleschannels->setElementParent($this);
        
        $this->promotions = new PromotionCollection();
        $this->promotions->setParent($this);
        $this->promotions->setElementParent($this);
    }
    
    /**
     * Add a booking period to the collection
     * 
     * @param \tabs\apiclient\core\specialoffer\BookingPeriod $bp Booking period
     * 
     * @return Specialoffer
     */
    public function addBookingPeriod(BookingPeriod $bp)
    {
        $this->bookingperiods->addElement($bp);
        
        return $this;
    }
    
    /**
     * Add a brand to the special offer
     * 
     * @param \tabs\apiclient\brand\ElementBranding $brd Branding
     * 
     * @return Specialoffer
     */
    public function addBranding(\tabs\apiclient\brand\ElementBranding $brd)
    {
        $this->brandings->addElement($brd);
        
        return $this;
    }
    
    /**
     * Add an applicable price type to the special offer
     * 
     * @param \tabs\apiclient\core\specialoffer\SpecialofferPriceType $pt Booking period
     * 
     * @return Specialoffer
     */
    public function addSpecialofferPriceType(\tabs\apiclient\core\specialoffer\SpecialofferPriceType $pt)
    {
        $this->pricetypes->addElement($pt);
        
        return $this;
    }
    
    /**
     * Add a holiday period to the collection
     * 
     * @param \tabs\apiclient\core\specialoffer\HolidayPeriod $hp Holiday period
     * 
     * @return Specialoffer
     */
    public function addHolidayPeriod(HolidayPeriod $hp)
    {
        $this->holidayperiods->addElement($hp);
        
        return $this;
    }
    
    /**
     * Add a website section to the collection
     * 
     * @param \tabs\apiclient\core\specialoffer\Websitesection $sec Special offer website section
     * 
     * @return Specialoffer
     */
    public function addWebsitesection(Websitesection $sec)
    {
        $this->websitesections->addElement($sec);
        
        return $this;
    }
    
    /**
     * Add a sales channel to the collection
     * 
     * @param \tabs\apiclient\core\specialoffer\SalesChannel $sc Special offer sales channel
     * 
     * @return Specialoffer
     */
    public function addSaleschannel(SalesChannel $sc)
    {
        $this->saleschannels->addElement($sc);
        
        return $this;
    }
    
    /**
     * Add a promotion to the collection
     * 
     * @param \tabs\apiclient\core\specialoffer\Promotion $pr Promotion object
     * 
     * @return Specialoffer
     */
    public function addPromotion(Promotion $pr)
    {
        $this->promotions->addElement($pr);
        
        return $this;
    }

    /**
     * Set the pricing period
     * 
     * @param PricingPeriod $pp Pricing period object
     * 
     * @return Specialoffer
     */
    public function setPricingperiod($pp)
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
            'active' => $this->boolToStr($this->getActive()),
            'pricingperiod' => $this->getPricingperiod()->toArray(),
            'description' => $this->getDescription(),
            'minimumholidaylength' => $this->getMinimumholidaylength(),
            'maximumholidaylength' => $this->getMaximumholidaylength(),
            'minimumoccupancy' => $this->getMinimumoccupancy(),
            'maximumoccupancy' => $this->getMaximumoccupancy(),
            'minimumdaysbeforeholiday' => $this->getMinimumdaysbeforeholiday(),
            'maximumdaysbeforeholiday' => $this->getMaximumdaysbeforeholiday(),
            'daysbeforeappliestowholeholiday' => $this->getDaysbeforeappliestowholeholiday(),
            'additional' => $this->boolToStr($this->getAdditional()),
            'advertise' => $this->boolToStr($this->getAdvertise()),
            'changedaystartfinishonly' => $this->boolToStr($this->getChangedaystartfinishonly()),
            'perperiod' => $this->boolToStr($this->getPerperiod()),
            'applytopartysizepricing' => $this->boolToStr($this->getApplytopartysizepricing())
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'specialoffer';
    }
}