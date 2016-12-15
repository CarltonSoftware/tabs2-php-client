<?php

/**
 * Tabs Rest BookingSecurityDeposit object.
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
 * Tabs Rest BookingSecurityDeposit object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method float     getAmount()     Return the amount
 * @method \DateTime getDateduein()  Return the dateduein
 * @method \DateTime getDatedueout() Return the datedueout
 * 
 * @method BookingSecurityDeposit setAmount(float $amount)             Set the amount
 * @method BookingSecurityDeposit setDateduein(\DateTime $dateduein)   Set the dateduein
 * @method BookingSecurityDeposit setDatedueout(\DateTime $datedueout) Set the datedueout
 */

class BookingSecurityDeposit extends \tabs\apiclient\core\Builder
{
    /**
     * Amount
     * 
     * @var float
     */
    protected $amount;
    
    /**
     * Dateduein
     * 
     * @var \DateTime
     */
    protected $dateduein;
    
    /**
     * Datedueout
     * 
     * @var \DateTime
     */
    protected $datedueout;
    
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
     * Array representation of the BookingSecurityDeposit object.
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'amount' => $this->getAmount(),
            'dateduein' => $this->getDateduein(),
            'datedueout' => $this->getDatedueout(),
        );
    }
}