<?php

namespace tabs\apiclient\voucher;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Restriction object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Restriction setType(string $var) Sets the type
 * @method Restriction setProperty(\tabs\apiclient\Property $var) Sets the property
 * @method Restriction setBookingbrand(\tabs\apiclient\BookingBrand $var) Sets the bookingbrand
 */
class Restriction extends Builder
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var \tabs\apiclient\Property
     */
    protected $property;

    /**
     * @var \tabs\apiclient\BookingBrand
     */
    protected $bookingbrand;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->property = new \tabs\apiclient\Property();
        $this->bookingbrand = new \tabs\apiclient\BookingBrand();
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        return $arr;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return \tabs\apiclient\Property
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @return \tabs\apiclient\BookingBrand
     */
    public function getBookingbrand()
    {
        return $this->bookingbrand;
    }
}