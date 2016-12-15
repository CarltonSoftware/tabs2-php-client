<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\branding\BookingBrand;

/**
 * Tabs Rest API PropertyBookingBrand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method BookingBrand getBookingbrand() Returns the bookingbrand
 * @method boolean getPrimarybookingbrand() Returns the primarybookingbrand
 * @method PropertyBookingBrand setPrimarybookingbrand(boolean $var) Sets the primarybookingbrand
 */
class PropertyBookingBrand extends Builder
{
    /**
     * Bookingbrand
     *
     * @var BookingBrand
     */
    protected $bookingbrand;

    /**
     * Primarybookingbrand
     *
     * @var boolean
     */
    protected $primarybookingbrand;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the bookingbrand
     *
     * @param stdclass|array|BookingBrand $bookingbrand The Bookingbrand
     *
     * @return PropertyBookingBrand
     */
    public function setBookingbrand($bookingbrand)
    {
        $this->bookingbrand = BookingBrand::factory($bookingbrand);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'bookingbrandid' => $this->getBookingbrand()->getId(),
            'primarybookingbrand' => $this->boolToStr($this->getPrimarybookingbrand())
        );
    }
}