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
 * @method Actor setFirstname(string $var) Sets the firstname
 * 
 * @method Actor setSurname(string $var) Sets the surname
 * 
 * @method Actor setTitle(string $var) Sets the title
 * 
 * @method Actor setSalutation(string $var) Sets the salutation
 * 
 * @method Actor setTabscode(string $var) Sets the tabscode
 * 
 * @method Actor setInactive(boolean $var) Sets the inactive
 * 
 * @method Actor setCompanyname(string $var) Sets the companyname
 * 
 * @method Actor setVatnumber(string $var) Sets the vatnumber
 * 
 * @method Actor setCompanynumber(string $var) Sets the companynumber
 * 
 * @method Actor  setAccountingreference(string $var) Sets the accountingreference
 * 
 * @method Actor setBankaccounts(Collection $col) Set the bank accounts
 * 
 * @method Actor setDocuments(Collection $col) Set the documents
 * 
 * @method Actor setNotes(Collection $col) Set the notes
 * 
 * @method Actor setContactdetails(StaticCollection $col) Set the contact details
 * 
 * @method Actor setManagedactivities(StaticCollection $col) Set the managed activities
 * 
 * @method Actor setBankaccounts(Collection $col) Set the bank accounts
 * 
 * @method Collection|actor\Document[] getDocuments() Returns the actor documents
 * 
 * @method Collection|ActorNote[] getNotes() Returns the actor notes
 * 
 * @method Collection|ActorSecurity[] getSecurity() Returns the actor security
 * 
 * @method Collection|actor\Enquiry[] getEnquiries() Returns the customer enquiries
 * 
 * @method Collection|actor\Setting[] getSettings() Returns the actor settings
 */
abstract class Actor extends Builder
{
    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $salutation;

    /**
     * @var string
     */
    protected $tabscode;

    /**
     * @var string
     */
    protected $actorcode;

    /**
     * @var Language
     */
    protected $language;

    /**
     * @var boolean
     */
    protected $inactive;

    /**
     * @var string
     */
    protected $companyname;

    /**
     * @var string
     */
    protected $vatnumber;

    /**
     * @var string
     */
    protected $companynumber;

    /**
     * @var string
     */
    protected $accountingreference;

    /**
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
     * Actor settings
     * 
     * @var Collection|actor\Setting[]
     */
    protected $settings;
    
    /**
     * Address (from fields request)
     *
     * @var string
     */
    protected $address;    
    
    /**
     * Email address (from fields request)
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
        
        $this->settings = Collection::factory(
            'setting',
            new actor\Setting(),
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
     * Send a reset password email to an actor
     * 
     * @return boolean
     */
    public function resetPassword()
    {
        $req = client\Client::getClient()->put(
            $this->getUpdateUrl() . '/resetpassword'
        );
        
        return $req->getStatusCode() === 204;
    }
    
    /**
     * Request an actor token email
     * 
     * @param Branding $branding Optional branding which determines the branding
     *                           context for the api email
     * @param string   $email    Optional email address (otherwise all emails will be sent).
     * @param string   $body     Optional email body. You can use the {{token}} 
     *                           variable in the body string to customise the email sent to actors.
     * @param string   $subject  Optional email subject.
     * 
     * @return boolean
     */
    public function requestToken(
        Branding $branding = null,
        $email = null,
        $body = null,
        $subject = null
    ) {
        $params = [];
        if ($branding) {
            $params['brandingid'] = $branding->getId();
        }
        
        if ($email) {
            $params['email'] = $email;
        }
        
        if ($body) {
            $params['body'] = $body;
        }
        
        if ($subject) {
            $params['subject'] = $subject;
        }
        
        $req = client\Client::getClient()->put(
            $this->getUpdateUrl() . '/token',
            $params
        );
        
        return $req->getStatusCode() === 204;
    }
    
