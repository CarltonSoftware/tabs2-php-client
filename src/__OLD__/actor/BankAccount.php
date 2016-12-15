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

namespace tabs\apiclient\accounts;
use tabs\apiclient\core\Address;

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
 * @method string  getAccountnumber()    Return the account number
 * @method string  getAccountname()      Return the account name
 * @method string  getBankname()         Return the bank name
 * @method string  getSortcode()         Return the account sort code
 * @method string  getPaymentreference() Return the payment reference
 * @method string  getRollnumber()       Return the bank roll number
 * @method Address getAddress()          Return the bank account address
 *
 * @method BankAccount setAccountnumber(string $accountnumber)       Set the account number
 * @method BankAccount setAccountname(string $accountname)           Set the account name
 * @method BankAccount setBankname(string $bankname)                 Set the bank name
 * @method BankAccount setSortcode(string $sortcode)                 Set the account sort code
 * @method BankAccount setPaymentreference(string $paymentreference) Set the payment reference
 * @method BankAccount setRollnumber(string $rollnumber)             Set the bank roll number
 */
class BankAccount extends \tabs\apiclient\Builder
{
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
     * @var \tabs\apiclient\core\Address
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
     * Constructor.
     * 
     * Initialise the address object
     * 
     * @return void
     */
    public function __construct()
    {
        $this->address = new \tabs\apiclient\core\Address();
    }
    
    /**
     * Set the address contact
     * 
     * @param array $address Array of address information
     * 
     * @return BankAccount
     */
    public function setAddress($address)
    {
        $this->address = \tabs\apiclient\core\Address::factory($address);
        
        return $this;
    }
    
    /**
     * Return the string representation of a bank account
     * 
     * @return string
     */
    public function __toString()
    {
        return implode(', ',
            array_filter(
                array(
                    $this->getBankname(),
                    (string) $this->getAddress()
                )
            )
        );
    }
    
    /**
     * Array representation
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'accountnumber' => $this->getAccountnumber(),
            'accountname' => $this->getAccountname(),
            'bankname' => $this->getBankname(),
            'sortcode' => $this->getSortcode(),
            'paymentreference' => $this->getPaymentreference(),
            'rollnumber' => $this->getRollnumber(),
            'address' => $this->getAddress()->toArray()
        );
    }
}