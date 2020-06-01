<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API VoucherSource object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method VoucherSource setVouchersource(string $var) Sets the vouchersource
 * @method VoucherSource setDescription(string $var) Sets the description
 * @method VoucherSource setRefundable(boolean $var) Sets the refundable
 */
class VoucherSource extends Builder
{
    /**
     * @var string
     */
    protected $vouchersource;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var boolean
     */
    protected $refundable;

    // -------------------- Public Functions -------------------- //

    /**
     * @return string
     */
    public function getVouchersource()
    {
        return $this->vouchersource;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return boolean
     */
    public function getRefundable()
    {
        return $this->refundable;
    }
}