<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;
use tabs\apiclient\Encoding;

/**
 * Tabs Rest API ContactMethodType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ContactMethodType setMethod(string $var) Sets the method
 * 
 * @method ContactMethodType setCharacterlimit(integer $var) Sets the characterlimit
 * 
 * @method ContactMethodType setMaximumaddresslength(integer $var) Sets the maximumaddresslength
 * 
 * @method ContactMethodType setAddressvalidationtype(string $var) Sets the addressvalidationtype
 * 
 * @method ContactMethodType setAddressvalidation(string $var) Sets the addressvalidation
 * 
 */
class ContactMethodType extends Base
{
    /**
     * Method
     *
     * @var string
     */
    protected $method;

    /**
     * Encoding
     *
     * @var Encoding
     */
    protected $encoding;

    /**
     * Characterlimit
     *
     * @var integer
     */
    protected $characterlimit;

    /**
     * Maximumaddresslength
     *
     * @var integer
     */
    protected $maximumaddresslength;

    /**
     * Addressvalidationtype
     *
     * @var string
     */
    protected $addressvalidationtype;

    /**
     * Addressvalidation
     *
     * @var string
     */
    protected $addressvalidation;
    
    /**
     * Elements
     * 
     * @var Collection|contactmethodtype\Element[]
     */
    protected $elements;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->elements = Collection::factory(
            'element',
            new contactmethodtype\Element(),
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the encoding
     *
     * @param stdclass|array|Encoding $encoding The Encoding
     *
     * @return ContactMethodType
     */
    public function setEncoding($encoding)
    {
        $this->encoding = Encoding::factory($encoding);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'method' => $this->getMethod(),
            'encodingid' => $this->getEncoding()->getId(),
            'characterlimit' => $this->getCharacterlimit(),
            'maximumaddresslength' => $this->getMaximumaddresslength(),
            'addressvalidationtype' => $this->getAddressvalidationtype(),
            'addressvalidation' => $this->getAddressvalidation()
        );
    }

    /**
     * Returns the method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Returns the encoding
     *
     * @return Encoding
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Returns the characterlimit
     *
     * @return integer
     */
    public function getCharacterlimit()
    {
        return $this->characterlimit;
    }

    /**
     * Returns the maximumaddresslength
     *
     * @return integer
     */
    public function getMaximumaddresslength()
    {
        return $this->maximumaddresslength;
    }

    /**
     * Returns the addressvalidationtype
     *
     * @return string
     */
    public function getAddressvalidationtype()
    {
        return $this->addressvalidationtype;
    }

    /**
     * Returns the addressvalidation
     *
     * @return string
     */
    public function getAddressvalidation()
    {
        return $this->addressvalidation;
    }

    /**
     * Returns the elements
     *
     * @return Collection|contactmethodtype\Element[]
     */
    public function getElements()
    {
        return $this->elements;
    }
}