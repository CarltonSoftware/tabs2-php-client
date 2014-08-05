<?php

/**
 * Tabs Rest API Person object.
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

namespace tabs\core;

/**
 * Tabs Rest API Legal Entity object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer                 getId()
 * @method boolean                 getInactive()
 * @method string                  getPassword()
 * @method string                  getType()
 * @method string                  getLanguage()
 * @method string                  getCompanyname()
 * @method string                  getFirstname()
 * @method string                  getSurname()
 * @method string                  getTitle()
 * @method string                  getSalutation()
 * @method string                  getVatnumber()
 * @method string                  getCompanynumber()
 * @method ContactEntity|Array     getContactentities()
 * @method BankAccount|Array       getBankaccounts()
 * @method Actor|Array             getActors()
 *
 * @method void                    setInactive(boolean $inactive)
 * @method void                    setPassword(string $password)
 * @method void                    setType(string $type)
 * @method void                    setLanguage(string $language)
 * @method void                    setCompanyname(string $companyname)
 * @method void                    setFirstname(string $firstname)
 * @method void                    setSurname(string $surname)
 * @method void                    setTitle(string $title)
 * @method void                    setSalutation(string $salutation)
 * @method void                    setVatnumber(string $vatnumber)
 * @method void                    setCompanynumber(string $companynumber)
 * @method void                    setContactentities(ContactEntity $contactentities)
 * @method void                    setBankaccounts(BankAccount $bankaccounts)
 * @method void                    setActors(Actor $actors)
 *
 */

class LegalEntity extends Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

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
     * Companyname
     *
     * @var string
     */
    protected $companyname;

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
     * Salutation
     *
     * @var string
     */
    protected $salutation;

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
    protected $contactentities = array();

    /**
     * BankAccount
     *
     * Array of BankAccount
     *
     * @var array()
     */
    protected $bankaccounts = array();

    /**
     * Actors
     *
     * Array of Actor
     *
     * @var array()
     */
    protected $actors = array();

    /**
     * Creates a contact object from a node and adds it to the array
     *
     * @param object $node JSON Contact object response
     *
     * @return \tabs\core\LegalEntity
     */
    public function addContactsFromNode($node)
    {
        $contact = new ContactEntity($this->id);
        self::flattenNode($contact, $node);
        array_push($this->contactentities, $contact);
        return $this;
    }

    /**
     * Creates a actor object from a node and adds it to the array
     *
     * @param object $node JSON Actor object response
     *
     * @return \tabs\core\LegalEntity
     */
    public function addActorsFromNode($node)
    {
        $actor = new Actor();
        self::flattenNode($actor, $node);
        array_push($this->actors, $actor);
        return $this;
    }

    /**
     * Creates a bankaccount object from a node and adds it to the array
     *
     * @param object $node JSON Bank account object response
     *
     * @return \tabs\core\LegalEntity
     */
    public function addBankaccountsFromNode($node)
    {
        $bankaccount = new BankAccount($this->id);
        self::flattenNode($bankaccount, $node);
        array_push($this->bankaccounts, $bankaccount);
        return $this;
    }
}