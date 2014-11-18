<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'autoload.php';
require_once $file;

/**
 * Fixtures for the api client test cases
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Fixtures
{
    /**
     * Create a new customer
     * 
     * @return \tabs\apiclient\actor\Customer
     */
    public static function getCustomer()
    {
        $customer = new \tabs\apiclient\actor\Customer();
        $customer->setId(1)->setTitle('Mr')->setSurname('Wyett');
        
        return $customer;
    }
    
    /**
     * Get a tabs user
     * 
     * @return \tabs\apiclient\actor\Tabsuser
     */
    public static function getTabsUser()
    {
        $user = new \tabs\apiclient\actor\Tabsuser();
        $user->setId(1)
            ->setTitle('Mr')
            ->setSurname('Wyett')
            ->setPassword('xyz123');
        
        $user->setRoles(array(Fixtures::getTabsRole()));
        
         return $user;
    }
    
    /**
     * Create a new owner
     * 
     * @return \tabs\apiclient\actor\Owner
     */
    public static function getOwner()
    {
        $contact = Fixtures::getContactAddress();
        $bankAccount = Fixtures::getBankAccount();
        
        $owner = new \tabs\apiclient\actor\Owner();
        $owner->setId(1)
            ->setTitle('Mr')
            ->setSurname('Wyett')
            ->setPassword('abc123')
            ->addContact($contact)
            ->addBankAccount($bankAccount);
        
        return $owner;
    }
    
    /**
     * Return a tabs role for a tabs user
     * 
     * @return \tabs\apiclient\actor\TabsRole
     */
    public static function getTabsRole()
    {
        $role = new \tabs\apiclient\actor\TabsRole();
        $role->setId(1)
            ->setTabsrole('Administrator')
            ->setDescription('This is the admin role');
        
        $role->setRoutes(
            array(
                Fixtures::getRoute()
            )
        );
        
        return $role;
    }


    /**
     * Return the test contact preference
     * 
     * @return \tabs\apiclient\actor\ContactPreference
     */
    public static function getContactPreference()
    {
        $preference = new \tabs\apiclient\actor\ContactPreference();
        $preference->setId(1)->setRolereason(
            array(
                'role' => 'Customer',
                'reason' => 'Booking Confirmation'
            )
        )->setPriority(1);
        
        return $preference;
    }
    
    /**
     * Return the test contact detail
     * 
     * @return \tabs\apiclient\actor\ContactDetail
     */
    public static function getContactDetail()
    {
        $detail = new \tabs\apiclient\actor\ContactDetail();
        $detail->setId(1)
            ->setType('C')
            ->setContactmethod('Phone')
            ->setContactmethodsubtype('Home')
            ->setValue('0800 100 100')
            ->setComment('Home Phone Number')
            ->setInvalid(false)
            ->setContactpreferences(
                array(self::getContactPreference())
            );
        
        return $detail;
    }
    
    /**
     * Return the test contact address
     * 
     * @return \tabs\apiclient\actor\ContactAddress
     */
    public static function getContactAddress()
    {
        $contactAddress = new \tabs\apiclient\actor\ContactAddress();
        $contactAddress->setId(1)
            ->setAddress(self::getAddress())
            ->setType('P')
            ->setInvalid(false);
        
        return $contactAddress;
    }
    
    /**
     * Return test address object
     * 
     * @return \tabs\apiclient\core\Address
     */
    public static function getAddress()
    {
        return \tabs\apiclient\core\Address::factory(
            array(
                'line1' => 'Developer Room',
                'line2' => 'Carlton House',
                'line3' => 'Market Place',
                'town' => 'Reepham',
                'county' => 'Norfolk',
                'postcode' => 'NR104JJ'
            )
        );
    }
    
    /**
     * Return a test country object
     * 
     * @return \tabs\apiclient\core\Country
     */
    public static function getCountry()
    {
        return \tabs\apiclient\core\Country::factory(
            array(
                'alpha2' => 'GB',
                'alpha3' => 'GBR',
                'name' => 'United Kingdom'
            )
        );
    }


    /**
     * Create a new bank account object
     * 
     * @return \tabs\apiclient\actor\BankAccount
     */
    public static function getBankAccount()
    {
        $bankAccount = new \tabs\apiclient\actor\BankAccount();
        $bankAccount->setId(1)
            ->setAccountname('Piggy')
            ->setAccountnumber('1234')
            ->setAddress(self::getAddress())
            ->setBankname('Bank Awesome')
            ->setRollnumber('123456')
            ->setSortcode('12-34-56');
        
        return $bankAccount;
    }
    
    /**
     * Create a new note a note text and assign a customer to each of them
     * 
     * @return \tabs\apiclient\core\Note
     */
    public static function getNote()
    {
        $actor = Fixtures::getCustomer();
        
        $noteType = Fixtures::getNotetype();
        
        $note = new \tabs\apiclient\core\Note();
        $note->setId(1)
            ->setCreatedby($actor)
            ->setCreated('2014-08-09 12:34:56')
            ->setNotetype($noteType);
        
        $noteText = new tabs\apiclient\core\Notetext();
        $noteText->setId(1)
            ->setText('This is a note.')
            ->setCreatedby($actor)
            ->setCreated('2014-08-09 12:34:56');
        $note->setNotetexts(array($noteText));
        
        return $note;
    }
    
    /**
     * Return a new language object
     * 
     * @return \tabs\apiclient\core\Language
     */
    public static function getLanguage()
    {
        $language = new tabs\apiclient\core\Language();
        return $language;
    }
    
    /**
     * Return a note type
     * 
     * @return \tabs\apiclient\core\Notetype
     */
    public static function getNotetype()
    {
        $noteType = new tabs\apiclient\core\Notetype();
        $noteType->setDescription('A note type')
            ->setType('Note type');
        
        return $noteType;
    }
    
    /**
     * Return a route
     * 
     * @return \tabs\apiclient\actor\Route
     */
    public static function getRoute()
    {
        $route = new tabs\apiclient\actor\Route();
        $route->setId(1)->setRoute('aurlpath');
        
        return $route;
    }
    
    /**
     * Return a property object
     * 
     * @return \tabs\apiclient\property\Property
     */
    public static function getProperty()
    {
        $property = new tabs\apiclient\property\Property();
        $property->setId(1)
            ->setTabspropref('ABC123')
            ->setName('A Cottage')
            ->setNamequalifier('Cottage 1')
            ->setAddress(Fixtures::getAddress())
            ->setSleeps(4)
            ->setBedrooms(2);
        
        $owner = Fixtures::getPropertyOwner();
        $property->addOwner($owner);
        
        $description = Fixtures::getPropertyDescription();
        $property->addDescription($description);
        
        $branding = Fixtures::getPropertyBranding();
        $property->addBranding($branding);
        
        $bool = Fixtures::getPropertyBooleanAttribute();
        $property->addAttribute($bool);
        
        $hybrid = Fixtures::getPropertyHybridAttribute();
        $property->addAttribute($hybrid);
        
        return $property;
    }
    
    /**
     * Return a property owner
     * 
     * @return \tabs\apiclient\property\propertyactor\Owner
     */
    public static function getPropertyOwner()
    {
        $owner = new \tabs\apiclient\property\propertyactor\Owner();
        $owner->setId(1)
            ->setFromdate(new \DateTime('2014-01-01'))
            ->setActor(Fixtures::getOwner());
        
        return $owner;
    }
    
    /**
     * Return the description type
     * 
     * @return \tabs\apiclient\property\description\Type
     */
    public static function getDescriptionType()
    {
        $type = new \tabs\apiclient\property\description\Type();
        $type->setId(1)->setEncoding('HTML')->setName('Full');
        
        return $type;
    }
    
    /**
     * Return a property description
     * 
     * @return \tabs\apiclient\property\description\Description
     */
    public static function getPropertyDescription()
    {
        $description = new tabs\apiclient\property\description\Description();
        $description->setId(1)
            ->setDescriptiontype(Fixtures::getDescriptionType())
            ->setDescription(
                '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>'
            );
        
        $branding = Fixtures::getPropertyBranding();
        $description->setMarketingbrand($branding->getMarketingbrand());
        
        return $description;
    }
    
    /**
     * Return a status
     * 
     * @return \tabs\apiclient\core\status\Status
     */
    public static function getStatus($name = 'Live')
    {
        $status = new tabs\apiclient\core\status\Status();
        $status->setId(1)->setName($name);
        
        return $status;
    }
    
    /**
     * Return a status history
     * 
     * @return \tabs\apiclient\core\status\History
     */
    public static function getNewStatusHistory()
    {
        $history = new tabs\apiclient\core\status\History();
        $status = Fixtures::getStatus('New');
        $history->setStatus($status)
            ->setFromdate('2012-01-01')
            ->setTodate('2012-01-31');
        
        return $history;
    }
    
    /**
     * Return a status history
     * 
     * @return \tabs\apiclient\core\status\History
     */
    public static function getLiveStatusHistory()
    {
        $history = new tabs\apiclient\core\status\History();
        $status = Fixtures::getStatus();
        $history->setId(1)
            ->setStatus($status)
            ->setFromdate('2012-01-31');
        
        return $history;
    }
    
    /**
     * Return a property marketing brand object
     * 
     * @return \tabs\apiclient\property\brand\MarketingBrand
     */
    public static function getPropertyMarketingBrand()
    {
        $marketingBrand = new \tabs\apiclient\property\brand\MarketingBrand();
        $status = Fixtures::getStatus();
        $liveStatusHistory = Fixtures::getLiveStatusHistory();
        $newStatusHistory = Fixtures::getNewStatusHistory();
        $marketingBrand->setId(1)
            ->setCode('NOMB')
            ->setName('Norfolk Country Cottages')
            ->setStatus($status)
            ->addStatusHistory($liveStatusHistory)
            ->addStatusHistory($newStatusHistory);
        
        return $marketingBrand;
    }
    
    /**
     * Return a property booking brand object
     * 
     * @return \tabs\apiclient\property\brand\BookingBrand
     */
    public static function getPropertyBookingBrand()
    {
        $bookingBrand = new \tabs\apiclient\property\brand\BookingBrand();
        $status = Fixtures::getStatus();
        $liveStatusHistory = Fixtures::getLiveStatusHistory();
        $newStatusHistory = Fixtures::getNewStatusHistory();
        $bookingBrand->setId(1)
            ->setCode('NOBB')
            ->setName('Norfolk Country Cottages')
            ->setStatus($status)
            ->addStatusHistory($liveStatusHistory)
            ->addStatusHistory($newStatusHistory);
        
        return $bookingBrand;
    }
    
    /**
     * Return a property booking brand object
     * 
     * @return \tabs\apiclient\property\brand\BrandingGroup
     */
    public static function getPropertyBrandingGroup()
    {
        $status = Fixtures::getStatus();
        $liveStatusHistory = Fixtures::getLiveStatusHistory();
        $newStatusHistory = Fixtures::getNewStatusHistory();
        $brandingGroup = new \tabs\apiclient\property\brand\BrandingGroup();
        $brandingGroup->setId(1)
            ->setStatus($status)
            ->addStatusHistory($liveStatusHistory)
            ->addStatusHistory($newStatusHistory);
        
        return $brandingGroup;
    }
    
    /**
     * Return a property branding object
     * 
     * @return \tabs\apiclient\property\brand\Branding
     */
    public static function getPropertyBranding()
    {
        $status = Fixtures::getStatus();
        $statusHistory = Fixtures::getLiveStatusHistory();
        $brandingGroup = Fixtures::getPropertyBrandingGroup();
        $marketingBrand = Fixtures::getPropertyMarketingBrand();
        $bookingBrand = Fixtures::getPropertyBookingBrand();
        $branding = new \tabs\apiclient\property\brand\Branding();
        $branding->setId(1)
            ->setStatus($status)
            ->addStatusHistory($statusHistory)
            ->setBrandinggroup($brandingGroup)
            ->setMarketingbrand($marketingBrand)
            ->setBookingbrand($bookingBrand);
        
        return $branding;
    }
    
    /**
     * Create a new boolean attribute
     * 
     * @return \tabs\apiclient\core\attribute\Attribute
     */
    public static function getBooleanAttribute()
    {
        $attr = new tabs\apiclient\core\attribute\Attribute();
        $attr->setId(1)
            ->setGroup(Fixtures::getAttributeGroup())
            ->setCode('ATTR01')
            ->setName('WiFi')
            ->setType('Boolean')
            ->setDescription('WiFi Enabled');
        
        return $attr;
    }
    
    /**
     * Return the property boolean attribute
     * 
     * @return \tabs\apiclient\property\PropertyAttribute
     */
    public static function getPropertyBooleanAttribute()
    {
        $pa = new \tabs\apiclient\property\PropertyAttribute();
        $pa->setId(1);
        $pa->setValue(true)
            ->setAttribute(Fixtures::getBooleanAttribute());
        
        return $pa;
    }
    
    /**
     * Create and return a hyrid attribute
     * 
     * @return \tabs\apiclient\core\attribute\Attribute
     */
    public static function getHybridAttribute()
    {
        $attr = new tabs\apiclient\core\attribute\Attribute();
        $attr->setId(2)
            ->setGroup(Fixtures::getAttributeGroup())
            ->setCode('ATTR02')
            ->setName('< Pub')
            ->setType('Hybrid')
            ->setDescription('Near a pub?')
            ->setOperator('<=')
            ->setMinimumvalue(1)
            ->setMaximumvalue(2000)
            ->setUnit(Fixtures::getUnit());
        
        return $attr;
    }
    
    /**
     * Return the property hybrid attribute
     * 
     * @return \tabs\apiclient\property\PropertyAttribute
     */
    public static function getPropertyHybridAttribute()
    {
        $pa = new \tabs\apiclient\property\PropertyAttribute();
        $pa->setId(2);
        $val = new \tabs\apiclient\core\attribute\Value();
        $val->setNumber(2)->setBoolean(true);
        $pa->setValue($val)->setAttribute(Fixtures::getHybridAttribute());
        
        return $pa;
    }

    /**
     * Create an return an attribute group
     * 
     * @return \tabs\apiclient\core\attribute\Group
     */
    public static function getAttributeGroup()
    {
        $group = new tabs\apiclient\core\attribute\Group();
        $group->setId(1)->setName('Misc');
        
        return $group;
    }

    /**
     * Create an return an attribute unit
     * 
     * @return \tabs\apiclient\core\Unit
     */
    public static function getUnit()
    {
        $unit = new tabs\apiclient\core\Unit();
        $unit->setId(1)
            ->setName('m')
            ->setDescription('Metre')
            ->setDecimalplaces(1);
        
        return $unit;
    }
}