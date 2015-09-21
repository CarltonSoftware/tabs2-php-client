<?php

/**
 * Tabs Rest API BookingCustomer object.
 *
 * PHP Version 5.4
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\booking;

/**
 * Tabs Rest API BookingCustomer object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method BookingCustomer setName(string $name)  Sets the name
 * @method $string         getName()              Returns the name
 *
 * @method BookingCustmer          setDetails(tabs\apiclient\actor\Customer) Sets the customer
 * @method tabs\apiclient\customer getDetails()                              Returns the customer
 */

class BookingCustomer extends \tabs\apiclient\core\Builder
{
    /**
     * The name of the customer
     * 
     * @var string
     */
    protected $name;

    /**
     * Customer object
     * 
     * @var tabs\apiclient\actor\Customer
     */
    protected $details;

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'customerid' => $details->getId()
        );
    }
}
