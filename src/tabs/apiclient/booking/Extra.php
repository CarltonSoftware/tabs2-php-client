<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;
use tabs\apiclient\extra\branding\Configuration;

/**
 * Tabs Rest API Extra object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getBookeddatetime() Returns the bookeddatetime
 * @method Extra setBookeddatetime(\DateTime $var) Sets the bookeddatetime
 * 
 * @method \tabs\apiclient\Extra getExtra() Returns the extra
 * @method float getUnitprice() Returns the unitprice
 * @method Extra setUnitprice(float $var) Sets the unitprice
 * 
 * @method float getPrice()           Returns the Price
 * 
 * @method float getQuantity() Returns the quantity
 * @method Extra setQuantity(float $var) Sets the quantity
 * 
 * @method boolean getPriceoverridden() Returns the priceoverridden
 * @method Extra setPriceoverridden(boolean $var) Sets the priceoverridden
 * 
 * @method string getAgencypercentage() Returns the agencypercentage
 * @method Extra setAgencypercentage(string $var) Sets the agencypercentage
 * 
 * @method float getAgencyincomeexvat() Returns the agencyincomeexvat
 * @method Extra setAgencyincomeexvat(float $var) Sets the agencyincomeexvat
 * 
 * @method \tabs\apiclient\Vatrate getVatrate() Returns the vatrate
 * @method float getVat() Returns the vat
 * @method Extra setVat(float $var) Sets the vat
 * 
 * @method float getOwnerincome() Returns the ownerincome
 * @method Extra setOwnerincome(float $var) Sets the ownerincome
 * 
 * @method Configuration getConfiguration() Returns the configuration
 */
class Extra extends Builder
{
    /**
     * Bookeddatetime
     *
     * @var \DateTime
     */
    protected $bookeddatetime;

    /**
     * Extra
     *
     * @var \tabs\apiclient\Extra
     */
    protected $extra;

    /**
     * Unitprice
     *
     * @var float
     */
    protected $unitprice;

    /**
     * Price
     *
     * @var float
     */
    protected $price;

    /**
     * Quantity
     *
     * @var float
     */
    protected $quantity = 0;

    /**
     * Priceoverridden
     *
     * @var boolean
     */
    protected $priceoverridden = false;

    /**
     * Agencypercentage
     *
     * @var string
     */
    protected $agencypercentage;

    /**
     * Agencyincomeexvat
     *
     * @var float
     */
    protected $agencyincomeexvat = 0;

    /**
     * Vatrate
     *
     * @var \tabs\apiclient\Vatrate
     */
    protected $vatrate;

    /**
     * Vat
     *
     * @var float
     */
    protected $vat = 0;

    /**
     * Ownerincome
     *
     * @var float
     */
    protected $ownerincome = 0;
    
    /**
     * Extra configuration
     * 
     * @var Configuration
     */
    protected $configuration;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->bookeddatetime = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the extra
     *
     * @param stdclass|array|\tabs\apiclient\Extra $extra The Extra
     *
     * @return Extra
     */
    public function setExtra($extra)
    {
        $this->extra = \tabs\apiclient\Extra::factory($extra);

        return $this;
    }

    /**
     * Set the vatrate
     *
     * @param stdclass|array|\tabs\apiclient\Vatrate $vatrate The Vatrate
     *
     * @return Extra
     */
    public function setVatrate($vatrate)
    {
        $this->vatrate = \tabs\apiclient\Vatrate::factory($vatrate);

        return $this;
    }

    /**
     * Set the configuration
     *
     * @param stdclass|array|\tabs\apiclient\extra\branding\Configuration $configuration The Configuration
     *
     * @return Extra
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = Configuration::factory($configuration);

        return $this;
    }
    
    /**
     * Set the price (and the overridden flag)
     * 
     * @param float $price Price
     * 
     * @return \tabs\apiclient\booking\Extra
     */
    public function setPrice($price)
    {
        $this->price = $price;
        $this->setPriceoverridden(true);
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'extraid' => $this->getExtra()->getId(),
            'quantity' => $this->getQuantity()
        );
        
        if ($this->getUnitprice()) {
            $arr['unitprice'] = $this->getUnitprice();
        }
        
        return $arr;
    }
}