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
 * @method \DateTime getOrderfromdate() Returns the orderfromdate
 * @method Brochure setOrderfromdate(\DateTime $var) Sets the orderfromdate
 * 
 * @method \DateTime getAvailablefromdate() Returns the availablefromdate
 * @method Brochure setAvailablefromdate(\DateTime $var) Sets the availablefromdate
 * 
 * @method \DateTime getOrdertodate() Returns the ordertodate
 * @method Brochure setOrdertodate(\DateTime $var) Sets the ordertodate
 * 
 * @method string getName() Returns the name
 * @method Brochure setName(string $var) Sets the name
 * 
 * @method string getYear() Returns the year
 * @method Brochure setYear(string $var) Sets the year
 * 
 * @method string getWeight() Returns the weight
 * @method Brochure setWeight(string $var) Sets the weight
 * 
 * @method float getCost() Returns the cost
 * @method Brochure setCost(float $var) Sets the cost
 * 
 * @method MarketingBrand getMarketingbrand() Returns the marketingbrand
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
}