<?php

/**
 * Tabs Rest Price object.
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
 * Tabs Rest Price object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \DateTime getDatetime()              Return the datetime
 * @method string    getMethod()                Return the method
 * @method float     getBasic()                 Return the basic
 * @method float     getIncludedextras()        Return the includedextras
 * @method float     getAdditionalextras()      Return the additionalextras
 * @method float     getTotal()                 Return the total
 * @method float     getSecurityDeposit()       Return the securitydeposit
 * @method float     getTotalincludingdeposit() Return the totalincludingdeposit
 * 
 * @method Price setDatetime(\DateTime $datetime)                       Set the datetime
 * @method Price setMethod(string $method)                              Set the method
 * @method Price setBasic(float $basic)                                 Set the basic
 * @method Price setIncludedextras(float $includedextras)               Set the includedextras
 * @method Price setAdditionalextras(float $additionalextras)           Set the additionalextras
 * @method Price setTotal(float $total)                                 Set the total
 * @method Price setSecuritydeposit(float $securitydeposit)             Set the securitydeposit
 * @method Price setTotalincludingdeposit(float $totalincludingdeposit) Set the totalincludingdeposit
 */

class Price extends \tabs\apiclient\core\Base
{
    /**
     * Datetime
     * 
     * @var \DateTime
     */
    protected $datetime;
    
    /**
     * Method
     * 
     * @var string
     */
    protected $method;
    
    /**
     * Basic
     * 
     * @var float
     */
    protected $basic;
    
    /**
     * Includedextras
     * 
     * @var float
     */
    protected $includedextras;
    
    /**
     * Additionalextras
     * 
     * @var float
     */
    protected $additionalextras;
    
     /**
     * Total
     * 
     * @var float
     */
    protected $total;
    
    /**
     * Securitydeposit
     * 
     * @var float
     */
    protected $securitydeposit;
    
    /**
     * Totalincludingdeposit
     * 
     * @var float
     */
    protected $totalincludingdeposit;
    
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {

    }
   
    
    /**
     * Array representation of the Price object.
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'datetime' => $this->getDatetime(),
            'method' => $this->getMethod(),
            'basic' => $this->getBasic(),
            'includedextras' => $this->getIncludedextras(),
            'additionalextras' => $this->getAdditionalextras(),
            'total' => $this->getTotal(),
            'securitydeposit' => $this->getSecuritydeposit(),
            'totalincludingdeposit' => $this->getTotalincludingdeposit(),
        );
    }
}