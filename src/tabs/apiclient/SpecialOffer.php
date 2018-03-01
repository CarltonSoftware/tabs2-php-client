<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API SpecialOffer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getType() Returns the type string
 * @method SpecialOffer setType(string $var) Sets the type
 * 
 * @method boolean getActive() Returns the active boolean
 * @method SpecialOffer setActive(boolean $var) Sets the active
 * 
 * @method boolean getAvailabilityexists() Returns the availabilityexists boolean
 * @method SpecialOffer setAvailabilityexists(boolean $var) Sets the availabilityexists
 * 
 * @method boolean getArchived() Returns the archived boolean
 * @method SpecialOffer setArchived(boolean $var) Sets the archived
 * 
 * @method \DateTime getArchiveddatetime() Returns the archiveddatetime \DateTime
 * @method SpecialOffer setArchiveddatetime(\DateTime $var) Sets the archiveddatetime
 * 
 * @method string getDescription() Returns the description string
 * @method SpecialOffer setDescription(string $var) Sets the description
 * 
 * @method string getOfficedescription() Returns the officedescription string
 * @method SpecialOffer setOfficedescription(string $var) Sets the officedescription
 * 
 * @method integer getMinimumholidaylength() Returns the minimumholidaylength integer
 * @method SpecialOffer setMinimumholidaylength(integer $var) Sets the minimumholidaylength
 * 
 * @method integer getMaximumholidaylength() Returns the maximumholidaylength integer
 * @method SpecialOffer setMaximumholidaylength(integer $var) Sets the maximumholidaylength
 * 
 * @method integer getMinimumoccupancy() Returns the minimumoccupancy integer
 * @method SpecialOffer setMinimumoccupancy(integer $var) Sets the minimumoccupancy
 * 
 * @method integer getMaximumoccupancy() Returns the maximumoccupancy integer
 * @method SpecialOffer setMaximumoccupancy(integer $var) Sets the maximumoccupancy
 * 
 * @method integer getMinimumdaysbeforeholiday() Returns the minimumdaysbeforeholiday integer
 * @method SpecialOffer setMinimumdaysbeforeholiday(integer $var) Sets the minimumdaysbeforeholiday
 * 
 * @method integer getMaximumdaysbeforeholiday() Returns the maximumdaysbeforeholiday integer
 * @method SpecialOffer setMaximumdaysbeforeholiday(integer $var) Sets the maximumdaysbeforeholiday
 * 
 * @method boolean getDaysbeforeappliestowholeholiday() Returns the daysbeforeappliestowholeholiday boolean
 * @method SpecialOffer setDaysbeforeappliestowholeholiday(boolean $var) Sets the daysbeforeappliestowholeholiday
 * 
 * @method boolean getAdditional() Returns the additional boolean
 * @method SpecialOffer setAdditional(boolean $var) Sets the additional
 * 
 * @method boolean getAdvertise() Returns the advertise boolean
 * @method SpecialOffer setAdvertise(boolean $var) Sets the advertise
 * 
 * @method boolean getChangedaystartfinishonly() Returns the changedaystartfinishonly boolean
 * @method SpecialOffer setChangedaystartfinishonly(boolean $var) Sets the changedaystartfinishonly
 * 
 * @method boolean getHaspromotions() Returns the haspromotions boolean
 * @method SpecialOffer setHaspromotions(boolean $var) Sets the haspromotions
 * 
 * @method integer getConfirmedbookingsinperiod() Returns the confirmedbookingsinperiod integer
 * @method SpecialOffer setConfirmedbookingsinperiod(integer $var) Sets the confirmedbookingsinperiod
 * 
 * @method float getCommissionpercentage() Returns the commissionpercentage float
 * @method SpecialOffer setCommissionpercentage(float $var) Sets the commissionpercentage
 * 
 * @method float getFixedprice() Returns the fixedprice float
 * @method SpecialOffer setFixedprice(float $var) Sets the fixedprice
 * 
 * @method float getAmount() Returns the amount float
 * @method SpecialOffer setAmount(float $var) Sets the amount
 * 
 * @method float getPercentage() Returns the percentage float
 * @method SpecialOffer setPercentage(float $var) Sets the percentage
 * 
 * @method Currency getCurrency() Returns the currency object
 * @method boolean getPerperiod() Returns the perperiod boolean
 * @method SpecialOffer setPerperiod(boolean $var) Sets the perperiod
 * 
 * @method boolean getApplytopartysizepricing() Returns the applytopartysizepricing boolean
 * @method SpecialOffer setApplytopartysizepricing(boolean $var) Sets the applytopartysizepricing
 * 
 * @method PricingPeriod getPricingperiod() Returns the pricingperiod object
 * @method TabsUser getArchivedby() Returns the archivedby object
 * 
 * @method Collection|specialoffer\BookingPeriod[]          getBookingperiods()          Returns the booking periods collection
 * @method Collection|specialoffer\HolidayPeriod[]          getHolidayperiods()          Returns the holiday periods collection
 * @method Collection|specialoffer\Branding[]               getBrandings()               Returns the offer brandings
 * @method Collection|specialoffer\Attribute[]              getAttributes()              Returns the offers attributes
 * @method Collection|specialoffer\PropertyBranding[]       getPropertybrandings()       Returns the offers property brandings
 * @method Collection|specialoffer\ConfirmedBookingPeriod[] getConfirmedbookingperiods() Returns the confirmed booking periods
 * @method Collection|specialoffer\Promotion[]              getPromotions()              Returns the promotions
 * @method Collection|specialoffer\SalesChannel[]           getSaleschannels()           Returns the sales channels
 * @method Collection|specialoffer\WebsiteSection[]         getWebsitesections()         Returns the website sections
 */
