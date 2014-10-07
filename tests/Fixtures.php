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
        $owner = new \tabs\apiclient\actor\Owner();
        $owner->setId(1)
            ->setTitle('Mr')
            ->setSurname('Wyett')
            ->setPassword('abc123');
        
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
        );
        
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
}
