<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\actor\BankAccount;
use tabs\apiclient\Collection;
use tabs\apiclient\note\ActorNote;
use tabs\apiclient\StaticCollection;
use tabs\apiclient\actor\ContactDetail;
use tabs\apiclient\actor\ContactDetailOther;
use tabs\apiclient\actor\PhoneNumber;
use tabs\apiclient\actor\ManagedActivity;

/**
 * Tabs Rest API object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getFirstname() Returns the firstname
 * @method Actor setFirstname(string $var) Sets the firstname
 * 
 * @method string getSurname() Returns the surname
 * @method Actor setSurname(string $var) Sets the surname
 * 
 * @method string getTitle() Returns the title
 * @method Actor setTitle(string $var) Sets the title
 * 
 * @method string getSalutation() Returns the salutation
 * @method Actor setSalutation(string $var) Sets the salutation
 * 
 * @method string getTabscode() Returns the tabscode
 * @method Actor setTabscode(string $var) Sets the tabscode
 * 
 * @method Language getLanguage() Returns the language
 * 
 * @method boolean getInactive() Returns the inactive
 * @method Actor setInactive(boolean $var) Sets the inactive
 * 
 * @method string getPassword() Returns the password
 * @method Actor setPassword(string $var) Sets the password
 * 
 * @method string getCompanyname() Returns the companyname
 * @method Actor setCompanyname(string $var) Sets the companyname
 * 
 * @method string getVatnumber() Returns the vatnumber
 * @method Actor setVatnumber(string $var) Sets the vatnumber
 * 
 * @method string getCompanynumber() Returns the companynumber
 * @method Actor setCompanynumber(string $var) Sets the companynumber
 * 
 * @method string getAccountingreference() Returns the accountingreference
 * @method Actor  setAccountingreference(string $var) Sets the accountingreference
 * 
 * @method Collection|BankAccount getBankaccounts() Returns the bank account collection
 * @method Actor setBankaccounts(Collection $col) Set the bank accounts
 * 
 * @method Collection|actor\Document[] getDocuments() Returns the actor documents
 * @method Actor setDocuments(Collection $col) Set the documents
 * 
 * @method Collection|ActorNote[] getNotes() Returns the actor notes
 * @method Actor setNotes(Collection $col) Set the notes
 * 
 * @method StaticCollection|ContactDetail[] getContactdetails() Returns the actor contact details
 * @method Actor setContactdetails(StaticCollection $col) Set the contact details
 * 
 * @method StaticCollection|ManagedActivity[] getManagedactivities() Returns the actor managed activities
 * @method Actor setManagedactivities(StaticCollection $col) Set the managed activities
 */
abstract class Actor extends Builder
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
     * Salutation
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
     * Language
     *
     * @var Language
     */
    protected $language;

    /**
     * Inactive
     *
     * @var boolean
     */
    protected $inactive;

    /**
     * Companyname
     *
     * @var string
     */
    protected $companyname;

    /**
     * Vatnumber
     *
     * @var string
     */
    protected $vatnumber;

    /**
     * Companynumber
     *
     * @var string
     */
    protected $companynumber;

    /**
     * Accounting reference
     *
     * @var string
     */
    protected $accountingreference;

    /**
     * Bacs bank account
     *
     * @var BankAccount
     */
    protected $bacsbankaccount;
    
    /**
     * Bank accounts collection
     * 
     * @var Collection|BankAccount[]
     */
    protected $bankaccounts;
    
    /**
     * Actor Documents
     * 
     * @var Collection|Document[]
     */
    protected $documents;
    
    /**
     * Actor Notes
     * 
     * @var Collection|ActorNote[]
     */
    protected $notes;
    
    /**
     * Actor Contact Details
     * 
     * @var StaticCollection|ContactDetail[]
     */
    protected $contactdetails;
    
    /**
     * Actor Managed Activities
     * 
     * @var StaticCollection|ManagedActivity[]
     */
    protected $managedactivities;

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->language = new Language();
        $this->bacsbankaccount = new BankAccount();
        $this->bankaccounts = Collection::factory(
            'bankaccount',
            new BankAccount,
            $this
        );
        $this->documents = Collection::factory(
            'document',
            new actor\Document,
            $this
        );
        $this->notes = Collection::factory(
            'note',
            new ActorNote,
            $this
        );
        $this->contactdetails = StaticCollection::factory(
            'contactdetail',
            new ContactDetail(),
            $this
        );
        
        $this->contactdetails->setDiscriminator('type')
            ->setDiscriminatorMap(array(
                'P' => new actor\Address(),
                'C' => new ContactDetailOther(),
                'F' => new PhoneNumber()
            ));
        
        $this->managedactivities = Collection::factory(
            'managedactivity',
            new ManagedActivity(),
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the language
     *
     * @param array|stdClass|Language $language The Language
     *
     * @return Actor
     */
    public function setLanguage($language)
    {
        $this->language = Language::factory($language);

        return $this;
    }

    /**
     * Set the bacs bank account
     *
     * @param array|stdClass|BankAccount $account Bank Account
     *
     * @return Actor
     */
    public function setBacsbankaccount($account)
    {
        $this->bacsbankaccount = BankAccount::factory($account);
        $this->bacsbankaccount->setParent($this);

        return $this;
    }
    
    /**
     * Get the fullname of the actor
     * 
     * @return string
     */
    public function getFullname()
    {
        return implode(
            ' ',
            array(
                $this->getTitle(),
                $this->getFirstname(),
                $this->getSurname()
            )
        );
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getFullname();
    }
    
    /**
     * Authenticate the actor
     * 
     * @param string $password Password
     * 
     * @return boolean
     */
    public function authenticate($password)
    {
        $req = client\Client::getClient()->post(
            $this->getUpdateUrl() . '/authenticate',
            array(
                'password' => $password
            )
        );
        
        return $req->getStatusCode() === 204;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'firstname' => $this->getFirstname(),
            'surname' => $this->getSurname(),
            'title' => $this->getTitle(),
            'salutation' => $this->getSalutation(),
            'tabscode' => $this->getTabscode(),
            'language' => $this->getLanguage(),
            'inactive' => $this->getInactive(),
            'password' => $this->getPassword(),
            'companyname' => $this->getCompanyname(),
            'vatnumber' => $this->getVatnumber(),
            'companynumber' => $this->getCompanynumber(),
            'languagecode' => $this->getLanguage()->getCode(),
            'accountingreference' => $this->getAccountingreference()
        );
    }
}