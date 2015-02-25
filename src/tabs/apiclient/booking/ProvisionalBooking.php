<?php

/**
 * Tabs Rest API ProvisionalBooking object.
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
 * Tabs Rest API ProvisionalBooking object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer   getId()             Return the id
 * @method float     getDepositamount()  Return the depositamount
 * @method \DateTime getDepositduedate() Return the depositduedate
 * 
 * @method ProvisionalBooking setId(integer $id)                           Set the id
 * @method ProvisionalBooking setDepositamount(float $depositamount)       Set the depositamount
 * @method ProvisionalBooking setDepositduedate(\DateTime $depositduedate) Set the depositduedate
 */
class ProvisionalBooking extends \tabs\apiclient\core\Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;
    
    /**
     * Depositamount
     *
     * @var float
     */
    protected $depositamount;
    
    /**
     * Depositduedate
     *
     * @var \DateTime
     */
    protected $depositduedate;
        
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
            'depositamount' => $this->getDepositamount(),
            'depositduedate' => $this->getDepositduedate(),
        );
    }
    
}