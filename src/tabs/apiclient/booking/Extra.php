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
 * @method Extra setBookeddatetime(\DateTime $var) Sets the bookeddatetime
 *
 * @method Extra setUnitprice(float $var) Sets the unitprice
 *
 *
 * @method Extra setQuantity(float $var) Sets the quantity
 *
 * @method Extra setPriceoverridden(boolean $var) Sets the priceoverridden
 *
 * @method Extra setAgencypercentage(string $var) Sets the agencypercentage
 *
 * @method Extra setAgencyincomeexvat(float $var) Sets the agencyincomeexvat
 *
 * @method Extra setVat(float $var) Sets the vat
 *
 * @method Extra setOwnerincome(float $var) Sets the ownerincome
 *
 * @method Extra setCancelleddatetime(\DateTime $var) Sets the cancelleddatetime
 *
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
     * Cancelleddatetime
     *
     * @var \DateTime
     */
    protected $cancelleddatetime;

    /**
     * Extra configuration
     *
     * @var Configuration
     */
    protected $configuration;

    /**
     * Description override
     *
     * @var string
     */
    protected $descriptionoverride;

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
        $this->set('price', $price)
            ->setPriceoverridden(true);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        $arr['extraid'] = $this->getExtra()->getId();

        return $arr;
    }

    /**
     * Returns the bookeddatetime
     *
     * @return \DateTime
     */
    public function getBookeddatetime()
    {
        return $this->bookeddatetime;
    }

    /**
     * Returns the extra
     *
     * @return \tabs\apiclient\Extra
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Returns the unitprice
     *
     * @return float
     */
    public function getUnitprice()
    {
        return $this->unitprice;
    }

    /**
     * Returns the Price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the quantity
     *
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Returns the priceoverridden
     *
     * @return boolean
     */
    public function getPriceoverridden()
    {
        return $this->priceoverridden;
    }

    /**
     * Returns the agencypercentage
     *
     * @return string
     */
    public function getAgencypercentage()
    {
        return $this->agencypercentage;
    }

    /**
     * Returns the agencyincomeexvat
     *
     * @return float
     */
    public function getAgencyincomeexvat()
    {
        return $this->agencyincomeexvat;
    }

    /**
     * Returns the vatrate
     *
     * @return \tabs\apiclient\Vatrate
     */
    public function getVatrate()
    {
        return $this->vatrate;
    }

    /**
     * Returns the vat
     *
     * @return float
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Returns the ownerincome
     *
     * @return float
     */
    public function getOwnerincome()
    {
        return $this->ownerincome;
    }

    /**
     * Returns the cancelleddatetime
     *
     * @return \DateTime
     */
    public function getCancelleddatetime()
    {
        return $this->cancelleddatetime;
    }

    /**
     * Returns the configuration
     *
     * @return Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Returns the description override
     *
     * @return string
     */
    public function getDescriptionoverride()
    {
        return strval($this->descriptionoverride);
    }

    /**
     * Returns the description override, minus EE and EEIA prefix
     *
     * @return string
     */
    public function getNoPrefixDescriptionoverride()
    {
        return str_replace(['EE - ', 'EEIA - '], '', $this->getDescriptionoverride());
    }
}