<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Voucher object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Voucher setVoucher(\tabs\apiclient\Voucher $var) Sets the voucher
 * @method Voucher setBookingamount(float $var) Sets the bookingamount
 * @method Voucher setSecuritydepositamount(float $var) Sets the securitydepositamount
 * @method Voucher setDonotconfirmbooking(boolean $var) Sets the donotconfirmbooking flag
 */
class Voucher extends Builder
{
    /**
     * @var \tabs\apiclient\Voucher
     */
    protected $voucher;

    /**
     * @var float
     */
    protected $bookingamount;

    /**
     * @var float
     */
    protected $securitydepositamount;

    /**
     * @var boolean
     */
    protected $donotconfirmbooking;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->voucher = new \tabs\apiclient\Voucher();
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        return $arr;
    }

    /**
     * @return \tabs\apiclient\Voucher
     */
    public function getVoucher()
    {
        return $this->voucher;
    }

    /**
     * @return float
     */
    public function getBookingamount()
    {
        return $this->bookingamount;
    }

    /**
     * @return float
     */
    public function getSecuritydepositamount()
    {
        return $this->securitydepositamount;
    }
}