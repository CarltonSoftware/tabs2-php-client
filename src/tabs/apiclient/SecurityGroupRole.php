<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API SecurityGroupRole object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\SecurityGroup getSecuritygroup() Returns the securitygroup
 * @method \tabs\apiclient\SecurityRole getSecurityrole() Returns the securityrole
 */
class SecurityGroupRole extends Builder
{
    /**
     * Securitygroup
     *
     * @var \tabs\apiclient\SecurityGroup
     */
    protected $securitygroup;

    /**
     * Securityrole
     *
     * @var \tabs\apiclient\SecurityRole
     */
    protected $securityrole;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the securitygroup
     *
     * @param stdclass|array|\tabs\apiclient\SecurityGroup $securitygroup The Securitygroup
     *
     * @return SecurityGroupRole
     */
    public function setSecuritygroup($securitygroup)
    {
        $this->securitygroup = \tabs\apiclient\SecurityGroup::factory($securitygroup);

        return $this;
    }

    /**
     * Set the securityrole
     *
     * @param stdclass|array|\tabs\apiclient\SecurityRole $securityrole The Securityrole
     *
     * @return SecurityGroupRole
     */
    public function setSecurityrole($securityrole)
    {
        $this->securityrole = \tabs\apiclient\SecurityRole::factory($securityrole);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'securitygroupid' => $this->getSecuritygroup()->getId(),
            'securityroleid' => $this->getSecurityrole()->getId(),
        );
    }
}