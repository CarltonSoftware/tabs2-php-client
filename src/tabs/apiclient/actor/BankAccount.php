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
 * @method BankAccount setAccountnumber(string $var) Sets the accountnumber
 * 
 * @method BankAccount setAccountname(string $var) Sets the accountname
 * 
 * @method BankAccount setBankname(string $var) Sets the bankname
 * 
 * 
 * @method BankAccount setSortcode(string $var) Sets the sortcode
 * 
 * @method BankAccount setPaymentreference(string $var) Sets the paymentreference
 * 
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

    /**
     * Returns the accountnumber
     *
     * @return string
     */
    public function getAccountnumber()
    {
        return $this->accountnumber;
    }

    /**
     * Returns the accountname
     *
     * @return string
     */
    public function getAccountname()
    {
        return $this->accountname;
    }

    /**
     * Returns the bankname
     *
     * @return string
     */
    public function getBankname()
    {
        return $this->bankname;
    }

    /**
     * Returns the address
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the sortcode
     *
     * @return string
     */
    public function getSortcode()
    {
        return $this->sortcode;
    }

    /**
     * Returns the paymentreference
     *
     * @return string
     */
    public function getPaymentreference()
    {
        return $this->paymentreference;
    }

    /**
     * Returns the rollnumber
     *
     * @return string
     */
    public function getRollnumber()
    {
        return $this->rollnumber;
    }
}