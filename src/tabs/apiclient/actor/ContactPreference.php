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
 * @method integer getId()                                  Return the id
 * @method \tabs\apiclient\actor\RoleReason getRolereason() Return the RoleReason    
 *
 * @method \tabs\apiclient\actor\ContactPreference setId(integer $contactid) Set the contact id
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
     * RoleReason
     * 
     * @var \tabs\apiclient\actor\RoleReason
     */
    protected $rolereason;
    
    
    /**
     * Set the language object
     *
     * @param array $array RoleReason array
     *
     * @return \tabs\apiclient\actor\RoleReason
     */
    public function setRoleReason($array)
    {
        if (is_string($array)) {
            $array = array('id' => $array);
        }

        $roleReason = \tabs\apiclient\actor\RoleReason::factory($array);
        $roleReason->setParent($this);
        
        $this->rolereason = $roleReason;

        return $this;
    }
    
    
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'rolereason' => $this->getRolereason()->toArray()
        );
    }
    
}
