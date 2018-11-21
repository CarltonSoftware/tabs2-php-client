<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Template object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Template setType(string $var) Sets the type
 * 
 * @method Template setTemplatename(string $var) Sets the templatename
 * 
 * @method Template setSubject(string $var) Sets the subject
 * 
 * @method Template setTemplatedescription(string $var) Sets the templatedescription
 * 
 * @method Template setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method Template setTodate(\DateTime $var) Sets the todate
 * 
 * @method TriggerEvent setMandatory(boolean $var) Sets the mandatory
 * 
 * @method TriggerEvent setSendonce(boolean $var) Sets the sendonce
 * 
 * @method TriggerEvent setSendonceper(string $var) Sets the sendonceper
 * 
 * @method TriggerEvent setDaysbeforetrigger(integer $var) Sets the daysbeforetrigger
 * 
 * @method TriggerEvent setShowprovisional(boolean $var) Sets the showprovisional
 * 
 * @method TriggerEvent setShowdepositpaid(boolean $var) Sets the showdepositpaid
 * 
 * @method TriggerEvent setShowbalancepaid(boolean $var) Sets the showbalancepaid
 * 
 * @method TriggerEvent setShowcancelledprovisional(boolean $var) Sets the showcancelledprovisional
 * 
 * @method TriggerEvent setShowcancelledconfirmed(boolean $var) Sets the showcancelledconfirmed
 * 
 * @method TriggerEvent setShowtransferred(boolean $var) Sets the showtransferred
 * 
 * @method TriggerEvent setShowowner(boolean $var) Sets the showowner
 * 
 * @method TriggerEvent setShowflexilet(boolean $var) Sets the showflexilet
 * 
 * @method TriggerEvent setShowcancelledflexilet(boolean $var) Sets the showcancelledflexilet
 * 
 * 
 */
class Template extends Builder
{
    /**
     * Type
     *
     * @var string
     */
    protected $type;

    /**
     * Templatename
     *
     * @var string
     */
    protected $templatename;

    /**
     * Subject
     *
     * @var string
     */
    protected $subject;

    /**
     * Templatedescription
     *
     * @var string
     */
    protected $templatedescription;

    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;

    /**
     * Templatetargetsource
     *
     * @var \tabs\apiclient\TemplateTargetSource
     */
    protected $templatetargetsource;

    /**
     * Branding
     *
     * @var \tabs\apiclient\Branding
     */
    protected $branding;

    /**
     * Bookingbrand
     *
     * @var \tabs\apiclient\BookingBrand
     */
    protected $bookingbrand;

    /**
     * Marketingbrand
     *
     * @var \tabs\apiclient\MarketingBrand
     */
    protected $marketingbrand;

    /**
     * Contactmethods
     *
     * @var Collection|\tabs\apiclient\template\ContactMethod[]
     */
    protected $contactmethods;

    /**
     * Role reasons
     *
     * @var Collection|\tabs\apiclient\template\RoleReason[]
     */
    protected $rolereasons;
    
    /**
     * Trigger event
     * 
     * @var \tabs\apiclient\TriggerEvent
     */
    protected $triggerevent;
    
    /**
     * Mandatory boolean (NYI)
     * 
     * @var boolean
     */
    protected $mandatory = false;
    
    /**
     * Sendonce boolean (NYI)
     * 
     * @var boolean
     */
    protected $sendonce = false;
    
    /**
     * Send once per... (NYI)
     * 
     * @var string
     */
    protected $sendonceper = 'Booking';
    
    /**
     * Days before trigger (NYI)
     * 
     * @var integer
     */
    protected $daysbeforetrigger = 0;
    
    /**
     * Show provisional boolean
     * 
     * @var boolean
     */
    protected $showprovisional = false;
    
    /**
     * Show deposit boolean
     * 
     * @var boolean
     */
    protected $showdepositpaid = false;
    
    /**
     * Show balance boolean
     * 
     * @var boolean
     */
    protected $showbalancepaid = false;
    
    /**
     * Show cancelled provisional boolean
     * 
     * @var boolean
     */
    protected $showcancelledprovisional = false;
    
    /**
     * Show cancelled confirmed boolean
     * 
     * @var boolean
     */
    protected $showcancelledconfirmed = false;
    
    /**
     * Show transferred boolean
     * 
     * @var boolean
     */
    protected $showtransferred = false;
    
    /**
     * Show owner boolean
     * 
     * @var boolean
     */
    protected $showowner = false;
    
    /**
     * Show flexilet boolean
     * 
     * @var boolean
     */
    protected $showflexilet = false;
    
