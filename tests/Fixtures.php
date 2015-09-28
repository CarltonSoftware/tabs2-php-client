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

        $doc = Fixtures::getActorDocument();
        $customer->addDocument($doc);

        return $customer;
    }
    
    /**
     * Create a new agency
     * 
     * @return \tabs\apiclient\actor\Agency
     */
    public static function getAgency()
    {
        $agency = new \tabs\apiclient\actor\Agency();
        $agency->setId(1)->setCompanyname('Norfolk Country Cottages');
        
        return $agency;
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
            ->addContactdetail($contact)
            ->addBankAccount($bankAccount);

        return $owner;
    }

    /**
     * Create a new (empty) owner collection
     *
     * @return \tabs\apiclient\collection\actor\Owner
     */
    public static function getOwnerCollection()
    {
        return new \tabs\apiclient\collection\actor\Owner();
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
        $detail = new \tabs\apiclient\actor\ContactDetailOther();
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
        $contactAddress = new \tabs\apiclient\actor\ContactDetailPostal();
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
     * Create a new note and a note text, and assign a customer to both
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
     * Create a new contact
     *
     * @return \tabs\apiclient\actor\Contact
     */
    public static function getContact()
    {
        $actor = Fixtures::getCustomer();

        $contact = new \tabs\apiclient\actor\Contact;
        $contact->setId(1);

        return $contact;
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
     * Return a sales channel
     *
     * @return \tabs\apiclient\core\SalesChannel
     */
    public static function getSalesChannel()
    {
        $salesChannel = new tabs\apiclient\core\SalesChannel();
        $salesChannel->setId(2)
            ->setSaleschannel('Group Website')
            ->setDescription('Sales made via a group website, e.g. Original Cottages');

        return $salesChannel;
    }

    /**
     * Return a price type
     *
     * @return \tabs\apiclient\core\pricing\PriceType
     */
    public static function getPriceType()
    {
        $priceType = new tabs\apiclient\core\pricing\PriceType();
        $priceType->setId(1)
            ->setPricetype('1D')
            ->setDescription('1 Day Break')
            ->setPricingperiod('Day')
            ->setPeriods(1);

        return $priceType;
    }

    /**
     * Return a price type branding
     *
     * @return \tabs\apiclient\core\pricing\PriceTypeBranding
     */
    public static function getPriceTypeBranding()
    {
        $branding = Fixtures::getBranding();
        
        $priceTypeBranding = new tabs\apiclient\core\pricing\PriceTypeBranding();
        $priceTypeBranding->setBranding($branding)
            ->setFromdate(new \DateTime('2015-03-19'))
            ->setTodate(new \DateTime('2032-07-06'))
            ->setSaleschannel(Fixtures::getSalesChannel());

        return $priceTypeBranding;
    }

    /**
     * Return a pricing method
     *
     * @return \tabs\apiclient\core\pricing\PricingMethod
     */
    public static function getPricingMethod()
    {
        $pricingMethod = new tabs\apiclient\core\pricing\PricingMethod();
        $pricingMethod->setId(1)
            ->setPricingmethod('Default')
            ->setDescription('Tabs New Pricing');

        return $pricingMethod;
    }

    /**
     * Return a pricing method branding
     *
     * @return \tabs\apiclient\core\pricing\PricingMethodBranding
     */
    public static function getPricingMethodBranding()
    {
        $branding = Fixtures::getBranding();
        
        $pricingMethodBranding = new tabs\apiclient\core\pricing\PricingMethodBranding();
        $pricingMethodBranding->setBranding($branding)
            ->setFromdate(new \DateTime('1914-12-10'))
            ->setTodate(new \DateTime('2007-05-28'));

        return $pricingMethodBranding;
    }

    /**
     * Return a route
     *
     * @return \tabs\apiclient\actor\Route
     */
    public static function getSourceMarketingBrand()
    {
        $route = new tabs\apiclient\actor\Route();
        $route->setId(1)->setRoute('aurlpath');

        return $route;
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

        $img = Fixtures::getPropertyImage();
        $property->addImage($img);

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
            ->setTodate(new \DateTime('2099-01-01'))
            ->setActor(Fixtures::getOwner());

        return $owner;
    }

    /**
     * Return a property cleaner
     *
     * @return \tabs\apiclient\property\propertyactor\Cleaner
     */
    public static function getCleaner()
    {
        $cleaner = new \tabs\apiclient\property\propertyactor\Cleaner();
        $cleaner->setActor('Bob Jones');

        return $cleaner;
    }

    /**
     * Return a property keyholder
     *
     * @return \tabs\apiclient\property\propertyactor\Keyholder
     */
    public static function getKeyholder()
    {
        $keyholder = new \tabs\apiclient\property\propertyactor\Keyholder();
        $keyholder->setActor('Lionel Herring');

        return $keyholder;
    }

    /**
     * Return the description type short code
     *
     * @return \tabs\apiclient\property\description\Shortcode
     */
    public static function getDescriptionTypeShortcode()
    {
        $type = new \tabs\apiclient\property\description\Shortcode();
        $type->setId(1)->setCode('long')->setDescription('Long description');

        return $type;
    }

    /**
     * Return the description type
     *
     * @return \tabs\apiclient\property\description\Type
     */
    public static function getDescriptionType()
    {
        $type = new \tabs\apiclient\property\description\Type();
        $type->setId(1)
            ->setShortcode(Fixtures::getDescriptionTypeShortcode())
            ->setEncoding('HTML')
            ->setName('Full');

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
     * Return a mock branding object
     *
     * @return \tabs\apiclient\brand\Branding
     */
    public static function getBranding()
    {
        $branding = new tabs\apiclient\brand\Branding();
        $branding->setId(1);

        $bg = Fixtures::getBrandingGroup();
        $branding->setBrandingGroup($bg);

        $mb = Fixtures::getMarketingBrand();
        $branding->setMarketingbrand($mb);

        $bb = Fixtures::getBookingBrand();
        $branding->setBookingbrand($bb);

        return $branding;
    }

    /**
     * Return a branding group object
     *
     * @return \tabs\apiclient\brand\BrandingGroup
     */
    public static function getBrandingGroup()
    {
        $bg = new \tabs\apiclient\brand\BrandingGroup();
        $bg->setCode('NOAA')
           ->setName('Norfolk')
           ->setAgency(Fixtures::getAgency());
        return $bg;
    }

    /**
     * Return return a marketing brand group
     *
     * @return \tabs\apiclient\brand\MarketingBrand
     */
    public static function getMarketingBrand()
    {
        $bg = new \tabs\apiclient\brand\MarketingBrand();
        $bg->setCode('NOMB')
           ->setName('Norfolk')
           ->setAgency(Fixtures::getAgency())
           ->setDefaultbookingbrand(Fixtures::getBookingBrand());
        return $bg;
    }

    /**
     * Return a mock booking brand object
     *
     * @return \tabs\apiclient\brand\BookingBrand
     */
    public static function getBookingBrand()
    {
        $bg = new \tabs\apiclient\brand\BookingBrand();
        $bg->setCode('NOBB')
           ->setName('Norfolk')
           ->setAgency(Fixtures::getAgency());
        return $bg;
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
        $brd = Fixtures::getBranding();
        $branding = new \tabs\apiclient\property\brand\Branding();
        $branding->setId(1)
            ->setBranding($brd)
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
     * Create and return a number attribute
     *
     * @return \tabs\apiclient\core\attribute\Attribute
     */
    public static function getNumberAttribute()
    {
        $attr = new tabs\apiclient\core\attribute\Attribute();
        $attr->setId(2)
            ->setGroup(Fixtures::getAttributeGroup())
            ->setCode('ATTR03')
            ->setName('Number of dogs')
            ->setType('Number')
            ->setDescription('Number of dogs allowed')
            ->setOperator('<=')
            ->setMinimumvalue(0)
            ->setMaximumvalue(3)
            ->setDefaultvalue(0)
            ->setUnit(Fixtures::getGenericUnit());

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
        $val = Fixtures::getHybridValue();
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
    public static function getGenericUnit()
    {
        $unit = new tabs\apiclient\core\Unit();
        $unit->setId(2)
            ->setName('n')
            ->setDescription('Number')
            ->setDecimalplaces(0);

        return $unit;
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
    
    /**
     * Create extra branding object
     * 
     * @return \tabs\apiclient\core\extra\Branding
     */
    public static function getExtraBranding()
    {
        $extraBranding = new \tabs\apiclient\core\extra\Branding();
        $extraBranding->setId(1);

        $branding = Fixtures::getBranding();
        $extraBranding->setBranding($branding);
        
        $conf = Fixtures::getExtraBrandingConfiguration();
        $extraBranding->addConfiguration($conf);
        
        $unitPrice = Fixtures::getExtraBrandingUnitPricing();
        $extraBranding->addPrice($unitPrice);
        
        $dailyPrice = Fixtures::getExtraBrandingDailyPricing();
        $extraBranding->addPrice($dailyPrice);

        return $extraBranding;
    }
    
    /**
     * Return a extra brand configuration option
     * 
     * @return \tabs\apiclient\core\extra\Configuration
     */
    public static function getExtraBrandingConfiguration()
    {
        $config = new \tabs\apiclient\core\extra\BrandExtraConfiguration();
        $config->setFromdate(new \DateTime('2014-01-01'))
            ->setId(1)
            ->setTodate(new \DateTime('2029-12-31'))
            ->setCompulsory(false)
            ->setIncluded(false)
            ->setPayagency(true);
        
        return $config;
    }
    
    /**
     * Return a extra brand unit price
     * 
     * @return \tabs\apiclient\core\extra\UnitPrice
     */
    public static function getExtraBrandingUnitPricing()
    {
        $price = new tabs\apiclient\core\extra\UnitPrice();
        $price->setFromdate(new \DateTime('2014-01-01'))
            ->setId(1)
            ->setTodate(new \DateTime('2029-12-31'))
            ->setPeradult(false)
            ->setPerchild(false)
            ->setPerinfant(false)
            ->setPropertypricing(false)
            ->setUnitprice(10.00)
            ->setCurrency(Fixtures::getCurrency());
        
        return $price;
    }
    
    /**
     * Return a extra brand unit price
     * 
     * @return \tabs\apiclient\core\extra\UnitPrice
     */
    public static function getExtraBrandingDailyPricing()
    {
        $price = new tabs\apiclient\core\extra\DailyPrice();
        $price->setFromdate(new \DateTime('2015-01-01'))
            ->setId(1)
            ->setTodate(new \DateTime('2016-12-31'))
            ->setPeradult(true)
            ->setPerchild(false)
            ->setPerinfant(false)
            ->setPropertypricing(false)
            ->setCurrency(Fixtures::getCurrency());
        
        for ($i = 1; $i <= 7; $i++) {
            $dpu = new \tabs\apiclient\core\extra\DailyPriceUnit();
            $dpu->setDays($i)
                ->setAdditional(false)
                ->setPrice(10 + $i);
            $price->addDailyprice($dpu);
        }
        
        return $price;
    }

    /**
     * Returns a mock Extra object
     *
     * @return \tabs\apiclient\core\Extra
     */
    public static function getExtra()
    {
        $extraBranding = Fixtures::getExtraBranding();

        $extra = new \tabs\apiclient\core\extra\BookingExtra();
        $extra->setId(1)
              ->setExtracode('BKFE')
              ->setDescription('Booking Fee')
              ->addBranding($extraBranding);
        return $extra;
    }

    /**
     * Return a mock image object
     *
     * @return \tabs\apiclient\core\Image
     */
    public static function getImage()
    {
        $img = new \tabs\apiclient\core\Image();
        $img->setId(1)
            ->setFilename('test.jpg')
            ->setTitle('Test')
            ->setDescription('Testing')
            ->setHeight(100)
            ->setWidth(100);

        return $img;
    }

    /**
     * Return a mock document object
     *
     * @return \tabs\apiclient\core\Document
     */
    public static function getDocument()
    {
        $doc = new \tabs\apiclient\core\Document();
        $doc->setId(1)
            ->setName('somepdf')
            ->setDescription('A pdf file')
            ->setFilename('somepdf.pdf')
            ->setWeight(0)
            ->setPrivate(true)
            ->setMimetype(Fixtures::getPdfMimetype());

        return $doc;
    }

    /**
     * Return an actor document
     *
     * @return \tabs\apiclient\actor\Document
     */
    public static function getActorDocument()
    {
        $doc = Fixtures::getDocument();
        $actorDoc = new \tabs\apiclient\actor\Document();
        $actorDoc->setId(1)
            ->setDocument($doc);

        return $actorDoc;
    }

    /**
     * Return a pdf mimetype
     *
     * @return \tabs\apiclient\core\Mimetype
     */
    public static function getPdfMimetype()
    {
        $mt = new \tabs\apiclient\core\Mimetype();
        $mt->setId(1)
            ->setName('application/pdf')
            ->setShortname('pdf');

        return $mt;
    }

    /**
     * Create a new property image
     *
     * @return \tabs\apiclient\property\Image
     */
    public static function getPropertyImage()
    {
        $propImage = new tabs\apiclient\property\Image();
        $propImage->setId(1)->setImage(Fixtures::getImage());

        return $propImage;
    }

    /**
     * Return a hybrid value object
     *
     * @return \tabs\apiclient\core\attribute\Value
     */
    public static function getHybridValue()
    {
        $value = new \tabs\apiclient\core\attribute\Value();
        $value->setBoolean(true)
            ->setNumber(2);

        return $value;
    }


    /**
     * Return a VAT rate
     *
     * @return \tabs\apiclient\core\Vatrate
     */
    public static function getVatrate()
    {
        $rate = new \tabs\apiclient\core\Vatrate();
        $rate->setPercentage(50)
            ->setFromdate('1984-02-28')
            ->setTodate('3000-04-30');

        return $rate;
    }

    /**
     * Return a VAT band
     *
     * @return \tabs\apiclient\core\Vatband
     */
    public static function getVatband()
    {
        $band = new \tabs\apiclient\core\Vatband();
        $rate = self::getVatrate();
        $band->addVatrate($rate)
            ->setVatband('Standard band');

        return $band;
    }

    /**
     * Return a Currency object
     *
     * @return \tabs\apiclient\core\Currency
     */
    public static function getCurrency()
    {
        $cur = new \tabs\apiclient\core\Currency();
        $cur->setCode('GBP')
            ->setName('Great British Pound')
            ->setDecimalplaces(2);

        return $cur;
    }

    /**
     * Return a Booking object
     *
     * @return \tabs\apiclient\booking\Booking
     */
    public static function getBooking()
    {
        $booking = new \tabs\apiclient\booking\Booking();

        $booking->setFromdate(new \DateTime('06-10-2015'))
            ->setTodate(new \DateTime('08-10-2015'));

        return $booking;
    }
    
    /**
     * Create a set discount special offer
     * 
     * @return \tabs\apiclient\core\specialoffer\SetDiscount
     */
    public static function getSpecialoffer()
    {
        $offer = new \tabs\apiclient\core\specialoffer\SetDiscount();
        $offer->setActive(true)
            ->setDescription('£10 off')
            ->setAmount(50)
            ->setId(1);
        
        $pp = Fixtures::getPricingperiod();
        $offer->setPricingperiod($pp);
        
        $cur = Fixtures::getCurrency();
        $offer->setCurrency($cur);
        
        return $offer;
    }
    
    /**
     * Create a pricing period object
     * 
     * @return \tabs\apiclient\core\PricingPeriod
     */
    public static function getPricingperiod()
    {
        $pp = new \tabs\apiclient\core\PricingPeriod();
        $pp->setPricingperiod('Week')
            ->setDays(0)
            ->setWeeks(1)
            ->setMonths(0)
            ->setSubperiod('Day')
            ->setId(1);
        
        return $pp;
    }
    
    /**
     * Create a special offer booking period object
     * 
     * @return \tabs\apiclient\core\specialoffer\BookingPeriod
     */
    public static function getBookingperiod()
    {
        $bp = new tabs\apiclient\core\specialoffer\BookingPeriod();
        $bp->setFromdate(new DateTime())
            ->setTodate(new DateTime())
            ->setId(1);
        
        return $bp;
    }
}