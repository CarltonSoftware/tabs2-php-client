<?php

/**
 * Tabs Rest API Actor object.
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

namespace tabs\actor;

/**
 * Tabs Rest API Actor object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string                      getFirstname()     Return the firstname
 * @method string                      getSurname()       Return the surname
 * @method string                      getTitle()         Return the title
 * @method string                      getSalutation()    Return the saulation
 * @method string                      getTabscode()      Return the tabs code
 * @method string                      getType()          Return the type
 * @method string                      getLanguage()      Return the language
 * @method boolean                     getInactive()      Return the inactive state
 * @method string                      getPassword()      Return the password
 * @method string                      getCompanyname()   Return the company name
 * @method string                      getVatnumber()     Return the vat number
 * @method string                      getCompanynumber() Return the company number
 * @method \tabs\actor\ContactEntity[] getContacts()      Return the array of contacts
 * @method \tabs\actor\BankAccount[]   getBankaccounts()  Return the array of bank account objects
 *
 * @method \tabs\actor\Actor setFirstname(string $firstname Firstname) Set the firstname
 * @method \tabs\actor\Actor setSurname(string $surname Surname) Set the surname
 * @method \tabs\actor\Actor setTitle(string $title Title) Set the title
 * @method \tabs\actor\Actor setSalutation(string $salutation Salutation) Set the salutation
 * @method \tabs\actor\Actor setTabscode(string $tabscode Tabscode) Set the tabscode
 * @method \tabs\actor\Actor setType(string $type Type) Set the type
 * @method \tabs\actor\Actor setLanguage(string $language Language) Set the language
 * @method \tabs\actor\Actor setInactive(boolean $inactive Inactive) Set the inactive state
 * @method \tabs\actor\Actor setPassword(string $password Password) Set the password
 * @method \tabs\actor\Actor setCompanyname(string $companyname Name) Set the company name
 * @method \tabs\actor\Actor setVatnumber(string $vatnumber VAT Number) Set the vat number
 * @method \tabs\actor\Actor setCompanynumber(string $companynumber Company Number) Set the company number
 */
abstract class Actor extends \tabs\core\Base
{
    /**
     * Firstname
     *
     * @var string
     */
    protected $firstname;
    
    /**
     * Surname
     *
     * @var string
     */
    protected $surname;
    
    /**
     * Title
     *
     * @var string
     */
    protected $title;
    
    /**
     * Salutatino
     *
     * @var string
     */
    protected $salutation;
    
    /**
     * Tabscode
     *
     * @var string
     */
    protected $tabscode;
    
    /**
     * Type
     *
     * @var string
     */
    protected $type;
    
    /**
     * Language
     *
     * @var string
     */
    protected $language;
    
    /**
     * Inactive
     *
     * @var boolean
     */
    protected $inactive;
    
    /**
     * Password
     *
     * @var string
     */
    protected $password;
    
    /**
     * Companyname
     *
     * @var string
     */
    protected $companyname;
    
    /**
     * VatNumber
     *
     * @var string
     */
    protected $vatnumber;

    /**
     * CompanyNumber
     *
     * @var string
     */
    protected $companynumber;
    
    /**
     * ContactEntities
     *
     * Array of ContactEntity
     *
     * @var array()
     */
    protected $contacts = array();

    /**
     * BankAccount
     *
     * Array of BankAccount
     *
     * @var array()
     */
    protected $bankaccounts = array();

    // ------------------ Static Functions --------------------- //

    /**
     * Create a Actor object from a given customer reference
     *
     * @param string $reference Actor reference
     *
     * @return \tabs\actor\Actor
     */
    public static function get($reference)
    {
        // Get the actor object
        $request = \tabs\client\Client::getClient()->get(
            strtolower(self::getClass()) . "/{$reference}"
        );

        if ($request
            && $request->getStatusCode() == 200
            && $request->getBody() != ''
        ) {
            return self::factory(
                $request->json(
                    array(
                        'object' => true
                    )
                )
            );
        }
        throw new \tabs\client\Exception(
            $request,
            'Unable to create ' . strtolower(self::getClass())
        );
    }

    // ------------------ Public Functions --------------------- //
    
    /**
     * Set the contacts for the Actor
     * 
     * @param array $contacts Array of contact objects
     * 
     * @return \tabs\actor\Actor
     */
    public function setContacts($contacts)
    {
        foreach ($contacts as $contact) {
            $this->contacts[] = ContactEntity::factory($contact);
        }
        
        return $this;
    }

    /**
     * Set the bank account objects
     * 
     * @param account $bankAccounts Bank accounts array
     * 
     * @return \tabs\actor\Actor
     */
    public function setBankaccounts($bankAccounts)
    {
        foreach ($bankAccounts as $account) {
            $this->bankaccounts[] = BankAccount::factory($account);
        }
        
        return $this;
    }
    
    /**
     * Return if a customer is active or not
     * 
     * @return boolean
     */
    public function isActive()
    {
        return !$this->inactive;
    }
    
    /**
     * Perform a post request to the api
     * 
     * @return \tabs\actor\Customer
     */
    public function create()
    {
        // Perform post request
        $req = \tabs\client\Client::getClient()->post(
            strtolower(get_called_class()),
            array(
                'title' => $this->getTitle(),
                'firstname' => $this->getFirstname(),
                'surname' => $this->getSurname(),
                'salutation' => $this->getSalutation(),
                'tabscode' => $this->getTabscode(),
                'language' => $this->getLanguage(),
                'companyname' => $this->getCompanyname(),
                'vatnumber' => $this->getVatnumber(),
                'companynumber' => $this->getCompanynumber()
            )
        );

        if (!$req
            || $req->getStatusCode() !== 201
        ) {
            throw new \tabs\client\Exception(
                $req,
                'Unable to create ' . get_called_class()
            );
        }
        
        return $this;
    }
}