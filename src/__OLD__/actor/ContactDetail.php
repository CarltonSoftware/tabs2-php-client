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
 * Tabs Rest API ContactDetail object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method boolean             getInvalid()            Return the invalid flag
 * @method string              getType()               Return the contact type
 * @method ContactPreference[] getContactpreferences() Return the contact preference array
 *
 * @method ContactDetail setInvalid(boolean $invalid) Set the invalid flag
 * @method ContactDetail setType(string $type)        Set the contact type
 */
abstract class ContactDetail extends \tabs\apiclient\core\Builder
{
    /**
     * Invalid
     *
     * @var boolean
     */
    protected $invalid;

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
     * @return \tabs\apiclient\actor\ContactDetail
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
     * @return \tabs\apiclient\actor\ContactDetail
     */
    public function addContactpreference(&$contactPreference)
    {
        $contactPreference->setParent($this);
        $this->contactpreferences[] = $contactPreference;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'invalid' => $this->boolToStr($this->getInvalid()),
            'contactmethod' => $this->getContactmethod()
        );
    }
}