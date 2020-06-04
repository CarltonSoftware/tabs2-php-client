<?php

namespace tabs\apiclient\setting\entity;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Value object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Value setEntity(string $var) Sets the entity
 * @method Value setEntityid(integer $var) Sets the entityid
 * @method Value setValue(string $var) Sets the value
 */
class Value extends Builder
{
    /**
     * @var string
     */
    protected $entity;

    /**
     * @var integer
     */
    protected $entityid;

    /**
     * @var string
     */
    protected $value;

    // -------------------- Public Functions -------------------- //

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return integer
     */
    public function getEntityid()
    {
        return $this->entityid;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}