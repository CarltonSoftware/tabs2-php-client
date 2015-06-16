<?php

/**
 * Tabs Rest API Extra brand configuration object.
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

namespace tabs\apiclient\core\extra;
use tabs\apiclient\core\Vatband;

/**
 * Tabs Rest API Extra brand configuration object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \DateTime     getFromdate()              Returns the fromdate
 * @method Configuration setFromdate(\DateTime $dt) Set the fromdate
 * 
 * @method \DateTime     getTodate()              Returns the todate
 * @method Configuration setTodate(\DateTime $dt) Set the todate
 * 
 * @method boolean       getCompulsory()              Returns the compulsory flag
 * @method Configuration setCompulsory(boolean $comp) Set the compulsory flag
 * 
 * @method boolean       getIncluded()             Returns the Included flag
 * @method Configuration setIncluded(boolean $inc) Set the Included flag
 * 
 * @method boolean       getPayagency()            Returns the pay to agency flag
 * @method Configuration setPayagency(boolean $pa) Set the pay to agency flag
 * 
 * @method boolean       getPayowner()            Returns the pay to owner flag
 * @method Configuration setPayowner(boolean $po) Set the pay to owner flag
 * 
 * @method boolean       getVisibletoowner()             Returns the owner visibility flag
 * @method Configuration setVisibletoowner(boolean $vto) Set the owner visibility flag
 * 
 * @method boolean       getCustomerselectable()            Returns the customer selectable flag
 * @method Configuration setCustomerselectable(boolean $cs) Set the customer selectable flag
 * 
 * @method boolean       getMaximumquantity()            Returns the max quantity flag
 * @method Configuration setMaximumquantity(boolean $mq) Set the max quantity flag
 * 
 * @method Vatband       getVatband() Return the current vatband object
 * 
 */
abstract class Configuration extends \tabs\apiclient\core\Builder
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
     * Compulsory boolean flag
     * 
     * @var boolean
     */
    protected $compulsory = false;
    
    /**
     * Included in price boolean flag
     * 
     * @var boolean
     */
    protected $included = false;
    
    /**
     * Agency direct boolean flag
     * 
     * @var boolean
     */
    protected $payagency = false;
    
    /**
     * Owner direct boolean flag
     * 
     * @var boolean
     */
    protected $payowner = false;
    
    /**
     * Owner visibility flag
     * 
     * @var boolean
     */
    protected $visibletoowner = false;
    
    /**
     * Customer visibility flag
     * 
     * @var boolean
     */
    protected $customerselectable = false;

    /**
     * Maximum quantity
     * 
     * @var boolean
     */
    protected $maximumquantity = false;

    /**
     * Vatband
     * 
     * @var Vatband
     */
    protected $vatband;
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setFromdate(new \DateTime());
        $this->setTodate(new \DateTime());
        $this->vatband = new Vatband();
    }
    
    /**
     * Set the vatband
     * 
     * @param array $vatband Vat band object
     * 
     * @return Configuration;
     */
    public function setVatband($vatband)
    {
        $this->vatband = Vatband::factory($vatband);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf(
            '%s - %s',
            $this->getFromdate()->format('Y-m-d'),
            $this->getTodate()->format('Y-m-d')
        );
    }
    
    /**
     * Return array of configuration data
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'compulsory' => $this->boolToStr($this->getCompulsory()),
            'included' => $this->boolToStr($this->getIncluded()),
            'payagency' => $this->boolToStr($this->getPayagency()),
            'payowner' => $this->boolToStr($this->getPayowner()),
            'visibletoowner' => $this->boolToStr($this->getVisibletoowner()),
            'customerselectable' => $this->boolToStr($this->getCustomerselectable()),
            'maximumquantity' => $this->boolToStr($this->getMaximumquantity()),
            'vatband' => $this->getVatband()->getVatband(),
            'type' => $this->getClass()
        );
    }

    /**
     * @inheritDoc
     */
    public final function getUrlStub()
    {
        return 'configuration';
    }
}