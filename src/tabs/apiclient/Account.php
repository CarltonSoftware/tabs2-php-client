<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string  getGroup()            Returns the group
 * @method Account setGroup(string $var) Sets the group
 * 
 * @method string  getNominalcode()            Returns the nominalcode
 * @method Account setNominalcode(string $var) Sets the nominalcode
 * 
 * @method string  getDescription()            Returns the description
 * @method Account setDescription(string $var) Sets the description
 * 
 * @method boolean  getUsebranding()            Returns the usebranding
 * @method Account setUsebranding(boolean $var) Sets the usebranding
 */
class Account extends Builder
{
    /**
     * Group
     *
     * @var string
     */
    protected $group;

    /**
     * Nominalcode
     *
     * @var string
     */
    protected $nominalcode;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Usebranding
     *
     * @var boolean
     */
    protected $usebranding;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'group' => $this->getGroup(),
            'nominalcode' => $this->getNominalcode(),
            'description' => $this->getDescription(),
            'usebranding' => $this->getUsebranding(),
        );
    }
}