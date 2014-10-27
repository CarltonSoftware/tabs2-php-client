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
 * @method integer getId()            Return the id
 * @method RoleReason getRolereason() Return the RoleReason    
 * @method integer getRolereason()    Return the priority    
 *
 * @method ContactPreference setId(integer $contactid)       Set the contact id
 * @method ContactPreference setPriority(integer $contactid) Set the contact priority
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
     * Priority
     * 
     * @var integer
     */
    protected $priority = 0;

    /**
     * Set the role reason object
     *
     * @param array|stdClass|RoleReason $roleReason RoleReason array/object
     *
     * @return RoleReason
     */
    public function setRolereason($roleReason)
    {
        if (!$roleReason instanceof RoleReason) {
            $roleReason = RoleReason::factory($roleReason);
        }
        
        $roleReason->setParent($this);
        $this->rolereason = $roleReason;

        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'role' => $this->getRolereason()->getRole(),
            'reason' => $this->getRolereason()->getReason(),
            'contactentityid' => $this->getParent()->getId(),
            'priority' => $this->getPriority()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getCreateUrl()
    {
        $actor = $this->getParentActor();
        
        return $actor->getUpdateUrl() . '/contactpreference';
    }
    
    /**
     * @inheritDoc
     */
    public function getUpdateUrl()
    {
        return $this->getCreateUrl() . '/' . $this->getId();
    }
}