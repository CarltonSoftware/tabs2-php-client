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

namespace tabs\apiclient\actor;
use tabs\apiclient\core\Note;

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
 * @method integer                       getId()            Return the Id
 * @method string                        getFirstname()     Return the firstname
 * @method string                        getSurname()       Return the surname
 * @method string                        getTitle()         Return the title
 * @method string                        getSalutation()    Return the saulation
 * @method string                        getTabscode()      Return the tabs code
 * @method \tabs\apiclient\core\Language getLanguage()      Return the language
 * @method boolean                       getInactive()      Return the inactive state
 * @method string                        getPassword()      Return the password
 * @method string                        getCompanyname()   Return the company name
 * @method string                        getVatnumber()     Return the vat number
 * @method string                        getCompanynumber() Return the company number
 * @method ContactEntity[]               getContacts()      Return the array of contacts
 * @method BankAccount[]                 getBankaccounts()  Return the array of bank account objects
 * @method Note[]                        getNotes           Return the notes for this actor
 *
 * @method Actor setId(string $id) Set the Id
 * @method Actor setFirstname(string $firstname) Set the firstname
 * @method Actor setSurname(string $surname) Set the surname
 * @method Actor setTitle(string $title) Set the title
 * @method Actor setSalutation(string $salutation) Set the salutation
 * @method Actor setTabscode(string $tabscode) Set the tabscode
 * @method Actor setInactive(boolean $inactive) Set the inactive state
 * @method Actor setPassword(string $password) Set the password
 * @method Actor setCompanyname(string $companyname) Set the company name
 * @method Actor setVatnumber(string $vatnumber) Set the vat number
 * @method Actor setCompanynumber(string $companynumber) Set the company number
 */
