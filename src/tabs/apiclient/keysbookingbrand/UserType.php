<?php

namespace tabs\apiclient\keysbookingbrand;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API UserType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\KeyUserType getKeyusertype() Returns the keyusertype
 * @method integer getCheckoutperioddays() Returns the checkoutperioddays
 * @method UserType setCheckoutperioddays(integer $var) Sets the checkoutperioddays
 * 
 * @method integer getCheckoutperiodhours() Returns the checkoutperiodhours
 * @method UserType setCheckoutperiodhours(integer $var) Sets the checkoutperiodhours
 * 
 * @method string getKeyusersql() Returns the keyusersql
 * @method UserType setKeyusersql(string $var) Sets the keyusersql
 * 
 */
class UserType extends Builder
{
    /**
     * Keyusertype
     *
     * @var \tabs\apiclient\KeyUserType
     */
    protected $keyusertype;

    /**
     * Checkoutperioddays
     *
     * @var integer
     */
    protected $checkoutperioddays;

    /**
     * Checkoutperiodhours
     *
     * @var integer
     */
    protected $checkoutperiodhours;

    /**
     * Keyusersql
     *
     * @var string
     */
    protected $keyusersql;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the keyusertype
     *
     * @param stdclass|array|\tabs\apiclient\KeyUserType $keyusertype The Keyusertype
     *
     * @return UserType
     */
    public function setKeyusertype($keyusertype)
    {
        $this->keyusertype = \tabs\apiclient\KeyUserType::factory($keyusertype);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'keyusertypeid' => $this->getKeyusertype()->getId(),
            'checkoutperioddays' => $this->getCheckoutperioddays(),
            'checkoutperiodhours' => $this->getCheckoutperiodhours(),
            'keyusersql' => $this->getKeyusersql(),
        );
    }
}