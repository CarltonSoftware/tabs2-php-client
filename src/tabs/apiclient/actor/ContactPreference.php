<?php

/**
 * Tabs Rest API ContactPreference object.
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
 * Tabs Rest API Actor object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer getId()     Return the id
 * @method string  getRole()   Return the contact role
 * @method string  getReason() Return the contact reason
 *
 * @method \tabs\apiclient\actor\ContactPreference setId(integer $contactid) Set the contact id
 * @method \tabs\apiclient\actor\ContactPreference setRole(string $role)     Set the contact role
 * @method \tabs\apiclient\actor\ContactPreference setReason(string $reason) Set the contact reason
 *
 */
class ContactPreference extends \tabs\apiclient\core\Builder
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

    /**
     * Role
     *
     * @var string
     */
    protected $role = '';

    /**
     * Reason
     *
     * @var string
     */
    protected $reason = '';
    
    // --------------------------- Public Methods --------------------------- //
    
    /**
     * Array representation of the contact preference
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'role' => $this->getRole(),
            'reason' => $this->getReason()
        );
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getRole() . ': ' . $this->getReason();
    }
}
