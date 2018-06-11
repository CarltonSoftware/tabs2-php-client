<?php

namespace tabs\apiclient\actor;

/**
 * Tabs Rest API PhoneNumber object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getContactmethodtype() Returns the contactmethodtype
 * @method ContactDetailOther setContactmethodtype(string $var) Sets the contactmethodtype
 *
 * @method string getCountrycode() Returns the countrycode
 * @method PhoneNumber setCountrycode(string $var) Sets the countrycode
 * 
 * @method string getSubscribernumber() Returns the subscribernumber
 * @method PhoneNumber setSubscribernumber(string $var) Sets the subscribernumber
 * 
 * @method string getExtension() Returns the extension
 * @method PhoneNumber setExtension(string $var) Sets the extension
 */
class PhoneNumber extends ContactDetail
{
    /**
     * Contactmethodtype
     *
     * @var string
     */
    protected $contactmethodtype;
    
    /**
     * Countrycode
     *
     * @var string
     */
    protected $countrycode;

    /**
     * Subscribernumber
     *
     * @var string
     */
    protected $subscribernumber;

    /**
     * Extension
     *
     * @var string
     */
    protected $extension;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            array(
                'countrycode' => $this->getCountrycode(),
                'subscribernumber' => $this->getSubscribernumber(),
                'extension' => $this->getExtension(),
                'contactmethodtype' => $this->getContactmethodtype()
            ),
            parent::toArray()
        );
    }
    
    public function __toString()
    {
        return implode(
            '',
            array(
                '+',
                $this->getCountrycode(),
                $this->getSubscribernumber()
            )
        );
    }
}