abstract class Actor extends \tabs\apiclient\core\Builder
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

    /**
     * Firstname
     *
     * @var string
     */
    protected $firstname = '';

    /**
     * Surname
     *
     * @var string
     */
    protected $surname = '';

    /**
     * Title
     *
     * @var string
     */
    protected $title = '';

    /**
     * Salutatino
     *
     * @var string
     */
    protected $salutation = '';

    /**
     * Tabscode
     *
     * @var string
     */
    protected $tabscode = '';

    /**
     * Language
     *
     * @var \tabs\apiclient\core\Language
     */
    protected $language;

    /**
     * Inactive
     *
     * @var boolean
     */
    protected $inactive = false;

    /**
     * Password
     *
     * @var string
     */
    protected $password = '';

    /**
     * Companyname
     *
     * @var string
     */
    protected $companyname = '';

    /**
     * VatNumber
     *
     * @var string
     */
    protected $vatnumber = '';

    /**
     * CompanyNumber
     *
     * @var string
     */
    protected $companynumber = '';

    /**
     * ContactEntities
     *
     * Array of ContactEntity
     *
     * @var ContactEntity[]
     */
    protected $contacts = array();

    /**
     * BankAccount
     *
     * Array of BankAccount
     *
     * @var BankAccount[]
     */
    protected $bankaccounts = array();

    /**
     * Array of notes
     *
     * Array of BankAccount
     *
     * @var Note[]
     */
    protected $notes = array();

    // -------------------------- Static Functions -------------------------- //

    /**
     * Create a Actor object from a given customer reference
     *
     * @param string $reference Actor reference
     *
     * @return \tabs\apiclient\actor\Actor
     */
    public static function get($reference)
    {
        $className = get_called_class();

        switch($className) {
            case 'tabs\apiclient\actor\Customer':
                $routeName = 'customer';
                break;
            case 'tabs\apiclient\actor\Tabsuser':
                $routeName = 'tabsuser';
                break;
            default:
                $routeName = 'customer';
        }

        return parent::get(sprintf('/%s/%s', $routeName, $reference));
    }

    // -------------------------- Public Functions -------------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->setLanguage(array('name' => 'English'));
    }

    /**
     * Add a contact detail
     *
     * @param ContactAddress|ContactDetail $contact Contact detail object
     *
     * @return Actor
     */
    public function addContact(&$contact)
    {
        $contact->setParent($this);
        $this->contacts[] = $contact;

        return $this;
    }

    /**
     * Set the contacts for the Actor
     *
     * @param array $contacts Array of contact objects
     *
     * @return Actor
     */
    public function setContacts($contacts)
    {
        foreach ($contacts as $contact) {
            if ($contact->type == 'P') {
                $detail = \tabs\apiclient\actor\ContactAddress::factory($contact);
            } else {
                $detail = \tabs\apiclient\actor\ContactDetail::factory($contact);
            }

            $this->addContact($detail);
        }

        return $this;
    }

    /**
     * Return all of the Contact addresses object
     *
     * @return ContactAddress[]
     */
    public function getContactAddresses()
    {
        return $this->getContactFilter('ContactAddress');
    }

    /**
     * Return all of the Contact Detail objects that are email addresses
     *
     * @return array
     */
    public function getEmailAddresses()
    {
        return array_filter(
            $this->getContactFilter(),
            function ($ele) {
                return (strtolower($ele->getContactmethod()) == 'email');
            }
        );
    }

    /**
     * Return all of the Contact Detail objects that are phone numbers
     *
     * @return array
     */
    public function getPhoneNumbers()
    {
        return array_filter(
            $this->getContactFilter(),
            function ($ele) {
                return (strtolower($ele->getContactmethod()) == 'phone');
            }
        );
    }

    /**
     * Return a filtered contacts array
     *
     * @param string $type Contact entity type
     *
     * @return array
     */
    public function getContactFilter($type = 'ContactDetail')
    {
        return array_filter(
            $this->contacts,
            function ($ele) use ($type) {
                return ($ele->getClass() == $type);
            }
        );
    }

    /**
     * Return the contact preferences for this customer
     *
     * @return ContactPreference[]
     */
    public function getContactPreferences()
    {
        $preferences = array();
        foreach ($this->getContacts() as $contact) {
            foreach ($contact->getContactpreferences() as $preference) {
                array_push($preferences, $preference);
            }
        }

        return $preferences;
    }

    /**
     * Add a bank account
     *
     * @param BankAccount $bankAccount Bank account object
     *
     * @return Actor
     */
    public function addBankAccount(&$bankAccount)
    {
        $bankAccount->setParent($this);
        $this->bankaccounts[] = $bankAccount;

        return $this;
    }

    /**
     * Set the bank account objects
     *
     * @param BankAccount $bankAccounts Bank accounts array
     *
     * @return Actor
     */
    public function setBankaccounts($bankAccounts)
    {
        foreach ($bankAccounts as $account) {
            $bankAccount = BankAccount::factory($account);
            $this->addBankAccount($bankAccount);
        }

        return $this;
    }

    /**
     * Add a bank account
     *
     * @param Note $bankAccount Note object
     *
     * @return Actor
     */
    public function addNote(&$note)
    {
        $note->setParent($this);
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Set the notes array
     *
     * @param Note[] $notes Notes array
     *
     * @return Actor
     */
    public function setNotes($notes)
    {
        foreach ($notes as $note) {
            $_note = Note::factory($note);
            $this->addNote($_note);
        }

        return $this;
    }

    /**
     * Set the language object
     *
     * @param array $array Language array
     *
     * @return Actor
     */
    public function setLanguage($array)
    {
        if (is_string($array)) {
            $array = array('name' => $array);
        }

        $language = \tabs\apiclient\core\Language::factory($array);
        $language->setParent($this);

        $this->language = $language;

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
     * Delete function.  Not allowed!
     *
     * @throws \tabs\apiclient\client\Exception
     *
     * @return void
     */
    public function delete()
    {
        throw new \tabs\apiclient\client\Exception(
            null,
            sprintf(
                'Deleting a %s is not permitted',
                $this->getClass()
            )
        );
    }

    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {
        return implode(
            ' ',
            array_filter(
                array(
                    $this->getTitle(),
                    $this->getFirstname(),
                    $this->getSurname()
                )
            )
        );
    }

    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'title' => $this->getTitle(),
            'firstname' => $this->getFirstname(),
            'surname' => $this->getSurname(),
            'salutation' => $this->getSalutation(),
            'tabscode' => $this->getTabscode(),
            'languagecode' => $this->getLanguage()->getCode(),
            'companyname' => $this->getCompanyname(),
            'vatnumber' => $this->getVatnumber(),
            'companynumber' => $this->getCompanynumber(),
            'inactive' => $this->getInactive()
        );
    }
}