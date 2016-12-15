<?php

/**
 * Tabs Rest API Brochure Request object.
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

namespace tabs\apiclient\brochure;
use tabs\apiclient\Builder;
use tabs\apiclient\actor\Customer;
use tabs\apiclient\actor\Tabsuser;
use tabs\apiclient\core\SourceMarketingBrand;

/**
 * Tabs Rest API Brochure Request object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \DateTime       getRequestdatetime()              Returns the requested date time
 * @method BrochureRequest setRequestdatetime(\DateTime $dt) Set the requested date time
 * 
 * @method boolean         getEmailoptin()             Return the email optin flag
 * @method BrochureRequest setEmailoptin(boolean $opt) Set the email optin flag
 * 
 * @method Customer getCustomer() Returns the brochure request customer
 * @method Tabsuser getTabsuser() Returns the tabs user
 * 
 * @method SourceMarketingBrand getSourcemarketingbrand() Return the smb
 */
class BrochureRequest extends Builder
{
    /**
     * Requested date of the brochure
     * 
     * @var \DateTime
     */
    protected $requestdatetime;
    
    /**
     * Brochure customer
     * 
     * @var \tabs\apiclient\actor\Customer
     */
    protected $customer;
    
    /**
     * Brochure tabs user
     * 
     * @var \tabs\apiclient\actor\TabsUser
     */
    protected $tabsuser;
    
    /**
     * Email optin flag
     * 
     * @var boolean
     */
    protected $emailoptin = false;

    /**
     * Brochure request source marketing brand
     * 
     * @var SourceMarketingBrand
     */
    protected $sourcemarketingbrand;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->setRequestdatetime(new \DateTime());
        
        parent::__construct($id);
    }
    
    /**
     * Set the brochure request customer
     * 
     * @param stdClass|array|Customer $customer Brochure customer
     * 
     * @return BrochureRequest
     */
    public function setCustomer($customer)
    {
        $this->customer = Customer::factory($customer);
        
        return $this;
    }
    
    /**
     * Set the brochure request customer
     * 
     * @param stdClass|array|TabsUser $tabsuser Brochure customer
     * 
     * @return BrochureRequest
     */
    public function setTabsuser($tabsuser)
    {
        $this->tabsuser = TabsUser::factory($tabsuser);
        
        return $this;
    }
    
    /**
     * Set the source marketing brand
     * 
     * @param stdClass|array|Sourcemarketingbrand $smb Source marketing brand
     * 
     * @return \tabs\apiclient\core\Brochure
     */
    public function setSourcemarketingbrand($smb)
    {
        $this->sourcemarketingbrand = SourceMarketingBrand::factory($smb);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'customerid' => $this->getCustomer()->getId(),
            'emailoptin' => $this->boolToStr($this->getEmailoptin())
        );
        
        if ($this->getSourcemarketingbrand()) {
            $arr['sourcemarketingbrandid'] = $this->getSourcemarketingbrand()->getId();
        }
        
        if ($this->getTabsuser()) {
            $arr['tabsuserid'] = $this->getTabsuser()->getId();
        }
        
        return $arr;
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'request';
    }
}