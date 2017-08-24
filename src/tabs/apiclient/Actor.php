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
use tabs\apiclient\ActorSecurity;

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
 * @method BankAccount getBacsbankaccount() Returns the bacs bank account
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
 * 
 * @method Collection|ActorSecurity[] getSecurity() Returns the actor security
 * 
 * @method Collection|actor\Enquiry[] getEnquiries() Returns the customer enquiries
 * 
 * @method string getAddress() Returns the address (only available when using 'fields' filter)
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
    
    /**
     * Actor Security
     * 
     * @var Collection|ActorSecurity[]
     */
    protected $security;
    
    /**
     * Customer enquiries
     * 
     * @var Collection|actor\Enquiry[]
     */
    protected $enquiries;
    
    /**
     * Address
     *
     * @var string
     */
    protected $address;    
    
    /**
     * Email address
     *
     * @var string
     */
    protected $emailaddress;     

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->setLanguage(array('code' => 'EN'));
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
        
        $this->security = Collection::factory(
            'actorsecurity',
            new actor\ActorSecurity(),
            $this
        );
        
        $this->enquiries = Collection::factory(
            'enquiry',
            new actor\Enquiry(),
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
        $this->bacsbankaccount = BankAccount::factory($account, $this);

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
     * Set an email address on an actor
     * 
     * @param string $email   Email address
     * @param string $subtype Email subtype
     * 
     * @return \tabs\apiclient\Actor
     */
    public function setEmail($email, $subtype = 'Main')
    {
        foreach ($this->getContactdetails() as $cd) {
            if ($cd instanceof ContactDetailOther 
                && $cd->getValue() == $email
                && $cd->getContactmethodsubtype() == $subtype
            ) {
                // Dont add the email if it already exists
                return $this;
            }
        }
        $contact = new \tabs\apiclient\actor\ContactDetailOther();
        $contact->setContactmethodsubtype($subtype)
            ->setContactmethodtype('Email')
            ->setValue($email)
            ->setInvalid(false);
        $this->getContactdetails()->addElement($contact);
        $contact->create();
        
        return $this;
    }
    
    /**
     * Set a phone number address on an actor
     * 
     * @param string $number  Number
     * @param string $type    Number type
     * @param string $subtype Number subtype
     * 
     * @return \tabs\apiclient\Actor
     */
    public function setPhonenumber($number, $type = 'Phone', $subtype = 'Main')
    {
        foreach ($this->getContactdetails() as $cd) {
            if ($cd instanceof PhoneNumber 
                && $cd->getSubscribernumber() == $number
            ) {
                // Dont add a number if it already exists
                return $this;
            }
        }
        
        $contact = new \tabs\apiclient\actor\PhoneNumber();
        $code = '44';
        if (substr($number, 0, 1) == '+' && strlen($number) > 3) {
            $code = substr($number, 1, 2);
            $number = substr($number, 3);
        }
        
        $number = preg_replace("/[^0-9]/", '', $number);

        // TABS2-1613
        if ((substr($number, 0, 2) == '07' 
            || substr($number, 0, 1) == '7')
            && $type != 'Mobile'
        ) {
            $type = 'Mobile';
        }
        
        $contact->setSubscribernumber($number)
            ->setContactmethodsubtype($subtype)
            ->setContactmethodtype($type)
            ->setInvalid(false)
            ->setCountrycode($code);
        
        $this->getContactdetails()->addElement($contact);
        $contact->create();
        
        return $this;
    }
    
    /**
     * Get an email address for the Actor
     * 
     * @return ContactDetailOther|null
     */
    public function getEmailaddress()
    {
        if ($this->emailaddress) {
            return $this->emailaddress;
        } else if ($this->getId()) {
            $emails = $this->getContactdetails()->findBy(function($ele) {
                return $ele instanceof ContactDetailOther 
                    && $ele->getContactmethodtype() == 'Email'
                    && $ele->getInvalid() === false;
            });
            
            if ($emails->count() > 0) {
                return $emails->first();
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        
        if (isset($arr['language'])) {
            $arr['languagecode'] = $this->getLanguage()->getCode();
        }
        
        if ($this->getBacsbankaccount()) {
            $arr['bacsbankaccountid'] = $this->getBacsbankaccount()->getId();
        }
        
        return $arr;
    }
    
    /**
     * Get the tabs2 url for this booking
     * 
     * @return string
     */
    public function getTabs2Url()
    {
        return \tabs\apiclient\client\Client::getClient()->getTabs2Uri(
            '/' . strtolower($this->getClass()) . '/' . $this->getId()
        );
    }
}