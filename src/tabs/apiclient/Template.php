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
 * @method string getType() Returns the type string
 * @method Template setType(string $var) Sets the type
 * 
 * @method string getTemplatename() Returns the templatename string
 * @method Template setTemplatename(string $var) Sets the templatename
 * 
 * @method string getSubject() Returns the subject string
 * @method Template setSubject(string $var) Sets the subject
 * 
 * @method string getTemplatedescription() Returns the templatedescription string
 * @method Template setTemplatedescription(string $var) Sets the templatedescription
 * 
 * @method \DateTime getFromdate() Returns the fromdate \DateTime
 * @method Template setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate \DateTime
 * @method Template setTodate(\DateTime $var) Sets the todate
 * 
 * @method boolean getMandatory() Returns the mandatory boolean
 * @method TriggerEvent setMandatory(boolean $var) Sets the mandatory
 * 
 * @method boolean getSendonce() Returns the sendonce boolean
 * @method TriggerEvent setSendonce(boolean $var) Sets the sendonce
 * 
 * @method string getSendonceper() Returns the sendonceper string
 * @method TriggerEvent setSendonceper(string $var) Sets the sendonceper
 * 
 * @method integer getDaysbeforetrigger() Returns the daysbeforetrigger integer
 * @method TriggerEvent setDaysbeforetrigger(integer $var) Sets the daysbeforetrigger
 * 
 * @method boolean getShowprovisional() Returns the showprovisional boolean
 * @method TriggerEvent setShowprovisional(boolean $var) Sets the showprovisional
 * 
 * @method boolean getShowdepositpaid() Returns the showdepositpaid boolean
 * @method TriggerEvent setShowdepositpaid(boolean $var) Sets the showdepositpaid
 * 
 * @method boolean getShowbalancepaid() Returns the showbalancepaid boolean
 * @method TriggerEvent setShowbalancepaid(boolean $var) Sets the showbalancepaid
 * 
 * @method boolean getShowcancelledprovisional() Returns the showcancelledprovisional boolean
 * @method TriggerEvent setShowcancelledprovisional(boolean $var) Sets the showcancelledprovisional
 * 
 * @method boolean getShowcancelledconfirmed() Returns the showcancelledconfirmed boolean
 * @method TriggerEvent setShowcancelledconfirmed(boolean $var) Sets the showcancelledconfirmed
 * 
 * @method boolean getShowtransferred() Returns the showtransferred boolean
 * @method TriggerEvent setShowtransferred(boolean $var) Sets the showtransferred
 * 
 * @method boolean getShowowner() Returns the showowner boolean
 * @method TriggerEvent setShowowner(boolean $var) Sets the showowner
 * 
 * @method boolean getShowflexilet() Returns the showflexilet boolean
 * @method TriggerEvent setShowflexilet(boolean $var) Sets the showflexilet
 * 
 * @method boolean getShowcancelledflexilet() Returns the showcancelledflexilet boolean
 * @method TriggerEvent setShowcancelledflexilet(boolean $var) Sets the showcancelledflexilet
 * 
 * @method \tabs\apiclient\TemplateTargetSource getTemplatetargetsource() Returns the templatetargetsource object
 * @method \tabs\apiclient\Branding getBranding() Returns the branding object
 * @method \tabs\apiclient\BookingBrand getBookingbrand() Returns the bookingbrand object
 * @method \tabs\apiclient\MarketingBrand getMarketingbrand() Returns the marketingbrand object
 * @method \tabs\apiclient\TriggerEvent getTriggerevent() Returns the trigger event object
 * 
 * @method Collection|\tabs\apiclient\template\ContactMethod[] getContactmethods() Returns the contactmethods collection
 * @method Collection|\tabs\apiclient\template\RoleReason[] getRolereasons() Returns the role reasons collection
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
}