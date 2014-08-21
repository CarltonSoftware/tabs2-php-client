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

namespace tabs\core;

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
 * @method integer            getId()            Return the id
 * @method boolean            getInvalid()       Return the invalid flag
 * @method string             getContactmethod() Return the contact method
 * @method string             getType()          Return the contact type
 * @method string             getSubtype()       Return the contact sub type
 * @method string             getValue()         Return the value
 * @method string             getComment()       Return the contact comment
 *
 * @method \tabs\actor\ContactEntity setInvalid(boolean $invalid)            Set the invalid flag
 * @method \tabs\actor\ContactEntity setContactmethod(string $contactmethod) Set the contact method
 * @method \tabs\actor\ContactEntity setType(string $type)                   Set the contact type
 * @method \tabs\actor\ContactEntity setSubtype(string $subtype)             Set the contact subtype
 * @method \tabs\actor\ContactEntity setValue(string $value)                 Set the contact value
 * @method \tabs\actor\ContactEntity setComment(string $comment)             Set the contact comnent
 */
abstract class ContactEntity extends \tabs\core\Builder implements BuilderInterface
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
     * Address
     *
     * @var \tabs\core\Address
     */
    protected $address;

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
    
    /**
     * @inheritDoc
     */
    public function update()
    {
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function delete()
    {
        return $this;
    }
}
