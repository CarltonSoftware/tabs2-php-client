<?php

namespace tabs\apiclient\actor;

use tabs\apiclient\Builder;
use tabs\apiclient\StaticCollection;
use tabs\apiclient\actor\ContactPreference;

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
 *
 * @method ContactDetail setInvalid(boolean $invalid)            Set the invalid flag
 * @method ContactDetail setInvaliddatetime(\DateTime $date)     Set the invalid date time
 * @method ContactDetail setInvalidreason(string $str)           Set the invalid reason
 * @method ContactDetail setComment(string $str)                 Set the comment
 * @method ContactDetail setType(string $type)                   Set the contact type
 * @method ContactDetail setContactmethodsubtype(string $type)   Set the contact subtype
 */
class ContactDetail extends Builder
{
    /**
     * Invalid
     *
     * @var boolean
     */
    protected $invalid;
    
    /**
     * Invalid date time
     *
     * @var \DateTime
     */
    protected $invaliddatetime;
    
    /**
     * Invalid reason
     *
     * @var string
     */
    protected $invalidreason;
    
    /**
     * Comment
     *
     * @var string
     */
    protected $comment;

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
    protected $contactmethodsubtype;

    /**
     * Contactpreferences
     *
     * @var StaticCollection|ContactPreference[]
     */
    protected $contactpreferences;

    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->contactpreferences = StaticCollection::factory(
            'contactpreference',
            new ContactPreference(),
            $this
        );
        $this->invaliddatetime = new \DateTime();
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * Return the invalid flag
     *
     * @return boolean
     */
    public function getInvalid()
    {
        return $this->invalid;
    }

    /**
     * Return the contact type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Return the contact subtype
     *
     * @return string
     */
    public function getContactmethodsubtype()
    {
        return $this->contactmethodsubtype;
    }

    /**
     * Return the invalid reason
     *
     * @return string
     */
    public function getInvalidreason()
    {
        return $this->invalidreason;
    }

    /**
     * Return the comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Return the contact invalid date time
     *
     * @return \DateTime
     */
    public function getInvaliddatetime()
    {
        return $this->invaliddatetime;
    }

    /**
     * Return the contact preference array
     *
     * @return StaticCollection|ContactPreference[]
     */
    public function getContactpreferences()
    {
        return $this->contactpreferences;
    }
}