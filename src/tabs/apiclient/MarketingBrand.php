<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

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
 * @method string getCode() Returns the code
 * @method MarketingBrand setCode(string $var) Sets the code
 * 
 * @method string getName() Returns the name
 * @method MarketingBrand setName(string $var) Sets the name
 * 
 * @method string getEmail() Returns the email
 * @method MarketingBrand setEmail(string $var) Sets the email
 * 
 * @method string getWebsite() Returns the website
 * @method MarketingBrand setWebsite(string $var) Sets the website
 * 
 * @method \tabs\apiclient\Agency getAgency() Returns the agency
 * @method \tabs\apiclient\BookingBrand getDefaultbookingbrand() Returns the defaultbookingbrand
 */
class MarketingBrand extends Builder
{
    /**
     * Code
     *
     * @var string
     */
    protected $code;

    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Email
     *
     * @var string
     */
    protected $email;

    /**
     * Website
     *
     * @var string
     */
    protected $website;

    /**
     * Agency
     *
     * @var \tabs\apiclient\Agency
     */
    protected $agency;

    /**
     * Defaultbookingbrand
     *
     * @var \tabs\apiclient\BookingBrand
     */
    protected $defaultbookingbrand;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the agency
     *
     * @param array|\tabs\apiclient\Agency $agency The Agency
     *
     * @return MarketingBrand
     */
    public function setAgency($agency)
    {
        $this->agency = \tabs\apiclient\Agency::factory($agency);

        return $this;
    }

    /**
     * Set the defaultbookingbrand
     *
     * @param array|\tabs\apiclient\BookingBrand $defaultbookingbrand The Defaultbookingbrand
     *
     * @return MarketingBrand
     */
    public function setDefaultbookingbrand($defaultbookingbrand)
    {
        $this->defaultbookingbrand = \tabs\apiclient\BookingBrand::factory(
            $defaultbookingbrand
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'code' => $this->getCode(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'website' => $this->getWebsite(),
            'agencyid' => $this->getAgency()->getId(),
            'defaultbookingbrandid' => $this->getDefaultbookingbrand()->getId()
        );
    }
}