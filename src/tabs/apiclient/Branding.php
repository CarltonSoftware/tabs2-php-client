<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Vatband;
use tabs\apiclient\BrandingGroup;
use tabs\apiclient\BookingBrand;
use tabs\apiclient\MarketingBrand;
use tabs\apiclient\Currency;

/**
 * Tabs Rest API object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 *
 * @method Branding setBacsoutputtype(string $var) Sets the bacsoutputtype
 * @method Branding setBacssettings(string $var) Sets the bacssettings
 * @method Collection|branding\Extra[] getExtras() Returns the branding extras
 */
class Branding extends Builder
{
    /**
     * Brandinggroup
     *
     * @var BrandingGroup
     */
    protected $brandinggroup;

    /**
     * Marketingbrand
     *
     * @var MarketingBrand
     */
    protected $marketingbrand;

    /**
     * Bookingbrand
     *
     * @var BookingBrand
     */
    protected $bookingbrand;

    /**
     * Lettingincomevatband
     *
     * @var Vatband
     */
    protected $lettingincomevatband;

    /**
     * Bacsoutputtype
     *
     * @var string
     */
    protected $bacsoutputtype;

    /**
     * Bacssettings
     *
     * @var string
     */
    protected $bacssettings;

    /**
     * Currency
     *
     * @var Currency
     */
    protected $currency;

    /**
     * Extra collection
     *
     * @var Collection|branding\Extra[]
     */
    protected $extras;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->extras = Collection::factory(
            'extra',
            new branding\Extra(),
            $this
        );

        parent::__construct($id);
    }

    /**
     * Set the brandinggroup
     *
     * @param stdclass|array|BrandingGroup $brandinggroup The Brandinggroup
     *
     * @return Branding
     */
    public function setBrandinggroup($brandinggroup)
    {
        $this->brandinggroup = BrandingGroup::factory($brandinggroup);

        return $this;
    }

    /**
     * Set the marketingbrand
     *
     * @param stdclass|array|MarketingBrand $marketingbrand The Marketingbrand
     *
     * @return Branding
     */
    public function setMarketingbrand($marketingbrand)
    {
        $this->marketingbrand = MarketingBrand::factory($marketingbrand);

        return $this;
    }

    /**
     * Set the bookingbrand
     *
     * @param stdclass|array|BookingBrand $bookingbrand The Bookingbrand
     *
     * @return Branding
     */
    public function setBookingbrand($bookingbrand)
    {
        $this->bookingbrand = BookingBrand::factory($bookingbrand);

        return $this;
    }

    /**
     * Set the lettingincomevatband
     *
     * @param stdclass|array|Vatband $lettingincomevatband The Lettingincomevatband
     *
     * @return Branding
     */
    public function setLettingincomevatband($lettingincomevatband)
    {
        $this->lettingincomevatband = Vatband::factory(
            $lettingincomevatband
        );

        return $this;
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|Currency $currency The Currency
     *
     * @return Branding
     */
    public function setCurrency($currency)
    {
        $this->currency = Currency::factory($currency);

        return $this;
    }


    /**
     * Output a friendly name for the branding
     *
     * @param string $sep Separator
     *
     * @return string
     */
    public function getName($sep = ' / ')
    {
        return implode(
            $sep,
            array(
                $this->getBrandinggroup()->getName(),
                $this->getBookingbrand()->getName(),
                $this->getMarketingbrand()->getName()
            )
        );
    }

    /**
     * Output Custome name for Branding
     *
     * @return string
     */
    public function getBrandingCombinedBradingName()
    {
        return "(bb) " . $this->getBookingbrand()->getName() . " / (mb) " . $this->getMarketingbrand()->getName() . " (branding id: " . $this->getId() . ")";
    }


    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'brandinggroup' => $this->getBrandinggroup()->getId(),
            'marketingbrand' => $this->getMarketingbrand()->getId(),
            'bookingbrand' => $this->getBookingbrand()->getId(),
            'lettingincomevatband' => $this->getLettingincomevatband()->getId(),
            'bacsoutputtype' => $this->getBacsoutputtype(),
            'bacssettings' => $this->getBacssettings(),
            'currency' => $this->getCurrency()->getId(),
        );
    }

    /**
     * Returns the brandinggroup
     *
     * @return BrandingGroup
     */
    public function getBrandinggroup()
    {
        return $this->brandinggroup;
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

    /**
     * Returns the bookingbrand
     *
     * @return BookingBrand
     */
    public function getBookingbrand()
    {
        return $this->bookingbrand;
    }

    /**
     * Returns the lettingincomevatband
     *
     * @return VatBand
     */
    public function getLettingincomevatband()
    {
        return $this->lettingincomevatband;
    }

    /**
     * Returns the bacsoutputtype
     *
     * @return string
     */
    public function getBacsoutputtype()
    {
        return $this->bacsoutputtype;
    }

    /**
     * Returns the bacssettings
     *
     * @return string
     */
    public function getBacssettings()
    {
        return $this->bacssettings;
    }

    /**
     * Returns the currency
     *
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    public function quickSet($data)
    {
        $this->id = $data->id;
        $this->inactive = $data->inactive;
        $this->lettingbranding = $data->lettingbranding;
        $this->bacsbankaccount = $data->bacsbankaccount;
        $this->bacsoutputtype = $data->bacsoutputtype;
        $this->bacssettings = $data->bacssettings;
        $this->bookingdatesarechangedays = $data->bookingdatesarechangedays;
        $this->allowbookingonwebuntil = new \DateTime($data->allowbookingonwebuntil);
        $this->showpricingonwebuntil = new \DateTime($data->showpricingonwebuntil);

        $this->marketingbrand = MarketingBrand::factory($data->marketingbrand);
        $this->brandinggroup = BrandingGroup::factory($data->brandinggroup);
        $this->bookingbrand = BookingBrand::factory($data->bookingbrand);
        $this->lettingincomevatband = Vatband::factory($data->lettingincomevatband);
        //$this->petextrabranding = extra\Branding::factory($data->petextrabranding);

        return $this;
    }
}