<?php

/**
 * Tabs Rest API ContactEntity object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
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
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer getId()
 * @method boolean getInvalid()
 * @method string  getContactmethod()
 * @method string  getType()
 * @method string  getSubtype()
 * @method string  getValue()
 * @method string  getComment()
 * @method string  getAddr1()
 * @method string  getAddr2()
 * @method string  getAddr3()
 * @method string  getTown()
 * @method string  getCounty()
 * @method string  getPostcode()
 * @method decimal getLatitude()
 * @method decimal getLongitude()
 * @method integer getCountry()
 *
 * @method void    setInvalid(boolean $invalid)
 * @method void    setContactmethod(string $contactmethod)
 * @method void    setType(string $type)
 * @method void    setSubtype(string $subtype)
 * @method void    setValue(string $value)
 * @method void    setComment(string $comment)
 * @method void    setAddr1(string $addr1)
 * @method void    setAddr2(string $addr2)
 * @method void    setAddr3(string $addr3)
 * @method void    setTown(string $town)
 * @method void    setCounty(string $county)
 * @method void    setPostcode(string $postcode)
 * @method void    setLatitude(decimal $latitude)
 * @method void    setLongitude(decimal $longitude)
 * @method void    setCountry(integer $country)
 *
 */

class ContactEntity extends \tabs\core\Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id = 0;

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
     * Array of Contactpreference
     *
     * @var array()
     */
    protected $contactpreferences = array();

    
    public function addContactPreferencesFromNode($node) {
        $contactPreference = new ContactPreference();
        self::flattenNode($contactPreference, $node);
        $this->contactpreferences[] = $contactPreference;
    }
    
    
    
    /**
     * Update a contact
     *
     * @return boolean
     *
     * @throws \tabs\api\client\ApiException
     */
    public function update()
    {
        if ($this->id == 0) {
            throw new Exception(
                'Update called on new entity - use create instead'
            );
        }
        if ($this->type()=='C') {
            $putArray = array(
                'subtype' => $this->getSubtype(),
                'value'   => $this->getValue(),
                'comment' => $this->getComment()
            );
        } else {
            $putArray = array(
                'addr1'  => $this->getAddr1(),
                'addr2'  => $this->getAddr2(),
                'addr3'  => $this->getAddr3(),
                'town'   => $this->getTown(),
                'county' => $this->getCounty(),
                'postcode' => $this->getPostcode(),
                'latitude' => $this->getLatitude(),
                'longitude' => $this->getLongitude(),
                'country' => $this->getCountry()
            );
        }

        $conf = \tabs\client\ApiClient::getApi()->put(
            '/legalentity/' . $this->legalentityid .
            '/contact/' . $this->getId(),
            $putArray
        );

        // Test api response
        if ($conf && $conf->status == 204) {
            return true;
        } else {
            throw new \tabs\client\Exception(
                $conf,
                'Invalid contact preference update'
            );
        }
    }
}