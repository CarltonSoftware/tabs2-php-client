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

namespace tabs\apiclient\actor;

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
 * @method integer            getId()               Return the ID
 * @method string             getAccountnumber()    Return the account number
 * @method string             getAccountname()      Return the account name
 * @method string             getBankname()         Return the bank name
 * @method string             getSortcode()         Return the account sort code
 * @method string             getPaymentreference() Return the payment reference
 * @method string             getRollnumber()       Return the bank roll number    
 * @method \tabs\apiclient\core\Address getAddress()          Return the bank roll number    
 *
 * @method \tabs\apiclient\actor\BankAccount setId(integer $id)                            Set the account number
 * @method \tabs\apiclient\actor\BankAccount setAccountnumber(string $accountnumber)       Set the account number
 * @method \tabs\apiclient\actor\BankAccount setAccountname(string $accountname)           Set the account name
 * @method \tabs\apiclient\actor\BankAccount setBankname(string $bankname)                 Set the bank name
 * @method \tabs\apiclient\actor\BankAccount setSortcode(string $sortcode)                 Set the account sort code
 * @method \tabs\apiclient\actor\BankAccount setPaymentreference(string $paymentreference) Set the payment reference
 * @method \tabs\apiclient\actor\BankAccount setRollnumber(string $rollnumber)             Set the bank roll number  
 */
class BankAccount extends \tabs\apiclient\core\Builder
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
     * Set the address contact
     * 
     * @param array $address Array of address information
     * 
     * @return \tabs\apiclient\actor\BankAccount
     */
    public function setAddress($address)
    {
        if($address == "") {
            // existing BankAccount has no Address
            $this->address = new \tabs\apiclient\core\Address;
        } else {
            if (is_array($address) || get_class($address) == 'stdClass') {
                $this->address = \tabs\apiclient\core\Address::factory($address);
            } else {
                $this->address = $address;
            }
        }
        
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
        $arr = array(
            'id' => $this->getId(),
            'accountnumber' => $this->getAccountnumber(),
            'accountname' => $this->getAccountname(),
            'bankname' => $this->getBankname(),
            'sortcode' => $this->getSortcode(),
            'paymentreference' => $this->getPaymentreference(),
            'rollnumber' => $this->getRollnumber()
        );
        
        // don't return the address element unless an address exists
        if((null !== $this->getAddress())) {
            $arr['address'] = $this->getAddress()->toArray();
        }
        
        return $arr;
    }
}
