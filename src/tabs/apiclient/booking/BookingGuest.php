<?php

/**
 * Tabs Rest API BookingGuest object.
 *
 * PHP Version 5.4
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\booking;

/**
 * Tabs Rest API BookingGuest object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method $string      getName() Returns the name of the guest
 * @method $string      getType() Returns the type of guest
 * @method $string      getType() Returns the customer
 */

class BookingGuest extends \tabs\apiclient\core\Base
{
	/**
     * The name of the guest
     * 
     * @var string
     */
	protected $name;

    /**
     * Type of guest, e.g. Adult or Child or Infant
     * 
     * @var string
     */
	protected $type;

    /**
     * Customer object
     * 
     * @var tabs\apiclient\actor\Customer
     */
    protected $details;
}
