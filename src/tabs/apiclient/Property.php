<?php

namespace tabs\apiclient;
use tabs\apiclient\property\Document;
use tabs\apiclient\property\Inspection;
use tabs\apiclient\property\MarketingBrand;
use tabs\apiclient\property\BookingBrand;
use tabs\apiclient\property\Branding;
use tabs\apiclient\note\PropertyNote;
use tabs\apiclient\property\Attribute;
use tabs\apiclient\property\Comment;
use tabs\apiclient\property\Commission;
use tabs\apiclient\property\Office;
use tabs\apiclient\property\Owner;
use tabs\apiclient\property\OwnerPaymentTerms;

/**
 * Tabs Rest API Property object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string   getTabspropref()            Returns the tabs property ref
 * @method Property setTabspropref(string $ref) Sets the tabs property ref
 * 
 * @method string   getName()             Returns the property name
 * @method Property setName(string $name) Sets the tabs property name
 * 
 * @method string   getNamequalifier()                      Returns the qualifier
 * @method Property setNamequalifier(string $namequalifier) Sets the qualifier
 * 
 * @method string   getAccomodationdescription()             Returns the accomodation description
 * @method Property setAccomodationdescription(string $desc) Sets the accomodation description
 * 
 * @method Address  getAddress() Returns the address
 * 
 * @method integer  getSleeps()                Returns the sleeps value
 * @method Property setSleeps(integer $sleeps) Sets the sleeps value
 * 
 * @method integer  getBedrooms()                  Returns the bedrooms value
 * @method Property setBedrooms(integer $bedrooms) Sets the bedrooms value
 * 
 * @method integer  getRating() Returns the property rating
 * 
 * @method Collection|Document[] getDocuments() Get the documents
 * 
 * @method Collection|PropertyNote[] getNotes() Get the Notes
 * 
 * @method Collection|MarketingBrand[] getMarketingbrands() Get the property marketing brands
 * 
 * @method Collection|BookingBrand[] getBookingbrands() Get the property booking brands
 * 
 * @method Collection|Branding[] getBrandings() Get the property brandings
 * 
 * @method Branding getPrimarypropertybranding() Get the primary property branding
 * 
 * @method Collection|Inspection[] getInspections() Get the property inspections
 * 
 * @method Collection|Comment[] getComments() Get the property comments
 * 
 * @method Collection|Attribute[] getAttributes() Get the property attributes
 * 
 * @method Collection|Commission[] getCommissions() Get the property commissions
 * 
 * @method Collection|Office[] getOffices() Get the property offices
 * 
 * @method Collection|Owner[] getOwners() Get the property owners
 * 
 * @method Collection|OwnerPaymentTerms[] getOwnerpaymenttermss() Get the property owner payment terms
 */
class Property extends Builder
{
    /**
     * Tabs reference
     * 
     * @var string
     */
    protected $tabspropref = '';
    
    /**
     * Property name
     * 
     * @return string
     */
    protected $name = '';
    
    /**
     * Name differentiator
     * 
     * @var string
     */
    protected $namequalifier = '';
    
    /**
     * Accomodation description
     * 
     * @var string
     */
    protected $accomodationdescription = '';
    
    /**
     * Property address
     * 
     * @var Address
     */
    protected $address;
    
    /**
     * Property accommodation limit
     * 
     * @var integer
     */
    protected $sleeps = 0;
    
    /**
     * Property bedrooms
     * 
     * @var integer
     */
    protected $bedrooms = 0;
    
    /**
     * Property rating
     * 
     * @var integer
     */
    protected $rating = 0;
    
    /**
     * Property documents
     * 
     * @var Collection|Document[]
     */
    protected $documents;
    
    /**
     * Primary property branding
     * 
     * @var Branding
     */
    protected $primarypropertybranding;
    
    /**
     * Property notes
     * 
     * @var Collection|PropertyNote[]
     */
    protected $notes;
    
    /**
     * Property mb
     * 
     * @var Collection|MarketingBrand[]
     */
    protected $marketingbrands;
    
    /**
     * Property bb
     * 
     * @var Collection|BookingBrand[]
     */
    protected $bookingbrands;
    
    /**
     * Property branding
     * 
     * @var Collection|Branding[]
     */
    protected $brandings;
    
    /**
     * Property inspections
     * 
     * @var Collection|Inspection[]
     */
    protected $inspections;
    
    /**
     * Property Attributes
     * 
     * @var Collection|Attribute[]
     */
    protected $attributes;
    
    /**
     * Property Comments
     * 
     * @var Collection|Comment[]
     */
    protected $comments;
    
    /**
     * Property Commission
     * 
     * @var Collection|Commission[]
     */
    protected $commissions;
    
    /**
     * Property Offices
     * 
     * @var Collection|Office[]
     */
    protected $offices;
    
    /**
     * Property Owners
     * 
     * @var Collection|Owner[]
     */
    protected $owners;
    
    /**
     * Owner payment terms
     * 
     * @var Collection|OwnerPaymentTerms[]
     */
    protected $ownerpaymenttermss;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Constructor.
     * 
     * Creates a new property address
     * 
     * @return void
     */
    public function __construct($id = null)
    {
        $this->address = new Address();
        $this->status = Status::factory(array('name' => 'New'));
        
        $collections = array(
            'documents' => new Document(),
            'note' => new PropertyNote(),
            'marketingbrand' => new MarketingBrand(),
            'bookingbrand' => new BookingBrand(),
            'branding' => new Branding(),
            'inspection' => new Inspection(),
            'attribute' => new Attribute(),
            'comment' => new Comment(),
            'offices' => new Office(),
            'owner' => new Owner(),
            'ownerpaymenterms' => new OwnerPaymentTerms()
        );
        
        foreach ($collections as $route => $obj) {
            $prop = $route . 's';
            
            $this->$prop = Collection::factory(
                $route,
                $obj,
                $this
            );
        }
        
        parent::__construct($id);
    }
    
    /**
     * Set the address on the property
     * 
     * @param Address|stdClass|Array $addr Address object/array
     * 
     * @return \tabs\apiclient\property\Property
     */
    public function setAddress($addr)
    {
        $address = Address::factory($addr);
        $address->setParent($this);
        $this->address = $address;
        
        return $this;
    }
    
    /**
     * Set the primary property branding
     * 
     * @param array|sdClass|PropertyBranding $branding Set the primary prop branding
     * 
     * @return Property
     */
    public function setPrimarypropertybranding($branding)
    {
        $this->primarypropertybranding = Branding::factory($branding);
        $this->primarypropertybranding->setParent($this);
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'namequalifier' => $this->getNamequalifier(),
            'address' => $this->getAddress()->toArray(),
            'sleeps' => $this->getSleeps(),
            'bedrooms' => $this->getBedrooms(),
            'tabspropref' => $this->getTabspropref()
        );
    }
}