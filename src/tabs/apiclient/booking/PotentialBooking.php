<?php

/**
 * Tabs Rest API PotentialBooking object.
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
 * Tabs Rest API PotentialBooking object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer   getId()      Return the id
 * @method \DateTime getCreated() Return the created
 * @method string    getType()    Return the type
 * @method \DateTime getExpiry()  Return the expiry
 * 
 * @method PotentialBooking setId(integer $id)             Set the id
 * @method PotentialBooking setCreated(\DateTime $created) Set the created
 * @method PotentialBooking setType(string $type)          Set the type
 * @method PotentialBooking setExpiry(\DateTime $expiry)   Set the expiry
 */
class PotentialBooking extends \tabs\apiclient\core\Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;
    
    /**
     * Created
     *
     * @var \DateTime
     */
    protected $created;
    
    /**
     * Type
     *
     * @var string
     */
    protected $type;
    
    /**
     * Expiry
     *
     * @var \DateTime
     */
    protected $expiry;
    
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
            'created' => $this->getCreated(),
            'type' => $this->getType(),
            'expiry' => $this->getExpiry(),
        );
    }
    
}