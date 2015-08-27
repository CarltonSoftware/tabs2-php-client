<?php

/**
 * Tabs Rest API Brochure object.
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

namespace tabs\apiclient\core;
use \tabs\apiclient\brand\MarketingBrand;
use \tabs\apiclient\collection\core\BrochureRequest as BrochureRequestCollection;

/**
 * Tabs Rest API Brochure object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \DateTime getOrderfromdate()              Returns the fromdate
 * @method Brochure  setOrderfromdate(\DateTime $dt) Set the fromdate
 * 
 * @method \DateTime getAvailablefromdate()              Returns the avail fromdate
 * @method Brochure  setAvailablefromdate(\DateTime $dt) Set the avail fromdate
 * 
 * @method \DateTime getOrdertodate()              Returns the todate
 * @method Brochure  setOrdertodate(\DateTime $dt) Set the todate
 * 
 * @method string    getName()             Returns the name
 * @method Brochure  setName(string $name) Sets the name
 * 
 * @method string    getYear()           Returns the year of publication
 * @method Brochure  setYear(string $yr) Sets the year of publication
 * 
 * @method string    getWeight()               Returns the brochure weight
 * @method Brochure  setWeight(string $weight) Sets the brochure weight
 * 
 * @method string    getCost()             Returns the brochure cost
 * @method Brochure  setCost(string $cost) Sets the brochure cost
 * 
 * @method MarketingBrand getMarketingbrand() Returns the brochure marketing brand
 * 
 * @method BrochureRequestCollection getRequests() Return the brochure request collection
 */
class Brochure extends Builder
{
    /**
     * From date of the Brochure
     * 
     * @var \DateTime
     */
    protected $orderfromdate;
    
    /**
     * Available from date of the Brochure
     * 
     * @var \DateTime
     */
    protected $availablefromdate;
    
    /**
     * To date of the Brochure
     * 
     * @var \DateTime
     */
    protected $ordertodate;
    
    /**
     * Brochure name
     * 
     * @var string
     */
    protected $name = '';
    
    /**
     * Brochure year
     * 
     * @var string
     */
    protected $year = '';
    
    /**
     * Brochure weight
     * 
     * @var string
     */
    protected $weight = '';
    
    /**
     * Brochure cost
     * 
     * @var float
     */
    protected $cost = '';
    
    /**
     * Brochure marketing brand
     * 
     * @var \tabs\apiclient\brand\MarketingBrand
     */
    protected $marketingbrand;
    
    /**
     * Brochure requests
     * 
     * @var BrochureRequestCollection
     */
    protected $requests;

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setOrderfromdate(new \DateTime());
        $this->setAvailablefromdate(new \DateTime());
        $this->setOrdertodate(new \DateTime());
        
        $this->requests = new \tabs\apiclient\collection\core\BrochureRequest();
        $this->requests->setElementParent($this);
    }
    
    /**
     * Set the brochure marketing brand
     * 
     * @param stdClass|array|string|MarketingBrand $mb Marketing brand
     * 
     * @return \tabs\apiclient\core\Brochure
     */
    public function setMarketingbrand($mb)
    {
        $this->marketingbrand = MarketingBrand::factory($mb);
        
        return $this;
    }
    
    /**
     * Set the brochure requests
     * 
     * @param array $requests Array of brochure requests
     * 
     * @return \tabs\apiclient\core\Brochure
     */
    public function setRequests(array $requests)
    {
        foreach ($requests as $r) {
            $br = BrochureRequest::factory($r);
            $this->addRequest($br);
        }
        
        return $this;
    }
    
    /**
     * Add a new brochure request into the collection
     * 
     * @param \tabs\apiclient\core\BrochureRequest $brochure Brochure request
     * 
     * @return \tabs\apiclient\core\Brochure
     */
    public function addRequest(BrochureRequest &$br)
    {
        $br->setParent($this);
        $this->requests->addElement($br);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'marketingbrandcode' => $this->getMarketingbrand()->getCode(),
            'year' => (integer) $this->getYear(),
            'orderfromdate' => $this->getOrderfromdate()->format('Y-m-d'),
            'ordertodate' => $this->getOrdertodate()->format('Y-m-d'),
            'availablefromdate' => $this->getAvailablefromdate()->format('Y-m-d'),
            'weight' => $this->getWeight(),
            'cost' => (float) $this->getCost()
        );
    }
}