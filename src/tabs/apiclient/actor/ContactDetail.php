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

namespace tabs\apiclient\actor;

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
 * @method string getContactmethodsubtype() Return the contact sub type
 * @method string getValue()   Return the value
 * @method string getComment() Return the contact comment
 * 
 * @method \tabs\apiclient\actor\ContactDetail setContactmethodsubtype(string $contactmethodsubtype) Set the contact subtype
 * @method \tabs\apiclient\actor\ContactDetail setValue(string $value)     Set the contact value
 * @method \tabs\apiclient\actor\ContactDetail setComment(string $comment) Set the contact comnent
 */
class ContactDetail extends ContactEntity
{
    /**
     * ContactMethodSubType
     *
     * @var string
     */
    protected $contactmethodsubtype;

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
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            '%s %s: %s',
            $this->getContactmethod(),
            $this->getSubtype(),
            $this->getValue()
        );
    }
    
    /**
     * Contact detail array representation
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'contactmethod' => $this->getContactmethod(),
            'subtype' => $this->getContactmethodsubtype(),
            'value' => $this->getValue(),
            'comment' => $this->getComment(),
        );
    }
}
