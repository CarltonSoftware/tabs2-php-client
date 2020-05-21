<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ActorSecurity object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ActorSecurity setActor(\tabs\apiclient\Actor $var) Sets the actor
 * @method ActorSecurity setSecurityrole(\tabs\apiclient\SecurityRole $var) Sets the role
 * @method ActorSecurity setSecuritygroup(\tabs\apiclient\SecurityGroup $var) Sets the group
 */
class ActorSecurity extends Builder
{
    /**
     * @var \tabs\apiclient\TabsUser
     */
    protected $actor;

    /**
     * @var \tabs\apiclient\SecurityRole
     */
    protected $securityrole;

    /**
     * @var \tabs\apiclient\SecurityGroup
     */
    protected $securitygroup;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->actor = new TabsUser();
        $this->securityrole = new SecurityRole();
        $this->securitygroup = new SecurityGroup();
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        $arr['type'] = isset($arr['securityroleid']) ? 'Role' : 'Group';

        return $arr;
    }

    /**
     * Returns the actor
     *
     * @return \tabs\apiclient\TabsUser
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Returns the securityrole
     *
     * @return \tabs\apiclient\SecurityRole
     */
    public function getSecurityrole()
    {
        return $this->securityrole;
    }

    /**
     * Returns the securitygroup
     *
     * @return \tabs\apiclient\SecurityGroup
     */
    public function getSecuritygroup()
    {
        return $this->securitygroup;
    }
}