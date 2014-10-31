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
 * @method integer  getId()            Returns the ID
 * @method Property setId(integer $id) Sets the ID
 * 
 * @method string   getTabspropref()            Returns the tabs property ref
 * @method Property setTabspropref(string $ref) Sets the tabs property ref
 * 
 * @method Status   getStatus() Returns the property status
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
 */
class Property extends \tabs\apiclient\core\Builder
{
    /**
     * Property ID
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Tabs reference
     * 
     * @var string
     */
    protected $tabspropref = '';

    /**
     * Property status
     * 
     * @var Status
     */
    protected $status;
    
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
     * @var Brand[]
     */
    protected $brandings = array();

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
     * Get all of the owners for the property
     * 
     * @return \tabs\apiclient\collection\propertyactor\Owner
     */
    public function getOwners()
    {
        return $this->_getActors('Owner');
    }
    
    /**
     * Get all of the cleaners for the property
     * 
     * @return \tabs\apiclient\collection\propertyactor\Cleaner
     */
    public function getCleaners()
    {
        return $this->_getActors('Cleaner');
    }
    
    /**
     * Get all of the keyholders for the property
     * 
     * @return \tabs\apiclient\collection\propertyactor\Keyholder
     */
    public function getKeyholders()
    {
        return $this->_getActors('Keyholder');
    }
    
    /**
     * Set the address on the property
     * 
     * @param Address|stdClass|Array $address Address object/array
     * 
     * @return \tabs\apiclient\property\Property
     */
    public function setAddress($address)
    {
        $address = Address::factory($address);
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
            $brand = Brand::factory($brnd);
            $this->_addBrand($brand);
        }
        
        return $this;
    }
    
    /**
     * Set the property status
     * 
     * @param Status|array|stdClass $status Status
     * 
     * @return \tabs\apiclient\property\Property
     */
    public function setStatus($status)
    {
        $this->status = Status::factory($status);
        
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

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Add a brand into the property
     * 
     * @param Brand $brand Brand object
     * 
     * @return Property
     */
    private function _addBrand(Brand &$brand)
    {
        $brand->setParent($this);
        $this->brandings[] = $brand;
        
        return $this;
    }
    
    /**
     * Get actors
     * 
     * @param string $class Property actor collection class name
     * 
     * @return \tabs\apiclient\collection\propertyactor\PropertyActor
     */
    private function _getActors($class)
    {
        $nsClass = "\\tabs\\apiclient\\collection\\propertyactor\\" . $class;
        $collection = new $nsClass();
        $collection->setRoute(
            '/property/' . $this->getId() . '/' . strtolower($class)
        );
        
        return $collection->fetch()->getElements();
    }
}