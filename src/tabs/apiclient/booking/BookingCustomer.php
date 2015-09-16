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
 * @method Booking setName(string $name)  Set the name
 * @method $string getName()              Set the guesttype
 * @method Booking setFromdate(\DateTime $fromdate)                         Set the fromdate
 * @method Booking setTodate(\DateTime $todate)                             Set the todate
 * @method Booking setBookeddatetime(\DateTime $bookeddatetime)             Set the bookeddatetime
 * @method Booking setStatus(string $status)                                Set the status
 * @method Booking setCancelled(boolean $cancelled)                         Set the cancelled bool
 * @method Booking setEstimatedarrivaltime(\DateTime $estimatedarrivaltime) Set the estimatedarrivaltime
 * @method Booking setAdults(integer $adults)                               Set the adults
 * @method Booking setChildren(integer $children)                           Set the children
 * @method Booking setInfants(integer $infants)                             Set the infants
 */

class BookingCustomer extends \tabs\apiclient\core\Base
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
}
