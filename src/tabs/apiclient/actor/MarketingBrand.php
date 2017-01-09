<?php

namespace tabs\apiclient\actor;

use tabs\apiclient\Builder;
use tabs\apiclient\actor\marketingbrand\CustomerSource;
use tabs\apiclient\Collection;
use tabs\apiclient\actor\marketingbrand\EmailList;

/**
 * Tabs Rest API MarketingBrand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\MarketingBrand getMarketingbrand() Returns the marketingbrand
 * @method boolean getNocontact() Returns the nocontact
 * @method MarketingBrand setNocontact(boolean $var) Sets the nocontact
 * 
 * @method CustomerSource getFirstcustomersource() Returns the firstcustomersource
 * 
 * @method Collection|CustomerSource[] getSources() Returns the sources
 * 
 * @method Collection|EmailList[] getEmaillists() Returns the email lists
 */
class MarketingBrand extends Builder
{
    /**
     * Marketingbrand
     *
     * @var \tabs\apiclient\MarketingBrand
     */
    protected $marketingbrand;

    /**
     * Nocontact
     *
     * @var boolean
     */
    protected $nocontact = false;

    /**
     * Firstcustomersource
     *
     * @var CustomerSource
     */
    protected $firstcustomersource;
    
    /**
     * Customer sources
     * 
     * @var Collection|CustomerSource[]
     */
    protected $sources;
    
    /**
     * Customer email lists
     * 
     * @var Collection|EmailList[]
     */
    protected $emaillists;

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->sources = Collection::factory(
            'source',
            new CustomerSource(),
            $this
        );
        
        $this->emaillists = Collection::factory(
            'emaillist',
            new EmailList(),
            $this
        );

        parent::__construct($id);
    }
    
    /**
     * Set the marketingbrand
     *
     * @param stdclass|array|\tabs\apiclient\MarketingBrand $marketingbrand The Marketingbrand
     *
     * @return MarketingBrand
     */
    public function setMarketingbrand($marketingbrand)
    {
        $this->marketingbrand = \tabs\apiclient\MarketingBrand::factory($marketingbrand);

        return $this;
    }

    /**
     * Set the firstcustomersource
     *
     * @param stdclass|array|CustomerSource $firstcustomersource The Firstcustomersource
     *
     * @return MarketingBrand
     */
    public function setFirstcustomersource($firstcustomersource)
    {
        $this->firstcustomersource = CustomerSource::factory($firstcustomersource);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'marketingbrandid' => $this->getMarketingbrand()->getId(),
            'nocontact' => $this->boolToStr($this->getNocontact())
        );
        
        if ($this->getFirstcustomersource()) {
            $arr['firstcustomersourceid'] = $this->getFirstcustomersource()->getId();
        }
        
        return $arr;
    }
}