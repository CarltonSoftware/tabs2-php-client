<?php

/**
 * Tabs Rest API Actor object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\actor;
use tabs\apiclient\core\Language;

/**
 * Tabs Rest API Actor object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string   getFirstname()     Return the firstname
 * @method string   getSurname()       Return the surname
 * @method string   getTitle()         Return the title
 * @method string   getSalutation()    Return the saulation
 * @method string   getTabscode()      Return the tabs code
 * @method Language getLanguage()      Return the language
 * @method boolean  getInactive()      Return the inactive state
 * @method string   getPassword()      Return the password
 * @method string   getCompanyname()   Return the company name
 * @method string   getVatnumber()     Return the vat number
 * @method string   getCompanynumber() Return the company number
 *
 * @method Actor setFirstname(string $firstname) Set the firstname
 * @method Actor setSurname(string $surname) Set the surname
 * @method Actor setTitle(string $title) Set the title
 * @method Actor setSalutation(string $salutation) Set the salutation
 * @method Actor setTabscode(string $tabscode) Set the tabscode
 * @method Actor setInactive(boolean $inactive) Set the inactive state
 * @method Actor setPassword(string $password) Set the password
 * @method Actor setCompanyname(string $companyname) Set the company name
 * @method Actor setVatnumber(string $vatnumber) Set the vat number
 * @method Actor setCompanynumber(string $companynumber) Set the company number
 */
abstract class Actor extends \tabs\apiclient\core\Builder
{
    /**
     * Firstname
     *
     * @var string
     */
    protected $firstname = '';

    /**
     * Surname
     *
     * @var string
     */
    protected $surname = '';

    /**
     * Title
     *
     * @var string
     */
    protected $title = '';

    /**
     * Salutatino
     *
     * @var string
     */
    protected $salutation = '';

    /**
     * Tabscode
     *
     * @var string
     */
    protected $tabscode = '';

    /**
     * Language
     *
     * @var Language
     */
    protected $language;

    /**
     * Inactive
     *
     * @var boolean
     */
    protected $inactive = false;

    /**
     * Password
     *
     * @var string
     */
    protected $password = '';

    /**
     * Companyname
     *
     * @var string
     */
    protected $companyname = '';

    /**
     * VatNumber
     *
     * @var string
     */
    protected $vatnumber = '';

    /**
     * CompanyNumber
     *
     * @var string
     */
    protected $companynumber = '';

    // -------------------------- Public Functions -------------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->setLanguage(array('name' => 'English'));
    }


    /**
     * Set the language object
     *
     * @param array|stdClass|Language $langauge Language array
     *
     * @return Actor
     */
    public function setLanguage($langauge)
    {
        $this->language = Language::factory($langauge);

        return $this;
    }

    /**
     * Return if a customer is active or not
     *
     * @return boolean
     */
    public function isActive()
    {
        return !$this->inactive;
    }

    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {
        return implode(
            ' ',
            array_filter(
                array(
                    $this->getTitle(),
                    $this->getFirstname(),
                    $this->getSurname()
                )
            )
        );
    }

    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'title' => $this->getTitle(),
            'firstname' => $this->getFirstname(),
            'surname' => $this->getSurname(),
            'salutation' => $this->getSalutation(),
            'password' => $this->getPassword(),
            'tabscode' => $this->getTabscode(),
            'languagecode' => $this->getLanguage()->getCode(),
            'companyname' => $this->getCompanyname(),
            'vatnumber' => $this->getVatnumber(),
            'companynumber' => $this->getCompanynumber(),
            'inactive' => $this->getInactive()
        );
    }
}