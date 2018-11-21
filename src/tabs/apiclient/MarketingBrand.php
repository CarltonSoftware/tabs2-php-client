<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\marketingbrand\EmailList;

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
 * @method MarketingBrand setCode(string $var) Sets the code
 * 
 * @method MarketingBrand setName(string $var) Sets the name
 * 
 * @method MarketingBrand setEmail(string $var) Sets the email
 * 
 * @method MarketingBrand setWebsite(string $var) Sets the website
 * 
 * 
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
    
    /**
     * Email lists
     * 
     * @var Collection|EmailList[]
     */
    protected $emaillists;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->emaillists = Collection::factory(
            'emaillist',
            new EmailList(),
            $this
        );
        
        parent::__construct($id);
    }

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

    /**
     * Returns the code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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
     * Returns the email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Returns the agency
     *
     * @return \tabs\apiclient\Agency
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * Returns the defaultbookingbrand
     *
     * @return \tabs\apiclient\BookingBrand
     */
    public function getDefaultbookingbrand()
    {
        return $this->defaultbookingbrand;
    }

    /**
     * Returns the emaillists
     *
     * @return Collection|EmailList[]
     */
    public function getEmaillists()
    {
        return $this->emaillists;
    }
}