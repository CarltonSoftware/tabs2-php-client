<?php

namespace tabs\apiclient\property;
use tabs\apiclient\Builder;
use tabs\apiclient\core\Address;
use tabs\apiclient\core\Status;
use tabs\apiclient\Collection;
use tabs\apiclient\property\PropertyDocument;

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
 * @method Collection|PropertyDocument[] getDocuments() Get the documents
 * 
 * @method PropertyBranding getPrimarypropertybranding() Get the primary property branding
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
     * @var Collection|PropertyDocument[]
     */
    protected $documents;
    
    /**
     * Primary property branding
     * 
     * @var PropertyBranding
     */
    protected $primarypropertybranding;

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
        
        $this->documents = Collection::factory(
            'document',
            new PropertyDocument(),
            $this
        );
        
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
        $this->primarypropertybranding = PropertyBranding::factory($branding);
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