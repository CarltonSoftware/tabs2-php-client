<?php

/**
 * Tabs Rest API Property object.
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

namespace tabs\apiclient\property;
use tabs\apiclient\core\Address;
use tabs\apiclient\core\status\Status;
use tabs\apiclient\collection\property\propertyactor\Owner as OwnerCollection;
use tabs\apiclient\collection\property\propertyactor\Cleaner as CleanerCollection;
use tabs\apiclient\collection\property\propertyactor\Keyholder as KeyholderCollection;
use tabs\apiclient\collection\property\description\Description as DescriptionCollection;
use tabs\apiclient\collection\property\PropertyAttribute as AttributeCollection;
use tabs\apiclient\property\description\Description as PropertyDescription;
use tabs\apiclient\property\brand\Branding;
use tabs\apiclient\property\Image as PropertyImage;

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
 * @method Address  getAddress() Returns the address
 * 
 * @method integer  getSleeps()                Returns the sleeps value
 * @method Property setSleeps(integer $sleeps) Sets the sleeps value
 * 
 * @method integer  getBedrooms()                  Returns the bedrooms value
 * @method Property setBedrooms(integer $bedrooms) Sets the bedrooms value
 * 
 * @method Branding[] getBrandings() Get the branding combinations
 */
class Property extends \tabs\apiclient\core\Builder
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
     * Property address
     * 
     * @var \tabs\apiclient\core\Address
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
     * Array of branding objects
     * 
     * @var Branding[]
     */
    protected $brandings = array();
    
    /**
     * Collections array
     * 
     * @var \tabs\apiclient\collection\Collection[]
     */
    protected $collections = array();

    // -------------------------- Static Functions -------------------------- //

    /**
     * Create a property object from a given id
     *
     * @param string $id ID
     *
     * @return \tabs\apiclient\property\Property
     */
    public static function get($id)
    {
        return parent::_get('/property/' . $id);
    }

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Constructor.
     * 
     * Creates a new property address
     * 
     * @return void
     */
    public function __construct()
    {
        $this->address = new Address();
        $this->status = Status::factory(array('name' => 'New'));
    }
    
    /**
     * Add a brand into the property
     * 
     * @param Branding $brand Brand object
     * 
     * @return Property
     */
    public function addBranding(Branding &$brand)
    {
        $brand->setParent($this);
        $brand->updatePropertyParent();
        $this->brandings[] = $brand;
        
        return $this;
    }
    
    /**
     * Add an owner object
     * 
     * @param propertyactor\Owner $owner Property owner object
     * 
     * @return Property
     */
    public function addOwner(propertyactor\Owner &$owner)
    {
        $owner->setParent($this);
        $this->getOwners()->addElement($owner);
        
        return $this;
    }
    
    /**
     * Get all of the owners for the property
     * 
     * @return OwnerCollection
     */
    public function getOwners()
    {
        return $this->_getActorCollection('Owner');
    }
    
    /**
     * Add a cleaner object
     * 
     * @param propertyactor\Cleaner $cleaner Property cleaner object
     * 
     * @return Property
     */
    public function addCleaner(propertyactor\Cleaner &$cleaner)
    {
        $cleaner->setParent($this);
        $this->getCleaners()->addElement($cleaner);
        
        return $this;
    }
    
    /**
     * Get all of the cleaners for the property
     * 
     * @return CleanerCollection
     */
    public function getCleaners()
    {
        return $this->_getActorCollection('Cleaner');
    }
    
    /**
     * Add an keyholder object
     * 
     * @param propertyactor\Keyholder $cleaner Property keyholder object
     * 
     * @return Property
     */
    public function addKeyholder(propertyactor\Keyholder &$keyholder)
    {
        $keyholder->setParent($this);
        $this->getKeyholders()->addElement($keyholder);
        
        return $this;
    }
    
    /**
     * Get all of the keyholders for the property
     * 
     * @return KeyholderCollection
     */
    public function getKeyholders()
    {
        return $this->_getActorCollection('Keyholder');
    }
    
    /**
     * Add a description to the property
     * 
     * @param PropertyDescription $description Property description object
     * 
     * @return Property
     */
    public function addDescription(PropertyDescription &$description)
    {
        $description->setParent($this);
        $this->getDescriptions()->addElement($description);
        
        return $this;
    }
    
    /**
     * Return a description collection object
     * 
     * @return \tabs\apiclient\collection\property\description\Description
     */
    public function getDescriptions()
    {
        return $this->_getCollection(
            '\\tabs\\apiclient\\collection\\property\\description\\Description'
        );
    }
    
    /**
     * Add a property attribute to the property
     * 
     * @param PropertyAttribute $attribute Property attribute object
     * 
     * @return Property
     */
    public function addAttribute(PropertyAttribute &$attribute)
    {
        $attribute->setParent($this);
        $this->getAttributes()->addElement($attribute);
        
        return $this;
    }
    
    /**
     * Return a property attribute collection object
     * 
     * @return \tabs\apiclient\collection\property\PropertyAttribute
     */
    public function getAttributes()
    {
        return $this->_getCollection(
            '\\tabs\\apiclient\\collection\\property\\PropertyAttribute'
        );
    }
    
    /**
     * Return a booking collection object
     *
     * @return \tabs\apiclient\collection\booking\Booking
     */
    public function getBookings()
    {
        return $this->_getCollection(
            '\\tabs\\apiclient\\collection\\booking\\Booking'
        );
    }

    /**
     * Add an image to the property
     * 
     * @param PropertyImage $image Property image object
     * 
     * @return Property
     */
    public function addImage(PropertyImage &$image)
    {
        $image->setParent($this);
        $this->getImages()->addElement($image);
        
        return $this;
    }
    
    /**
     * Return a property attribute collection object
     * 
     * @return \tabs\apiclient\collection\property\Image
     */
    public function getImages()
    {
        return $this->_getCollection(
            '\\tabs\\apiclient\\collection\\property\\Image'
        );
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
     * Set the property branding elements
     * 
     * @param array $brands Brands array
     * 
     * @return \tabs\apiclient\property\Property
     */
    public function setBrandings(array $brands)
    {
        foreach ($brands as $brnd) {
            $brand = Branding::factory($brnd);
            $this->addBranding($brand);
        }
        
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

    // ------------------------- Private Functions -------------------------- //
    
    /**
     * Return a new collection type and instantiate if needed
     * 
     * @param string $class Class string
     * 
     * @return \tabs\apiclient\collection\Collection
     */
    private function _getCollection($class)
    {
        if (!isset($this->collections[$class])) {
            $this->collections[$class] = new $class();
            $this->collections[$class]->setElementParent($this);
        }
        
        return $this->collections[$class];
    }

    /**
     * Get (and create) an actor collection
     * 
     * @param string $class Class name
     * 
     * @return OwnerCollection|CleanerCollection|CustomerCollection|KeyholderCollection
     */
    private function _getActorCollection($class)
    {
        return $this->_getCollection(
            "\\tabs\\apiclient\\collection\\property\\propertyactor\\" . $class
        );
    }
}