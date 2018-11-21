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
 * @method Enquiry setEnquirydatetime(\DateTime $var) Sets the enquirydatetime
 * 
 * @method Enquiry setPets(integer $var) Sets the pets
 * 
 * @method Enquiry setBedrooms(integer $var) Sets the number of bedrooms
 * 
 * @method Enquiry setAdults(integer $var) Sets the number of adults
 * 
 * @method Enquiry setChildren(integer $var) Sets the number of children
 * 
 * @method Enquiry setInfants(integer $var) Sets the number of infants
 * 
 * @method Enquiry setContactfrequencydays(integer $var) Sets the number of contactfrequencydays
 * 
 * @method Enquiry setClosed(boolean $var) Sets the closed bool
 * 
 * @method Enquiry setMessage(string $var) Sets the enquiry message
 * 
 * 
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

    /**
     * Returns the marketingbrand
     *
     * @return \tabs\apiclient\MarketingBrand
     */
    public function getMarketingbrand()
    {
        return $this->marketingbrand;
    }

    /**
     * Returns the enquirydatetime
     *
     * @return \DateTime
     */
    public function getEnquirydatetime()
    {
        return $this->enquirydatetime;
    }

    /**
     * Returns the number of pets
     *
     * @return integer
     */
    public function getPets()
    {
        return $this->pets;
    }

    /**
     * Returns the number of bedrooms
     *
     * @return integer
     */
    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    /**
     * Returns the number of adults
     *
     * @return integer
     */
    public function getAdults()
    {
        return $this->adults;
    }

    /**
     * Returns the number of children
     *
     * @return integer
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Returns the number of infants
     *
     * @return integer
     */
    public function getInfants()
    {
        return $this->infants;
    }

    /**
     * Returns the number of contactfrequencydays
     *
     * @return integer
     */
    public function getContactfrequencydays()
    {
        return $this->contactfrequencydays;
    }

    /**
     * Returns the closed bool
     *
     * @return boolean
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Returns the enquiry message
     *
     * @return message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the enquiry dates
     *
     * @return \tabs\apiclient\Collection|enquiry\Dates[]
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * Get the enquiry properties
     *
     * @return \tabs\apiclient\Collection|enquiry\Property[]
     */
    public function getProperties()
    {
        return $this->properties;
    }
}