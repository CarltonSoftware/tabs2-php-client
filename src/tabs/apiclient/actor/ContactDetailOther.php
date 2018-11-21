<?php

namespace tabs\apiclient\actor;

/**
 * Tabs Rest API ContactDetailOther object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ContactDetailOther setContactmethodtype(string $var) Sets the contactmethodtype
 * 
 * @method ContactDetailOther setValue(string $var) Sets the value
 */
class ContactDetailOther extends ContactDetail
{
    /**
     * Contactmethodtype
     *
     * @var string
     */
    protected $contactmethodtype;

    /**
     * Value
     *
     * @var string
     */
    protected $value;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            array(
                'contactmethodtype' => $this->getContactmethodtype(),
                'value' => $this->getValue()
            ),
            parent::toArray()
        );
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getValue();
    }

    /**
     * Returns the contactmethodtype
     *
     * @return string
     */
    public function getContactmethodtype()
    {
        return $this->contactmethodtype;
    }

    /**
     * Returns the value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}