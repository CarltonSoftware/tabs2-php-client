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
use tabs\apiclient\collection\core\Note as NoteCollection;
use tabs\apiclient\collection\actor\Contact as ContactCollection;
use tabs\apiclient\collection\actor\ContactDetail as ContactDetailCollection;
use tabs\apiclient\collection\actor\Document as DocumentCollection;
use tabs\apiclient\collection\actor\BankAccount as BankAccountCollection;

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
 * @method integer                       getId()             Return the Id
 * @method string                        getFirstname()      Return the firstname
 * @method string                        getSurname()        Return the surname
 * @method string                        getTitle()          Return the title
 * @method string                        getSalutation()     Return the saulation
 * @method string                        getTabscode()       Return the tabs code
 * @method \tabs\apiclient\core\Language getLanguage()       Return the language
 * @method boolean                       getInactive()       Return the inactive state
 * @method string                        getPassword()       Return the password
 * @method string                        getCompanyname()    Return the company name
 * @method string                        getVatnumber()      Return the vat number
 * @method string                        getCompanynumber()  Return the company number
 * @method ContactDetailCollection       getContacts()       Return contact entity collection
 * @method BankAccountCollection         getBankaccounts()   Return a collection of bank accounts
 * @method NoteCollection                getNotes()          Return a note collection
 * @method DocumentCollection            getDocuments()      Return a document collection
 * @method ContactCollection             getContactHistory() Return a contact collection
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
     * Contact Entity collection
     *
     * @var ContactEntityCollection
     */
    protected $contacts;

    /**
     * Bank account collection
     *
     * @var BankAccountCollection
     */
    protected $bankaccounts;

    /**
     * Note collection
     *
     * @var NoteCollection
     */
    protected $notes;

    /**
     * Document collection
     *
     * @var DocumentCollection
     */
    protected $documents;

    /**
     * Contact history collection
     *
     * @var ContactCollection
     */
    protected $contactHistory;

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
        $className = self::getClass();
        $routeName = strtolower($className);

        return parent::_get(sprintf('/%s/%s', $routeName, $reference));
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

        $this->notes = new NoteCollection();
        $this->notes->setElementParent($this);

        $this->bankaccounts = new BankAccountCollection();
        $this->bankaccounts->setElementParent($this);

        $this->contacts = new ContactDetailCollection();
        $this->contacts->setElementParent($this);

        $this->documents = new DocumentCollection();
        $this->documents->setElementParent($this);

        //$this->contactHistory = new ContactCollection();
        //$this->contactHistory->setElementParent($this);
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
        $this->contacts->addElement($contact);

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
                $detail = \tabs\apiclient\actor\ContactDetailPostal::factory($contact);
            } else {
                $detail = \tabs\apiclient\actor\ContactDetailOther::factory($contact);
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
            $this->contacts->getElements(),
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
        foreach ($this->getContacts()->getElements() as $contact) {
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
        $this->bankaccounts->addElement($bankAccount);

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
     * Add a note
     *
     * @param Note $note Note object
     *
     * @return Actor
     */
    public function addNote(&$note)
    {
        $note->setParent($this);
        $this->notes->addElement($note);

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
     * Add a document
     *
     * @param Document $document Document object
     *
     * @return Actor
     */
    public function addDocument(&$document)
    {
        $document->setParent($this);
        $this->documents->addElement($document);

        return $this;
    }

    /**
     * Set the documents array
     *
     * @param Document[] $documents Documents array
     *
     * @return Actor
     */
    public function setDocuments($documents)
    {
        foreach ($documents as $doc) {
            $_document = Document::factory($doc);
            $this->addDocument($_document);
        }

        return $this;
    }


    /**
     * Add a Contact
     *
     * @param Contact $contact Contact object
     *
     * @return Actor
     */
    public function addContactHistory(&$contact)
    {
        $contact->setParent($this);
        $this->contactHistory->addElement($contact);

        return $this;
    }


    /**
     * Sets the contactHistory array
     *
     * @param Contact[] $contactHistory Contact array
     *
     * @return Actor
     */
    public function setContactHistory($contactHistory)
    {
        foreach ($contactHistory as $contact) {
            $_contact = Contact::factory($contact);
            $this->addContactHistory($_contact);
        }

        return $this;
    }


    public function getContactHistory()
    {
        $contactHistory = new ContactCollection();
        $contactHistory->setElementParent($this);

        return $contactHistory;
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
            'password' => $this->getPassword(),
            'tabscode' => $this->getTabscode(),
            'languagecode' => $this->getLanguage()->getCode(),
            'companyname' => $this->getCompanyname(),
            'vatnumber' => $this->getVatnumber(),
            'companynumber' => $this->getCompanynumber(),
            'inactive' => $this->getInactive()
        );
    }
}