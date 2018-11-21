<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API KeyCheckReason object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method KeyCheckReason setKeycheckreason(string $var) Sets the keycheckreason
 * 
 * @method KeyCheckReason setDescription(string $var) Sets the description
 * 
 * @method KeyCheckReason setCheckoutperioddays(string $var) Sets the checkoutperioddays
 * 
 * @method KeyCheckReason setCheckoutperiodhours(string $var) Sets the checkoutperiodhours
 * 
 */
class KeyCheckReason extends Builder
{
    /**
     * Keyusertype
     *
     * @var \tabs\apiclient\KeyUserType
     */
    protected $keyusertype;

    /**
     * Keycheckreason
     *
     * @var string
     */
    protected $keycheckreason;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Checkoutperioddays
     *
     * @var string
     */
    protected $checkoutperioddays;

    /**
     * Checkoutperiodhours
     *
     * @var string
     */
    protected $checkoutperiodhours;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the keyusertype
     *
     * @param stdclass|array|\tabs\apiclient\KeyUserType $keyusertype The Keyusertype
     *
     * @return KeyCheckReason
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
            'keycheckreason' => $this->getKeycheckreason(),
            'description' => $this->getDescription(),
            'checkoutperioddays' => $this->getCheckoutperioddays(),
            'checkoutperiodhours' => $this->getCheckoutperiodhours(),
        );
    }

    /**
     * Returns the keyusertype
     *
     * @return \tabs\apiclient\KeyUserType
     */
    public function getKeyusertype()
    {
        return $this->keyusertype;
    }

    /**
     * Returns the keycheckreason
     *
     * @return string
     */
    public function getKeycheckreason()
    {
        return $this->keycheckreason;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the checkoutperioddays
     *
     * @return string
     */
    public function getCheckoutperioddays()
    {
        return $this->checkoutperioddays;
    }

    /**
     * Returns the checkoutperiodhours
     *
     * @return string
     */
    public function getCheckoutperiodhours()
    {
        return $this->checkoutperiodhours;
    }
}