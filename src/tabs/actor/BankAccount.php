<?php

/**
 * Tabs Rest API BankAccount object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\actor;

/**
 * Tabs Rest API BankAccount object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 *
 * @method integer getId()               Return the ID
 * @method string  getAccountnumber()    Return the account number
 * @method string  getAccountname()      Return the account name
 * @method string  getBankname()         Return the bank name
 * @method string  getSortcode()         Return the account sort code
 * @method string  getPaymentreference() Return the payment reference
 * @method string  getRollnumber()       Return the bank roll number    
 *
 * @method \tabs\actor\BankAccount setId(integer $id)                            Set the account number
 * @method \tabs\actor\BankAccount setAccountnumber(string $accountnumber)       Set the account number
 * @method \tabs\actor\BankAccount setAccountname(string $accountname)           Set the account name
 * @method \tabs\actor\BankAccount setBankname(string $bankname)                 Set the bank name
 * @method \tabs\actor\BankAccount setSortcode(string $sortcode)                 Set the account sort code
 * @method \tabs\actor\BankAccount setPaymentreference(string $paymentreference) Set the payment reference
 * @method \tabs\actor\BankAccount setRollnumber(string $rollnumber)             Set the bank roll number  
 */
class BankAccount extends \tabs\core\Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

    /**
     * Invalid
     *
     * @var string
     */
    protected $accountnumber;

    /**
     * Accountname
     *
     * @var string
     */
    protected $accountname;

    /**
     * Bankname
     *
     * @var string
     */
    protected $bankname;

    /**
     * Address
     *
     * @var \tabs\core\Address
     */
    protected $address;

    /**
     * Sortcode
     *
     * @var string
     */
    protected $sortcode;

    /**
     * Paymentreference
     *
     * @var string
     */
    protected $paymentreference;

    /**
     * Rollnumber
     *
     * @var string
     */
    protected $rollnumber;

    // ------------------ Public Functions --------------------- //
    
    /**
     * Set the address contact
     * 
     * @param array $address Array of address information
     * 
     * @return \tabs\actor\ContactEntity
     */
    public function setAddress($address)
    {
        $this->address = \tabs\core\Address::factory($address);
        
        return $this;
    }
}
