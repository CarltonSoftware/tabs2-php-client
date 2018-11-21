<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API KeysBookingBrand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class KeysBookingBrand extends Builder
{
    /**
     * Bookingbrand
     *
     * @var \tabs\apiclient\BookingBrand
     */
    protected $bookingbrand;

    /**
     * Defaultkeycheckreason
     *
     * @var \tabs\apiclient\KeyCheckReason
     */
    protected $defaultkeycheckreason;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the bookingbrand
     *
     * @param stdclass|array|\tabs\apiclient\BookingBrand $bookingbrand The Bookingbrand
     *
     * @return KeysBookingBrand
     */
    public function setBookingbrand($bookingbrand)
    {
        $this->bookingbrand = \tabs\apiclient\BookingBrand::factory($bookingbrand);

        return $this;
    }

    /**
     * Set the defaultkeycheckreason
     *
     * @param stdclass|array|\tabs\apiclient\KeyCheckReason $defaultkeycheckreason The Defaultkeycheckreason
     *
     * @return KeysBookingBrand
     */
    public function setDefaultkeycheckreason($defaultkeycheckreason)
    {
        $this->defaultkeycheckreason = \tabs\apiclient\KeyCheckReason::factory($defaultkeycheckreason);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'bookingbrandid' => $this->getBookingbrand()->getId(),
            'defaultkeycheckreasonid' => $this->getDefaultkeycheckreason()->getId(),
        );
    }

    /**
     * Returns the bookingbrand
     *
     * @return \tabs\apiclient\BookingBrand
     */
    public function getBookingbrand()
    {
        return $this->bookingbrand;
    }

    /**
     * Returns the defaultkeycheckreason
     *
     * @return \tabs\apiclient\KeyCheckReason
     */
    public function getDefaultkeycheckreason()
    {
        return $this->defaultkeycheckreason;
    }
}