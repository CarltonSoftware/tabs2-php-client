<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Role;

/**
 * Tabs Rest API KeyUserType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getKeyusertype() Returns the keyusertype
 * @method KeyUserType setKeyusertype(string $var) Sets the keyusertype
 * 
 * @method Role getRole() Returns the role
 * @method string getDescription() Returns the description
 * @method KeyUserType setDescription(string $var) Sets the description
 */
class KeyUserType extends Builder
{
    /**
     * Keyusertype
     *
     * @var string
     */
    protected $keyusertype;

    /**
     * Role
     *
     * @var Role
     */
    protected $role;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the role
     *
     * @param stdclass|array|Role $role The Role
     *
     * @return KeyUserType
     */
    public function setRole($role)
    {
        $this->role = Role::factory($role);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'keyusertype' => $this->getKeyusertype(),
            'roleid' => $this->getRole()->getId(),
            'description' => $this->getDescription(),
        );
    }
}