<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API DepositAmountType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string            getDepositamounttype()            Returns the deposit amount type
 * @method DepositAmountType setDepositamounttype(string $var) Sets the deposit amount type
 */
class DepositAmountType extends Builder
{
    /**
     * Depositamounttype
     *
     * @var string
     */
    protected $depositamounttype;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'depositamounttype' => $this->getDepositamounttype()
        );
    }
}