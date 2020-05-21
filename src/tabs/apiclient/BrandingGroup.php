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
 * @method BrandingGroup setCode(string $var) Sets the code
 * @method BrandingGroup setName(string $var) Sets the name
 * @method BookingBrand setAgency(Agency $var) Set the agency
 */
class BrandingGroup extends Builder
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \tabs\apiclient\Agency
     */
    protected $agency;

    // -------------------- Public Functions -------------------- //

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