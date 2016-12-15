<?php

/**
 * Tabs Rest API Extra price object.
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
use tabs\apiclient\core\Currency;

/**
 * Tabs Rest API Extra price object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \DateTime getFromdate()              Returns the fromdate
 * @method Price     setFromdate(\DateTime $dt) Set the fromdate
 * 
 * @method \DateTime getTodate()              Returns the todate
 * @method Price     setTodate(\DateTime $dt) Set the todate
 * 
 * @method boolean getPropertypricing()            Returns the property pricing flag
 * @method Price   setPropertypricing(boolean $pp) Set the propertypricing flag
 * 
 * @method boolean getPeradult()            Returns the per adult flag
 * @method Price   setPeradult(boolean $pa) Set the per adult flag
 * 
 * @method boolean getPerchild()            Returns the per child flag
 * @method Price   setPerchild(boolean $pc) Set the per child flag
 * 
 * @method boolean getPerinfant()            Returns the per infant flag
 * @method Price   setPerinfant(boolean $pi) Set the per infant flag
 * 
 * @method Currency getCurrency() Return the currency
 * 
 */
abstract class Price extends \tabs\apiclient\core\Builder
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
     * Property pricing boolean flag
     * 
     * @var boolean
     */
    protected $propertypricing = false;
    
    /**
     * Included in price boolean flag
     * 
     * @var boolean
     */
    protected $peradult = false;
    
    /**
     * Agency direct boolean flag
     * 
     * @var boolean
     */
    protected $perchild = false;
    
    /**
     * Owner direct boolean flag
     * 
     * @var boolean
     */
    protected $perinfant = false;

    /**
     * Currency
     * 
     * @var Currency
     */
    protected $currency;
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setFromdate(new \DateTime());
        $this->setTodate(new \DateTime());
        $this->currency = new Currency();
    }
    
    /**
     * Set the currency
     * 
     * @param stdClass|Currency $currency Currency
     * 
     * @return Configuration;
     */
    public function setCurrency($currency)
    {
        $this->currency = Currency::factory($currency);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return sprintf(
            'Type: %s Dates: %s - %s Currency: %s',
            $this->getClass(),
            $this->getFromdate()->format('Y-m-d'),
            $this->getTodate()->format('Y-m-d'),
            $this->getCurrency()->getName()
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
            'propertypricing' => $this->boolToStr($this->getPropertypricing()),
            'peradult' => $this->boolToStr($this->getPeradult()),
            'perchild' => $this->boolToStr($this->getPerchild()),
            'perinfant' => $this->boolToStr($this->getPerinfant()),
            'currencycode' => $this->getCurrency()->getCode()
        );
    }

    /**
     * @inheritDoc
     */
    public final function getUrlStub()
    {
        return 'pricing';
    }
}