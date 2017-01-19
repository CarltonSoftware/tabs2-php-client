<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\StaticCollection;

/**
 * Tabs Rest API SecurityGroup object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getName() Returns the name
 * @method SecurityGroup setName(string $var) Sets the name
 * 
 * @method string getDescription() Returns the description
 * @method SecurityGroup setDescription(string $var) Sets the description
 * 
 * @method Collection|\tabs\apiclient\SecurityRole[] getSecurityroles() Returns the securityroles
 */
class SecurityGroup extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Securityroles
     *
     * @var StaticCollection|\tabs\apiclient\SecurityRole[]
     */
    protected $securityroles;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->securityroles = StaticCollection::factory(
            'securityroles',
            new \tabs\apiclient\SecurityRole()
        );
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
        );
    }
}