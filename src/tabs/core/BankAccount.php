<?php

/**
 * Tabs Rest API BankAccount object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\core;

/**
 * Tabs Rest API BankAccount object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 *
 * @method integer getId()
 * @method string  getAccountnumber()
 * @method string  getAccountname()
 * @method string  getBankname()
 * @method string  getAddr1()
 * @method string  getAddr2()
 * @method string  getTown()
 * @method string  getCounty()
 * @method string  getPostcode()
 * @method string  getSortcode()
 * @method string  getPaymentreference()
 * @method string  getRollnumber()
 *
 * @method void    setAccountnumber(string $accountnumber)
 * @method void    setAccountname(string $accountname)
 * @method void    setBankname(string $bankname)
 * @method void    setAddr1(string $addr1)
 * @method void    setAddr2(string $addr2)
 * @method void    setTown(string $town)
 * @method void    setCounty(string $county)
 * @method void    setPostcode(string $postcode)
 * @method void    setSortcode(string $sortcode)
 * @method void    setPaymentreference(string $paymentreference)
 * @method void    setRollnumber(string $rollnumber)
 */

class BankAccount extends Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

    /**
     * Legalentityid
     *
     * @var integer
     */
    protected $legalentityid;

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
     * Addr1
     *
     * @var string
     */
    protected $addr1;

    /**
     * Addr2
     *
     * @var string
     */
    protected $addr2;

    /**
     * Town
     *
     * @var string
     */
    protected $town;

    /**
     * County
     *
     * @var string
     */
    protected $county;

    /**
     * Postcode
     *
     * @var string
     */
    protected $postcode;

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

    /**
     * Constructor
     *
     * @param integer $legalentityid Id of the legalentity
     *
     * @return void
     */
    function __construct(integer $legalentityid) {
        $this->legalentityid = $legalentityid;
    }


}