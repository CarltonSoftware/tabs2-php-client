<?php

/**
 * Tabs Rest API ContactEntity object.
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

namespace tabs\actor;

/**
 * Tabs Rest API ContactEntity object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer getId()            Return the id
 * @method boolean getInvalid()       Return the invalid flag
 * @method string  getContactmethod() Return the contact method
 * @method string  getType()          Return the contact type
 * @method string  getSubtype()       Return the contact sub type
 * @method string  getValue()         Return the value
 * @method string  getComment()       Return the contact comment
 * @method string  getAddr1()         Return the address line 1
 * @method string  getAddr2()         Return the address line 2
 * @method string  getAddr3()         Return the address line 3
 * @method string  getTown()          Return the address town
 * @method string  getCounty()        Return the address county
 * @method string  getPostcode()      Return the address postcode
 * @method decimal getLatitude()      Return the latitude
 * @method decimal getLongitude()     Return the longitude
 * @method integer getCountry()       Return the address country
 *
 * @method \tabs\actor\ContactEntity setInvalid(boolean $invalid)            Set the invalid flag
 * @method \tabs\actor\ContactEntity setContactmethod(string $contactmethod) Set the contact method
 * @method \tabs\actor\ContactEntity setType(string $type)                   Set the contact type
 * @method \tabs\actor\ContactEntity setSubtype(string $subtype)             Set the contact subtype
 * @method \tabs\actor\ContactEntity setValue(string $value)                 Set the contact value
 * @method \tabs\actor\ContactEntity setComment(string $comment)             Set the contact comnent
 * @method \tabs\actor\ContactEntity setAddr1(string $addr1)                 Set the Address line 1
 * @method \tabs\actor\ContactEntity setAddr2(string $addr2)                 Set the Address line 2
 * @method \tabs\actor\ContactEntity setAddr3(string $addr3)                 Set the Address line 3
 * @method \tabs\actor\ContactEntity setTown(string $town)                   Set the Address town
 * @method \tabs\actor\ContactEntity setCounty(string $county)               Set the Address county
 * @method \tabs\actor\ContactEntity setPostcode(string $postcode)           Set the Address postcode
 * @method \tabs\actor\ContactEntity setLatitude(decimal $latitude)          Set a lat value
 * @method \tabs\actor\ContactEntity setLongitude(decimal $longitude)        Set the long value
 * @method \tabs\actor\ContactEntity setCountry(integer $country)            Set a country
 */
class ContactEntity extends \tabs\core\Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

    /**
     * Invalid
     *
     * @var boolean
     */
    protected $invalid;

    /**
     * Contactmethod
     *
     * @var string
     */
    protected $contactmethod;

    /**
     * Type
     *
     * @var string
     */
    protected $type;

    /**
     * SubType
     *
     * @var string
     */
    protected $subtype;

    /**
     * Value
     *
     * @var string
     */
    protected $value;

    /**
     * Comment
     *
     * @var string
     */
    protected $comment;

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
     * Addr3
     *
     * @var string
     */
    protected $addr3;
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
     * Latitude
     *
     * @var decimal
     */
    protected $latitude;

    /**
     * Longitude
     *
     * @var decimal
     */
    protected $longitude;

    /**
     * Country
     *
     * @var integer
     */
    protected $country;

    /**
     * Contactpreferences
     *
     * Array of ContactPreference
     *
     * @var array
     */
    protected $contactpreferences = array();

    // ------------------ Public Functions --------------------- //
    
    /**
     * Set the contact preferences
     * 
     * @param array $contactPreferences Array of contact preference objects
     * 
     * @return \tabs\actor\ContactEntity
     */
    public function setContactPreferences($contactPreferences)
    {
        foreach ($contactPreferences as $contactPreference) {
            $this->contactpreferences[] = ContactPreference::factory(
                $contactPreference
            );
        }
        
        return $this;
    }
}
