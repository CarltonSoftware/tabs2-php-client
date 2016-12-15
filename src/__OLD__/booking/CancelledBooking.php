<?php

/**
 * Tabs Rest API CancelledBooking object.
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
 * Tabs Rest API CancelledBooking object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getDatetime()  Return the datetime
 * 
 * @method CancelledBooking setDatetime(\DateTime $datetime) Set the datetime
 */
class CancelledBooking extends \tabs\apiclient\core\Base
{
    /**
     * Datetime
     *
     * @var \DateTime
     */
    protected $datetime;
        
    // -------------------------- Public Functions -------------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'datetime' => $this->getDatetime(),
        );
    }
    
}