class SpecialOffer extends Builder
{
    /**
     * Type
     *
     * @var string
     */
    protected $type = 'Amount';

    /**
     * Active
     *
     * @var boolean
     */
    protected $active = false;

    /**
     * Availabilityexists
     *
     * @var boolean
     */
    protected $availabilityexists = false;

    /**
     * Archived
     *
     * @var boolean
     */
    protected $archived = false;

    /**
     * Archiveddatetime
     *
     * @var \DateTime
     */
    protected $archiveddatetime;

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Officedescription
     *
     * @var string
     */
    protected $officedescription = '';

    /**
     * Minimumholidaylength
     *
     * @var integer
     */
    protected $minimumholidaylength = 0;

    /**
     * Maximumholidaylength
     *
     * @var integer
     */
    protected $maximumholidaylength = 0;

    /**
     * Minimumoccupancy
     *
     * @var integer
     */
    protected $minimumoccupancy = 0;

    /**
     * Maximumoccupancy
     *
     * @var integer
     */
    protected $maximumoccupancy = 0;

    /**
     * Minimumdaysbeforeholiday
     *
     * @var integer
     */
    protected $minimumdaysbeforeholiday = 0;

    /**
     * Maximumdaysbeforeholiday
     *
     * @var integer
     */
    protected $maximumdaysbeforeholiday = 0;

    /**
     * Daysbeforeappliestowholeholiday
     *
     * @var boolean
     */
    protected $daysbeforeappliestowholeholiday = false;

    /**
     * Additional
     *
     * @var boolean
     */
    protected $additional = false;

    /**
     * Advertise
     *
     * @var boolean
     */
    protected $advertise = false;

    /**
     * Changedaystartfinishonly
     *
     * @var boolean
     */
    protected $changedaystartfinishonly = false;

    /**
     * Haspromotions
     *
     * @var boolean
     */
    protected $haspromotions = false;

    /**
     * Confirmedbookingsinperiod
     *
     * @var integer
     */
    protected $confirmedbookingsinperiod = 0;

    /**
     * Commissionpercentage
     *
     * @var float
     */
    protected $commissionpercentage = 0;

    /**
     * Fixedprice
     *
     * @var float
     */
    protected $fixedprice = 0;

    /**
     * Amount
     *
     * @var float
     */
    protected $amount = 0;

    /**
     * Percentage
     *
     * @var float
     */
    protected $percentage = 0;

    /**
     * Currency
     *
     * @var Currency
     */
    protected $currency;

    /**
     * Perperiod
     *
     * @var boolean
     */
    protected $perperiod = false;

    /**
     * Applytopartysizepricing
     *
     * @var boolean
     */
    protected $applytopartysizepricing = false;