    /**
     * Manual reset an actor token
     * 
     * @return boolean
     */
    public function resetToken()
    {
        $req = client\Client::getClient()->put(
            $this->getUpdateUrl() . '/resettoken'
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
            ) {
                if ($cd->getContactmethodsubtype() != $subtype) {
                    $cd->setContactmethodsubtype($subtype);
                    $cd->update();
                }
                
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
        $contact = new \tabs\apiclient\actor\PhoneNumber();
        $code = '44';
        if (substr($number, 0, 1) == '+' && strlen($number) > 3) {
            $code = substr($number, 1, 2);
            $number = substr($number, 3);
        }
        
        $number = preg_replace("/[^0-9]/", '', $number);
        
        foreach ($this->getContactdetails() as $cd) {
            if ($cd instanceof PhoneNumber 
                && $cd->getSubscribernumber() == $number
            ) {
                // Dont add a number if it already exists
                return $this;
            }
        }

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
            return $this->getContactDetail(new ContactDetailOther, 'Email')->first();
        }
    }
    
    /**
     * Get an phone for the Actor
     * 
     * @return PhoneNumber|string|null
     */
    public function getPhonenumber()
    {
        if ($this->phone) {
            return $this->phone;
        } else if ($this->getId()) {
            return $this->getContactDetail(new PhoneNumber, 'Phone')->first();
        }
    }
    
    /**
     * Get a mobile phone for the Actor
     * 
     * @return PhoneNumber|string|null
     */
    public function getMobilenumber()
    {
        if ($this->mobilephone) {
            return $this->mobilephone;
        } else if ($this->getId()) {
            return $this->getContactDetail(new PhoneNumber, 'Mobile')->first();
        }
    }
    
    /**
     * Get a address for the Actor
     * 
     * @return actor\Address|string|null
     */
    public function getAddress()
    {
        if ($this->address) {
            return $this->address;
        } else if ($this->getId()) {
            return $this->getContactDetail(new actor\Address)->first();
        }
    }
    
    /**
     * Get a collection of contact details an phone for the Actor
     *
     * @param ContactDetail $instance Instance to filter by
     * @param string        $type     Contact method type
     * @param string        $subtype  Contact method subtype
     *  
     * @return ContactDetail[]
     */
    public function getContactDetail(
        ContactDetail $instance,
        $type = null,
        $subtype = null
    ) {
        return $this->getContactdetails()->filter(
            function($ele) use ($instance, $type, $subtype) {
                return $ele instanceof $instance 
                    && ($ele instanceof actor\Address || !$type || $ele->getContactmethodtype() == $type)
                    && (!$subtype || $ele->getContactmethodsubtype() == $subtype)
                    && $ele->getInvalid() === false;
            }
        );
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

    /**
     * Returns the firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Returns the surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the salutation
     *
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Returns the tabscode
     *
     * @return string
     */
    public function getTabscode()
    {
        return $this->tabscode;
    }

    /**
     * Returns the language
     *
     * @return Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Returns the inactive
     *
     * @return boolean
     */
    public function getInactive()
    {
        return $this->inactive;
    }

    /**
     * Returns the companyname
     *
     * @return string
     */
    public function getCompanyname()
    {
        return $this->companyname;
    }

    /**
     * Returns the vatnumber
     *
     * @return string
     */
    public function getVatnumber()
    {
        return $this->vatnumber;
    }

    /**
     * Returns the companynumber
     *
     * @return string
     */
    public function getCompanynumber()
    {
        return $this->companynumber;
    }

    /**
     * Returns the accountingreference
     *
     * @return string
     */
    public function getAccountingreference()
    {
        return $this->accountingreference;
    }

    /**
     * Returns the bacs bank account
     *
     * @return BankAccount
     */
    public function getBacsbankaccount()
    {
        return $this->bacsbankaccount;
    }

    /**
     * Returns the actor contact details
     *
     * @return StaticCollection|ContactDetail[]
     */
    public function getContactdetails()
    {
        return $this->contactdetails;
    }
    
    /**
     * Returns the actor managed activities
     *
     * @return StaticCollection|ManagedActivity[]
     */
    public function getManagedactivities()
    {
        return $this->managedactivities;
    }
}