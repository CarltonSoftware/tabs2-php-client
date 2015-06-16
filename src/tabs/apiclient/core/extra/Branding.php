<?php

/**
 * Tabs Rest API ExtraBranding object.
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
use tabs\apiclient\brand\Branding as CoreBranding;
use tabs\apiclient\collection\core\extra\Configuration as ConfigurationCollection;
use tabs\apiclient\core\extra\Price as ExtraBrandPrice;
use tabs\apiclient\collection\core\extra\Price as ExtraBrandPriceCollection;

/**
 * Tabs Rest API ExtraBranding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method CoreBranding              getBranding()       Return the branding
 * @method ConfigurationCollection   getConfigurations() Return the configuration collection
 * @method ExtraBrandPriceCollection getPrices()         Returns an ExtraBrandPrice Collection
 */
class Branding extends \tabs\apiclient\core\Builder
{
    /**
     * The branding
     * 
     * @var CoreBranding
     */
    protected $branding;
    
    /**
     * Extra brands configuration collection
     * 
     * @var ConfigurationCollection
     */
    protected $configurations;
    
    /**
     * Extra brands price Collection
     * 
     * @var ExtraBrandPriceCollection 
     */
    protected $prices;
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->configurations = new ConfigurationCollection();
        $this->configurations->setElementParent($this);
        
        $this->prices = new ExtraBrandPriceCollection();
        $this->prices->setElementParent($this);
    }
    
    /**
     * Add a new extra configuration
     * 
     * @param \tabs\apiclient\core\extra\Configuration $conf Extra brand config
     * 
     * @return \tabs\apiclient\core\extra\Branding
     */
    public function addConfiguration(Configuration &$conf)
    {
        $conf->setParent($this);
        $this->configurations->addElement($conf);
        
        return $this;
    }
    
    /**
     * Add a new extra pricing
     * 
     * @param ExtraBrandPrice $price Extra brand price object
     * 
     * @return \tabs\apiclient\core\extra\Branding
     */
    public function addPrice(ExtraBrandPrice &$price)
    {
        $price->setParent($this);
        $this->prices->addElement($price);
        
        return $this;
    }

    /**
     * Set the branding 
     * 
     * @param array|stdClass|Branding $br Branding
     * 
     * @return \tabs\apiclient\brand\Branding
     */
    public function setBranding($br)
    {
        $branding = CoreBranding::factory($br);
        $this->branding = $branding->setParent($this);
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'brandingid' => $this->getBranding()->getId()
        );
    }
    
    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getBranding();
    }  
}