    /**
     * Pricingperiod
     *
     * @var PricingPeriod
     */
    protected $pricingperiod;

    /**
     * Archivedby
     *
     * @var TabsUser
     */
    protected $archivedby;
    
    /**
     * Special offer attributes
     * 
     * @var Collection|specialoffer\Attribute[]
     */
    protected $attributes;
    
    /**
     * Special offer booking periods
     * 
     * @var Collection|specialoffer\BookingPeriod[]
     */
    protected $bookingperiods;
    
    /**
     * Special offer holiday periods
     * 
     * @var Collection|specialoffer\HolidayPeriod[]
     */
    protected $holidayperiods;
    
    /**
     * Special offer brandings
     * 
     * @var Collection|specialoffer\Branding[]
     */
    protected $brandings;
    
    /**
     * Special offer property brandings
     * 
     * @var Collection|specialoffer\PropertyBranding[]
     */
    protected $propertybrandings;
    
    /**
     * Special offer confirmed booking periods
     * 
     * @var Collection|specialoffer\ConfirmedBookingPeriod[]
     */
    protected $confirmedbookingperiods;
    
    /**
     * Special offer promotions
     * 
     * @var Collection|specialoffer\Promotion[]
     */
    protected $promotions;
    
    /**
     * Special offer sales channels
     * 
     * @var Collection|specialoffer\SalesChannel[]
     */
    protected $saleschannels;
    
    /**
     * Special offer website sections
     * 
     * @var Collection|specialoffer\WebsiteSection[]
     */
    protected $websitesections;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->attributes = Collection::factory(
            'attribute',
            new specialoffer\Attribute(),
            $this
        );
        
        $this->bookingperiods = Collection::factory(
            'bookingperiod',
            new specialoffer\BookingPeriod(),
            $this
        );
        
        $this->holidayperiods = Collection::factory(
            'holidayperiod',
            new specialoffer\HolidayPeriod(),
            $this
        );
        
        $this->brandings = Collection::factory(
            'branding',
            new specialoffer\Branding(),
            $this
        );
        
        $this->propertybrandings = Collection::factory(
            'propertybranding',
            new specialoffer\PropertyBranding(),
            $this
        );
        
        $this->confirmedbookingperiods = Collection::factory(
            'confirmedbookingperiod',
            new specialoffer\ConfirmedBookingPeriod(),
            $this
        );
        
        $this->promotions = Collection::factory(
            'promotion',
            new specialoffer\Promotion(),
            $this
        );
        
        $this->saleschannels = Collection::factory(
            'saleschannel',
            new specialoffer\SalesChannel(),
            $this
        );
        
        $this->websitesections = Collection::factory(
            'websitesection',
            new specialoffer\WebsiteSection(),
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|Currency $currency The Currency
     *
     * @return SpecialOffer
     */
    public function setCurrency($currency)
    {
        $this->currency = Currency::factory($currency);

        return $this;
    }

    /**
     * Set the pricingperiod
     *
     * @param stdclass|array|PricingPeriod $pricingperiod The Pricingperiod
     *
     * @return SpecialOffer
     */
    public function setPricingperiod($pricingperiod)
    {
        $this->pricingperiod = PricingPeriod::factory($pricingperiod);

        return $this;
    }

    /**
     * Set the archivedby
     *
     * @param stdclass|array|TabsUser $archivedby The Archivedby
     *
     * @return SpecialOffer
     */
    public function setArchivedby($archivedby)
    {
        $this->archivedby = TabsUser::factory($archivedby);

        return $this;
    }
    
    /**
     * Find if a date lies within the special offer holiday periods
     * 
     * @param \DateTime $date Date to test
     * 
     * @return boolean
     */
    public function isHolidayPeriod(\DateTime $date)
    {
        return $this->getHolidayperiods()->findBy(function($hp) use ($date) {
            return $date >= $hp->getFromdate() && $hp->getTodate() >= $date;
        })->count() > 0;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        
        if ($this->getCurrency()) {
            $arr['currencycode'] = $this->getCurrency()->getCode();
        }
        
        if ($this->getArchivedby()) {
            $arr['archivedbyactorid'] = $this->getArchivedby()->getId();
        }

        return $arr;
    }
}