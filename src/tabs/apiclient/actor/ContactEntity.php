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
 * @method integer                         getId()                 Return the id
 * @method boolean                         getInvalid()            Return the invalid flag
 * @method string                          getContactmethod()      Return the contact method
 * @method string                          getType()               Return the contact type
 * @method \tabs\apiclient\actor\ContactPreference[] getContactpreferences() Return the contact preference array
 *
 * @method \tabs\apiclient\actor\ContactEntity setId(integer $id)                      Set the id
 * @method \tabs\apiclient\actor\ContactEntity setInvalid(boolean $invalid)            Set the invalid flag
 * @method \tabs\apiclient\actor\ContactEntity setContactmethod(string $contactmethod) Set the contact method
 * @method \tabs\apiclient\actor\ContactEntity setType(string $type)                   Set the contact type
 */
abstract class ContactEntity extends \tabs\apiclient\core\Builder
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
     * @return \tabs\apiclient\actor\ContactEntity
     */
    public function setContactpreferences($contactPreferences)
    {
        foreach ($contactPreferences as $preference) {
            $contactPreference = ContactPreference::factory($preference);
            $this->addContactPreference($contactPreference);
        }
        
        return $this;
    }
    
    /**
     * Add a contact preference
     * 
     * @param \tabs\apiclient\actor\ContactPreference $contactPreference Contact Preference
     * 
     * @return \tabs\apiclient\actor\ContactEntity
     */
    public function addContactpreference(&$contactPreference)
    {
        $contactPreference->setParent($this);
        $this->contactpreferences[] = $contactPreference;
        
        return $this;
    }
}