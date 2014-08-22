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
     * Return the test contact preference
     * 
     * @return \tabs\actor\ContactPreference
     */
    public static function getContactPreference()
    {
        $preference = new \tabs\actor\ContactPreference();
        $preference->setId(1)->setRole('Customer')->setReason('Booking Confirmation');
        
        return $preference;
    }
    
    /**
     * Return the test contact detail
     * 
     * @return \tabs\actor\ContactDetail
     */
    public static function getContactDetail()
    {
        $detail = new \tabs\actor\ContactDetail();
        $detail->setId(1)
            ->setType('C')
            ->setContactmethod('Phone')
            ->setSubtype('Home')
            ->setValue('0800 100 100')
            ->setComment('Home Phone Number')
            ->setInvalid(false)
            ->addContactpreference(self::getContactPreference());
        
        return $detail;
    }
    
    /**
     * Return the test contact address
     * 
     * @return \tabs\actor\ContactAddress
     */
    public static function getContactAddress()
    {
        $contactAddress = new \tabs\actor\ContactAddress();
        $contactAddress->setId(1)
            ->setAddress(self::getAddress())
            ->setType('P')
            ->setInvalid(false);
        
        return $contactAddress;
    }
    
    /**
     * Return test address object
     * 
     * @return \tabs\core\Address
     */
    public static function getAddress()
    {
        return \tabs\core\Address::factory(
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
     * @return \tabs\core\Country
     */
    public static function getCountry()
    {
        return \tabs\core\Country::factory(
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
     * @return \tabs\actor\BankAccount
     */
    public static function getBankAccount()
    {
        $bankAccount = new \tabs\actor\BankAccount();
        $bankAccount->setId(1)
            ->setAccountname('Piggy')
            ->setAccountnumber('1234')
            ->setAddress(self::getAddress())
            ->setBankname('Bank Awesome')
            ->setRollnumber('123456')
            ->setSortcode('12-34-56');
        
        return $bankAccount;
    }
}
