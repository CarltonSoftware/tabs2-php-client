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
 * @method ContactDetailOther setContactmethodtype(string $var) Sets the contactmethodtype
 *
 * @method PhoneNumber setCountrycode(string $var) Sets the countrycode
 * 
 * @method PhoneNumber setSubscribernumber(string $var) Sets the subscribernumber
 * 
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
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $number = implode(
            '',
            array(
                '+',
                $this->getCountrycode(),
                $this->getSubscribernumber()
            )
        );
        if ($this->getCountrycode() === '44') {
            return implode(
                ' ',
                [
                    substr(str_replace('+44', '0', $number), 0, 5),
                    substr(str_replace('+44', '0', $number), 5)
                ]
            );
        }
        
        return $number;
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
     * Returns the countrycode
     *
     * @return string
     */
    public function getCountrycode()
    {
        return $this->countrycode;
    }

    /**
     * Returns the subscribernumber
     *
     * @return string
     */
    public function getSubscribernumber()
    {
        return $this->subscribernumber;
    }

    /**
     * Returns the extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }
}