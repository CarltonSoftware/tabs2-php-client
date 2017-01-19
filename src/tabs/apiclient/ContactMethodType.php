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
 * @method string getMethod() Returns the method
 * @method ContactMethodType setMethod(string $var) Sets the method
 * 
 * @method Encoding getEncoding() Returns the encoding
 * @method integer getCharacterlimit() Returns the characterlimit
 * @method ContactMethodType setCharacterlimit(integer $var) Sets the characterlimit
 * 
 * @method integer getMaximumaddresslength() Returns the maximumaddresslength
 * @method ContactMethodType setMaximumaddresslength(integer $var) Sets the maximumaddresslength
 * 
 * @method string getAddressvalidationtype() Returns the addressvalidationtype
 * @method ContactMethodType setAddressvalidationtype(string $var) Sets the addressvalidationtype
 * 
 * @method string getAddressvalidation() Returns the addressvalidation
 * @method ContactMethodType setAddressvalidation(string $var) Sets the addressvalidation
 * 
 * @method Collection|contactmethodtype\Element[] getElements() Returns the elements
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
}