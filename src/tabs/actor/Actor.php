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
 * @method string                  getTabscode()
 * @method string                  getType()
 * @method string                  getLanguage()
 * @method boolean                 getInactive()
 * @method string                  getPassword()
 * @method Name                    getName()
 * @method string                  getCompanyname()
 * @method string                  getVatnumber()
 * @method string                  getCompanynumber()
 * @method ContactEntity|Array     getContacts()
 * @method BankAccount|Array       getBankaccounts()
 *
 * @method void                    setTabscode(string $tabscode)
 * @method void                    setType(string $type)
 * @method void                    setLanguage(string $language)
 * @method void                    setInactive(boolean $inactive)
 * @method void                    setPassword(string $password)
 * @method void                    setName(Name $name)
 * @method void                    setCompanyname(string $companyname)
 * @method void                    setVatnumber(string $vatnumber)
 * @method void                    setCompanynumber(string $companynumber)
 * @method void                    setContacts(ContactEntity $contacts)
 * @method void                    setBankaccounts(BankAccount $bankaccounts)
 *
 */

class Actor extends \tabs\core\Base
{
    
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
     * Actor name
     *
     * @var array()
     */
    protected $name = array();
    
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

    public function addContactsFromNode($node) {
        $contact = new ContactEntity();
        self::flattenNode($contact, $node);
        $this->contacts[] = $contact;
    }
    
    public function addBankaccountsFromNode($node) {
        $bankAccount = new BankAccount();
        self::flattenNode($bankAccount, $node);
        $this->bankaccounts[] = $bankAccount;
    }
    
    public function addNameFromNode($node) {
        $name = new Name();
        self::flattenNode($name, $node);
        $this->name = $name;
    }
    
}