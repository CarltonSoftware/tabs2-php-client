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
 * @method boolean                              getInvalid()              Return the invalid flag
 * @method string                               getType()                 Return the contact type
 * @method string                               getContactmethodsubtype() Return the contact subtype
 * @method string                               getInvalidreason()        Return the invalid reason
 * @method string                               getComment()              Return the comment
 * @method \DateTime                            getInvaliddatetime()      Return the contact invalid date time
 * @method StaticCollection|ContactPreference[] getContactpreferences()   Return the contact preference array
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
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'invalid' => $this->boolToStr($this->getInvalid()),
            'comment' => $this->getComment(),
            'contactmethodsubtype' => $this->getContactmethodsubtype(),
            'invalidreason' => $this->getInvalidreason()
        );
        if ($this->invaliddatetime) {
            $arr['invaliddatetime'] = $this->invaliddatetime->format(
                'Y-m-d H:i:s'
            );
        }
        
        return $arr;
    }
}