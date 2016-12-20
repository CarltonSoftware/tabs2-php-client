<?php

namespace tabs\apiclient\actor;
use tabs\apiclient\Builder;
use tabs\apiclient\Address;

/**
 * Tabs Rest API BankAccount object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getAccountnumber() Returns the accountnumber
 * @method BankAccount setAccountnumber(string $var) Sets the accountnumber
 * 
 * @method string getAccountname() Returns the accountname
 * @method BankAccount setAccountname(string $var) Sets the accountname
 * 
 * @method string getBankname() Returns the bankname
 * @method BankAccount setBankname(string $var) Sets the bankname
 * 
 * @method Address getAddress() Returns the address
 * 
 * @method string getSortcode() Returns the sortcode
 * @method BankAccount setSortcode(string $var) Sets the sortcode
 * 
 * @method string getPaymentreference() Returns the paymentreference
 * @method BankAccount setPaymentreference(string $var) Sets the paymentreference
 * 
 * @method string getRollnumber() Returns the rollnumber
 * @method BankAccount setRollnumber(string $var) Sets the rollnumber
 */
class BankAccount extends Builder
{
    /**
     * Accountnumber
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
     * @var Address
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

    // -------------------- Public Functions -------------------- //

    /**
     * Set the address
     *
     * @param stdclass|array|\tabs\apiclient\Address $address The Address
     *
     * @return BankAccount
     */
    public function setAddress($address)
    {
        $this->address = \tabs\apiclient\Address::factory($address);

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
                    $this->getAccountnumber(),
                    $this->getAccountname(),
                    $this->getBankname(),
                    (string) $this->getAddress()
                )
            )
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'accountnumber' => $this->getAccountnumber(),
            'accountname' => $this->getAccountname(),
            'bankname' => $this->getBankname(),
            'address' => $this->getAddress(),
            'sortcode' => $this->getSortcode(),
            'paymentreference' => $this->getPaymentreference(),
            'rollnumber' => $this->getRollnumber(),
        );
    }
}