    /**
     * Show cancelled flexilet boolean
     * 
     * @var boolean
     */
    protected $showcancelledflexilet = false;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->contactmethods = Collection::factory(
            'contactmethod',
            new \tabs\apiclient\template\ContactMethod,
            $this
        );
        $this->rolereasons = Collection::factory(
            'rolereason',
            new \tabs\apiclient\template\RoleReason,
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the trigger event
     *
     * @param stdclass|array|\tabs\apiclient\TriggerEvent $triggerevent Trigger event
     *
     * @return Template
     */
    public function setTriggerevent($triggerevent)
    {
        $this->triggerevent = \tabs\apiclient\TriggerEvent::factory($triggerevent);

        return $this;
    }

    /**
     * Set the templatetargetsource
     *
     * @param stdclass|array|\tabs\apiclient\TemplateTargetSource $templatetargetsource The Templatetargetsource
     *
     * @return Template
     */
    public function setTemplatetargetsource($templatetargetsource)
    {
        $this->templatetargetsource = \tabs\apiclient\TemplateTargetSource::factory($templatetargetsource);

        return $this;
    }

    /**
     * Set the branding
     *
     * @param stdclass|array|\tabs\apiclient\Branding $branding The Branding
     *
     * @return Template
     */
    public function setBranding($branding)
    {
        $this->branding = \tabs\apiclient\Branding::factory($branding);

        return $this;
    }

    /**
     * Set the bookingbrand
     *
     * @param stdclass|array|\tabs\apiclient\BookingBrand $bookingbrand The Bookingbrand
     *
     * @return Template
     */
    public function setBookingbrand($bookingbrand)
    {
        $this->bookingbrand = \tabs\apiclient\BookingBrand::factory($bookingbrand);

        return $this;
    }

    /**
     * Set the marketingbrand
     *
     * @param stdclass|array|\tabs\apiclient\MarketingBrand $marketingbrand The Marketingbrand
     *
     * @return Template
     */
    public function setMarketingbrand($marketingbrand)
    {
        $this->marketingbrand = \tabs\apiclient\MarketingBrand::factory($marketingbrand);

        return $this;
    }
    
    /**
     * Get the fields available for the template
     * 
     * @return array
     */
    public function getFields()
    {
        return self::getJson(
            client\Client::getClient()->get(
                $this->getUpdateUrl() . '/fields'
            ),
            true
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        
        if ($this->getTriggerevent()) {
            $arr['triggereventid'] = $this->getTriggerevent()->getId();
        }
        
        if ($this->getBranding()) {
            $arr['brandingid'] = $this->getBranding()->getId();
        }
        
        if ($this->getBookingbrand()) {
            $arr['bookingbrandid'] = $this->getBookingbrand()->getId();
        }
        
        if ($this->getMarketingbrand()) {
            $arr['marketingbrandid'] = $this->getMarketingbrand()->getId();
        }
        
        if ($this->getTemplatetargetsource()) {
            $arr['templatetargetsourceid'] = $this->getTemplatetargetsource()->getId();
        }
        
        return $arr;
    }

    /**
     * Returns the type string
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the templatename string
     *
     * @return string
     */
    public function getTemplatename()
    {
        return $this->templatename;
    }

    /**
     * Returns the subject string
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Returns the templatedescription string
     *
     * @return string
     */
    public function getTemplatedescription()
    {
        return $this->templatedescription;
    }

    /**
     * Returns the fromdate \DateTime
     *
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the todate \DateTime
     *
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Returns the mandatory boolean
     *
     * @return boolean
     */
    public function getMandatory()
    {
        return $this->mandatory;
    }

    /**
     * Returns the sendonce boolean
     *
     * @return boolean
     */
    public function getSendonce()
    {
        return $this->sendonce;
    }

    /**
     * Returns the sendonceper string
     *
     * @return string
     */
    public function getSendonceper()
    {
        return $this->sendonceper;
    }

    /**
     * Returns the daysbeforetrigger integer
     *
     * @return integer
     */
    public function getDaysbeforetrigger()
    {
        return $this->daysbeforetrigger;
    }

    /**
     * Returns the showprovisional boolean
     *
     * @return boolean
     */
    public function getShowprovisional()
    {
        return $this->showprovisional;
    }

    /**
     * Returns the showdepositpaid boolean
     *
     * @return boolean
     */
    public function getShowdepositpaid()
    {
        return $this->showdepositpaid;
    }

    /**
     * Returns the showbalancepaid boolean
     *
     * @return boolean
     */
    public function getShowbalancepaid()
    {
        return $this->showbalancepaid;
    }

    /**
     * Returns the showcancelledprovisional boolean
     *
     * @return boolean
     */
    public function getShowcancelledprovisional()
    {
        return $this->showcancelledprovisional;
    }

    /**
     * Returns the showcancelledconfirmed boolean
     *
     * @return boolean
     */
    public function getShowcancelledconfirmed()
    {
        return $this->showcancelledconfirmed;
    }

    /**
     * Returns the showtransferred boolean
     *
     * @return boolean
     */
    public function getShowtransferred()
    {
        return $this->showtransferred;
    }

    /**
     * Returns the showowner boolean
     *
     * @return boolean
     */
    public function getShowowner()
    {
        return $this->showowner;
    }

    /**
     * Returns the showflexilet boolean
     *
     * @return boolean
     */
    public function getShowflexilet()
    {
        return $this->showflexilet;
    }

    /**
     * Returns the showcancelledflexilet boolean
     *
     * @return boolean
     */
    public function getShowcancelledflexilet()
    {
        return $this->showcancelledflexilet;
    }

    /**
     * Returns the templatetargetsource object
     *
     * @return \tabs\apiclient\TemplateTargetSource
     */
    public function getTemplatetargetsource()
    {
        return $this->templatetargetsource;
    }

    /**
     * Returns the branding object
     *
     * @return \tabs\apiclient\Branding
     */
    public function getBranding()
    {
        return $this->branding;
    }

    /**
     * Returns the bookingbrand object
     *
     * @return \tabs\apiclient\BookingBrand
     */
    public function getBookingbrand()
    {
        return $this->bookingbrand;
    }

    /**
     * Returns the marketingbrand object
     *
     * @return \tabs\apiclient\MarketingBrand
     */
    public function getMarketingbrand()
    {
        return $this->marketingbrand;
    }

    /**
     * Returns the trigger event object
     *
     * @return \tabs\apiclient\TriggerEvent
     */
    public function getTriggerevent()
    {
        return $this->triggerevent;
    }

    /**
     * Returns the contactmethods collection
     *
     * @return Collection|\tabs\apiclient\template\ContactMethod[]
     */
    public function getContactmethods()
    {
        return $this->contactmethods;
    }

    /**
     * Returns the role reasons collection
     *
     * @return Collection|\tabs\apiclient\template\RoleReason[]
     */
    public function getRolereasons()
    {
        return $this->rolereasons;
    }
}