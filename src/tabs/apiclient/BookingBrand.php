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
 * @method BookingBrand setCode(string $var) Sets the code
 * 
 * @method BookingBrand setName(string $var) Sets the name
 * 
 */
class BookingBrand extends Builder
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
     * Agency
     *
     * @var \tabs\apiclient\Agency
     */
    protected $agency;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the agency
     *
     * @param string|\tabs\apiclient\Agency $agency The Agency
     *
     * @return BookingBrand
     */
    public function setAgency($agency)
    {
        $this->agency = \tabs\apiclient\Agency::factory($agency);

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
            'agencyid' => $this->getAgency()->getId()
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
     * Returns the agency
     *
     * @return \tabs\apiclient\Agency
     */
    public function getAgency()
    {
        return $this->agency;
    }
}