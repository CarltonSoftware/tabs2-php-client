<?php
namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\MarketingBrand;

/**
 * Tabs Rest API Brochure object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Brochure setOrderfromdate(\DateTime $var) Sets the orderfromdate
 * 
 * @method Brochure setAvailablefromdate(\DateTime $var) Sets the availablefromdate
 * 
 * @method Brochure setOrdertodate(\DateTime $var) Sets the ordertodate
 * 
 * @method Brochure setName(string $var) Sets the name
 * 
 * @method Brochure setYear(string $var) Sets the year
 * 
 * @method Brochure setWeight(string $var) Sets the weight
 * 
 * @method Brochure setCost(float $var) Sets the cost
 * 
 * @method Collection getBrochurerequests() Returns the brochure requests collection
 */
class Brochure extends Builder
{
    /**
     * Orderfromdate
     *
     * @var \DateTime
     */
    protected $orderfromdate;

    /**
     * Availablefromdate
     *
     * @var \DateTime
     */
    protected $availablefromdate;

    /**
     * Ordertodate
     *
     * @var \DateTime
     */
    protected $ordertodate;

    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Year
     *
     * @var string
     */
    protected $year;

    /**
     * Weight
     *
     * @var string
     */
    protected $weight;

    /**
     * Cost
     *
     * @var float
     */
    protected $cost;

    /**
     * Marketingbrand
     *
     * @var MarketingBrand
     */
    protected $marketingbrand;
    
    /**
     * Brochure Requests
     * 
     * @var Collection
     */
    protected $brochurerequests;

    // -------------------- Public Functions -------------------- //
    
    /**
     * Constructor
     * 
     * @param integer $id ID
     * 
     * @return void
     */
    public function __construct($id = null)
    {
        $this->availablefromdate = new \DateTime();
        $this->orderfromdate = new \DateTime();
        $this->ordertodate = new \DateTime();
        $this->brochurerequests = Collection::factory(
            'request',
            new brochure\BrochureRequest,
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the marketingbrand
     *
     * @param stdclass|array|MarketingBrand $marketingbrand The Marketingbrand
     *
     * @return Brochure
     */
    public function setMarketingbrand($marketingbrand)
    {
        $this->marketingbrand = MarketingBrand::factory(
            $marketingbrand
        );
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'orderfromdate' => $this->getOrderfromdate()->format('Y-m-d'),
            'availablefromdate' => $this->getAvailablefromdate()->format('Y-m-d'),
            'ordertodate' => $this->getOrdertodate()->format('Y-m-d'),
            'name' => $this->getName(),
            'year' => $this->getYear(),
            'weight' => $this->getWeight(),
            'cost' => $this->getCost(),
            'marketingbrand' => $this->getMarketingbrand()->getId()
        );
    }

    /**
     * Returns the orderfromdate
     *
     * @return \DateTime
     */
    public function getOrderfromdate()
    {
        return $this->orderfromdate;
    }

    /**
     * Returns the availablefromdate
     *
     * @return \DateTime
     */
    public function getAvailablefromdate()
    {
        return $this->availablefromdate;
    }

    /**
     * Returns the ordertodate
     *
     * @return \DateTime
     */
    public function getOrdertodate()
    {
        return $this->ordertodate;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Returns the weight
     *
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Returns the cost
     *
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Returns the marketingbrand
     *
     * @return MarketingBrand
     */
    public function getMarketingbrand()
    {
        return $this->marketingbrand;
    }
}