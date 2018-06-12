<?php

namespace tabs\apiclient\actor;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Enquiry object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\MarketingBrand getMarketingbrand() Returns the marketingbrand
 * @method \DateTime getEnquirydatetime() Returns the enquirydatetime
 * @method Enquiry setEnquirydatetime(\DateTime $var) Sets the enquirydatetime
 * 
 * @method integer getPets() Returns the number of pets
 * @method Enquiry setPets(integer $var) Sets the pets
 * 
 * @method integer getBedrooms() Returns the number of bedrooms
 * @method Enquiry setBedrooms(integer $var) Sets the number of bedrooms
 * 
 * @method integer getAdults() Returns the number of adults
 * @method Enquiry setAdults(integer $var) Sets the number of adults
 * 
 * @method integer getChildren() Returns the number of children
 * @method Enquiry setChildren(integer $var) Sets the number of children
 * 
 * @method integer getInfants() Returns the number of infants
 * @method Enquiry setInfants(integer $var) Sets the number of infants
 * 
 * @method integer getContactfrequencydays() Returns the number of contactfrequencydays
 * @method Enquiry setContactfrequencydays(integer $var) Sets the number of contactfrequencydays
 * 
 * @method boolean getClosed() Returns the closed bool
 * @method Enquiry setClosed(boolean $var) Sets the closed bool
 * 
 * @method message getMessage() Returns the enquiry message
 * @method Enquiry setMessage(string $var) Sets the enquiry message
 * 
 * 
 * @method \tabs\apiclient\Collection|enquiry\Dates[] getDates() Get the enquiry dates
 * @method \tabs\apiclient\Collection|enquiry\Property[] getProperties() Get the enquiry properties
 */
class Enquiry extends Builder
{
    /**
     * Marketingbrand
     *
     * @var \tabs\apiclient\MarketingBrand
     */
    protected $marketingbrand;

    /**
     * Enquirydatetime
     *
     * @var \DateTime
     */
    protected $enquirydatetime;

    /**
     * Pets
     *
     * @var integer
     */
    protected $pets = 0;

    /**
     * Bedrooms
     *
     * @var integer
     */
    protected $bedrooms = 0;

    /**
     * Adults
     *
     * @var integer
     */
    protected $adults = 0;

    /**
     * Children
     *
     * @var integer
     */
    protected $children = 0;

    /**
     * Infants
     *
     * @var integer
     */
    protected $infants = 0;

    /**
     * Contactfrequencydays
     *
     * @var integer
     */
    protected $contactfrequencydays = 0;

    /**
     * Closed
     *
     * @var boolean
     */
    protected $closed = false;
    
    /**
     * Dates collection
     * 
     * @var \tabs\apiclient\Collection|enquiry\Dates[]
     */
    protected $dates;
    
    /**
     * Property collection
     * 
     * @var \tabs\apiclient\Collection|enquiry\Property[]
     */
    protected $properties;
    
    /**
     * @var string
     */
    protected $message;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->enquirydatetime = new \DateTime();
        $this->dates = \tabs\apiclient\Collection::factory(
            'dates',
            new enquiry\Dates(),
            $this
        );
        $this->properties = \tabs\apiclient\Collection::factory(
            'property',
            new enquiry\Property(),
            $this
        );
        $this->marketingbrand = new \tabs\apiclient\MarketingBrand();
        
        parent::__construct($id);
    }
}