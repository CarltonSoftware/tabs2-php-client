<?php

namespace tabs\apiclient\branding;
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
 * @method BookingBrand setCode(string $var) Sets the code
 * 
 * @method string getName() Returns the name
 * @method BookingBrand setName(string $var) Sets the name
 * 
 * @method \tabs\apiclient\actor\Agency getAgency() Returns the agency
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
     * @var \tabs\apiclient\actor\Agency
     */
    protected $agency;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the agency
     *
     * @param string|\tabs\apiclient\actor\Agency $agency The Agency
     *
     * @return BookingBrand
     */
    public function setAgency($agency)
    {
        $this->agency = \tabs\apiclient\actor\Agency::factory($agency);

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
}