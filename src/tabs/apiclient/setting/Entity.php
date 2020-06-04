<?php

namespace tabs\apiclient\setting;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Entity object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Entity setEntity(string $var) Sets the entity
 * @method Entity setMandatory(boolean $var) Sets the mandatory
 * @method Entity setDefaultvalue(string $var) Sets the defaultvalue
 * @method Entity setValues(Collection|entity\Value[] $var) Sets the values
 *
 * @method Collection|entity\Value[] getValues() Gets the values
 */
class Entity extends Builder
{
    /**
     * @var string
     */
    protected $entity;

    /**
     * @var boolean
     */
    protected $mandatory;

    /**
     * @var string
     */
    protected $defaultvalue;

    /**
     * @var Collection|entity\Value[]
     */
    protected $values;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->values = \tabs\apiclient\Collection::factory(
            'value',
            new entity\Value,
            $this
        );

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return boolean
     */
    public function getMandatory()
    {
        return $this->mandatory;
    }

    /**
     * @return string
     */
    public function getDefaultvalue()
    {
        return $this->defaultvalue;
    }
}