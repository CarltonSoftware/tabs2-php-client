<?php

/**
 * Tabs Rest API TransferredBooking object.
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
 * Tabs Rest API TransferredBooking object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer   getId()        Return the id
 * @method \DateTime getDatetime()  Return the datetime
 * @method string    getTobooking() Return the tobooking
 * 
 * @method TransferredBooking setId(integer $id)               Set the id
 * @method TransferredBooking setDatetime(\DateTime $datetime) Set the datetime
 * @method TransferredBooking setTobooking(string $tobooking)  Set the tobooking
 */
class TransferredBooking extends \tabs\apiclient\core\Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;
    
    /**
     * Datetime
     *
     * @var \DateTime
     */
    protected $datetime;
    
    /**
     * Contract
     *
     * @var string
     */
    protected $tobooking;
        
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
     * Returns the tobooking object
     *
     * @return Booking
     */
    public function getTobookingObj()
    {
        if ($this->getTobooking() === null) {
            throw new \tabs\apiclient\client\Exception(
                'A valid Tobooking URI is required (currently null).'
            );
        }
        
        list($prefix, $stub, $id) = explode('/', $this->getTobooking());
        
        return Booking::get($id);
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
            'tobooking' => $this->getTobooking(),
        );
    }
    
}