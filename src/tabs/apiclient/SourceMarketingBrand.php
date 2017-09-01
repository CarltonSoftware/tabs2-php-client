<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;
use tabs\apiclient\MarketingBrand;

/**
 * Tabs Rest API Source Marketing Brand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \DateTime            getFromdate()              Returns the fromdate
 * @method SourceMarketingBrand setFromdate(\DateTime $dt) Set the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method SourceMarketingBrand  setTodate(\DateTime $dt) Set the todate
 * 
 * @method MarketingBrand getMarketingbrand() Returns the marketing brand
 * @method Source getSource() Returns the source
 */
class SourceMarketingBrand extends Builder
{
    /**
     * From date of the extra
     * 
     * @var \DateTime
     */
    protected $fromdate;
    
    /**
     * To date of the extra
     * 
     * @var \DateTime
     */
    protected $todate;
    
    /**
     * Source marketing brand
     * 
     * @var \tabs\apiclient\MarketingBrand
     */
    protected $marketingbrand;
    
    /**
     * Source
     * 
     * @var \tabs\apiclient\Source
     */
    protected $source;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->setFromdate(new \DateTime());
        $this->setTodate(new \DateTime());
        
        parent::__construct($id);
    }
    
    /**
     * Set the source marketing brand
     * 
     * @param stdClass|array|string|MarketingBrand $mb Marketing brand
     * 
     * @return SourceMarketingBrand
     */
    public function setMarketingbrand($mb)
    {
        $this->marketingbrand = MarketingBrand::factory($mb);
        
        return $this;
    }
    
    /**
     * Set the source
     * 
     * @param stdClass|array|string|Source $s Source
     * 
     * @return SourceMarketingBrand
     */
    public function setSource($s)
    {
        $this->source = Source::factory($s);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getFromdate()->format('Y-m-d'),
            'sourceid' => $this->getSource()->getId()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'marketing';
    }
}