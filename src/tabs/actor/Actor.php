<?php

/**
 * Tabs Rest API Actor object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
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
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string  getFirstname()
 * @method string  getSurname()
 * @method string  getTitle()
 * @method string  getSalutation()
 * @method string  getTabscode()
 * @method string  getType()
 * @method string  getLanguage()
 * @method boolean getInactive()
 * @method string  getPassword()
 * @method array   getName()
 * @method string  getCompanyname()
 * @method string  getVatnumber()
 * @method string  getCompanynumber()
 * @method array   getContacts()
 * @method array   getBankaccounts()
 *
 * @method void    setFirstname(string $firstname)
 * @method void    setSurname(string $surname)
 * @method void    setTitle(string $title)
 * @method void    setSalutation(string $salutation)
 * @method void    setTabscode(string $tabscode)
 * @method void    setType(string $type)
 * @method void    setLanguage(string $language)
 * @method void    setInactive(boolean $inactive)
 * @method void    setPassword(string $password)
 * @method void    setCompanyname(string $companyname)
 * @method void    setVatnumber(string $vatnumber)
 * @method void    setCompanynumber(string $companynumber)
 *
 */

class Actor extends \tabs\core\Base
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
     * Create a new actor object
     * 
     * @param array $array Array representation of a actor object
     * 
     * @return \tabs\actor\Actor
     */
    public static function createFromArray($array)
    {
        $actor = new static();
        self::setObjectProperties($actor, $array);
        
        return $actor;
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
            $this->contacts[] = ContactEntity::createFromArray($contact);
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
            $this->bankaccounts[] = BankAccount::createFromArray($account);
        }
        
        return $this;
    }
}