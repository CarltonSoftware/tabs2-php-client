<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Setting object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Setting setName(string $var) Sets the name
 * @method Setting setDescription(string $var) Sets the description
 * @method Setting setType(string $var) Sets the type
 * @method Setting setRestrictvalue(boolean $var) Sets the restrictvalue
 * @method Setting setAllowrestrictvaluechange(boolean $var) Sets the allowrestrictvaluechange
 * @method Setting setAllowvalueoptionschange(boolean $var) Sets the allowvalueoptionschange
 * @method Setting setDefaultvalue(string $var) Sets the defaultvalue
 * @method Setting setMinimumvalue(integer $var) Sets the minimumvalue
 * @method Setting setMaximumvalue(integer $var) Sets the maximumvalue
 * @method Setting setDecimalplaces(integer $var) Sets the decimalplaces
 * @method Setting setEntitysettings(Collection|setting\Entity[] $var) Sets the entitysettings
 *
 * @method Collection|setting\Entity[] getEntitysettings() Gets the entitysettings
 */
class Setting extends Builder
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var boolean
     */
    protected $restrictvalue;

    /**
     * @var boolean
     */
    protected $allowrestrictvaluechange;

    /**
     * @var boolean
     */
    protected $allowvalueoptionschange;

    /**
     * @var string
     */
    protected $defaultvalue;

    /**
     * @var integer
     */
    protected $minimumvalue;

    /**
     * @var integer
     */
    protected $maximumvalue;

    /**
     * @var integer
     */
    protected $decimalplaces;

    /**
     * @var Collection|setting\Entity[]
     */
    protected $entitysettings;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->entitysettings = Collection::factory(
            'entity',
            new setting\Entity,
            $this
        );

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return boolean
     */
    public function getRestrictvalue()
    {
        return $this->restrictvalue;
    }

    /**
     * @return boolean
     */
    public function getAllowrestrictvaluechange()
    {
        return $this->allowrestrictvaluechange;
    }

    /**
     * @return boolean
     */
    public function getAllowvalueoptionschange()
    {
        return $this->allowvalueoptionschange;
    }

    /**
     * @return string
     */
    public function getDefaultvalue()
    {
        return $this->defaultvalue;
    }

    /**
     * @return integer
     */
    public function getMinimumvalue()
    {
        return $this->minimumvalue;
    }

    /**
     * @return integer
     */
    public function getMaximumvalue()
    {
        return $this->maximumvalue;
    }

    /**
     * @return integer
     */
    public function getDecimalplaces()
    {
        return $this->decimalplaces;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->getDefaultvalue();
    }

    /**
     * Get the setting value with a provided entity and entity id
     *
     * Eg: Setting->getSettingValue('BookingBrand', 3)
     *
     * @param integer $entity   Entity name
     * @param integer $entityid Entity id
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    public function getSettingEntityValue($entity = null, $entityid = null)
    {
        $e = $this->getSettingEntity($entity, $entityid);

        if ($this->getType() === 'Number') {
            return (float) $e->getValue();
        } else if ($this->getType() === 'JSON') {
            return json_decode($e->getValue());
        } else if ($this->getType() === 'XML') {
            return simplexml_load_string($e->getValue());
        }

        return $e->getValue();
    }

    /**
     * Get the setting value with a provided entity and entity id
     *
     * Eg: Setting->getSettingValue('BookingBrand', 3)
     *
     * @param integer $entity   Entity name
     * @param integer $entityid Entity id
     *
     * @return Setting|setting\Entity|setting\entity\Value
     *
     * @throws \RuntimeException
     */
    public function getSettingEntity($entity = null, $entityid = null)
    {
        if (!is_string($entity)) {
            throw new \RuntimeException(
                __FUNCTION__ . ': Provided entity must be a string'
            );
        }

        if (!is_int($entityid)) {
            throw new \RuntimeException(
                __FUNCTION__ . ': Provided entityid must be an integer'
            );
        }

        if ($entity) {
            $entityValue = $this->getEntitysettings()->filter(
                function($es) use ($entity) {
                    return strtolower($es->getEntity()) === strtolower($entity);
                }
            )->first();

            if ($entityValue instanceof setting\Entity) {
                if ($entityid) {
                    $entityIdValue = $entityValue->getValues()->filter(
                        function($v) use ($entityid) {
                            return $v->getEntityid() === $entityid;
                        }
                    )->first();

                    if ($entityIdValue instanceof setting\entity\Value) {
                        return $entityIdValue;
                    }
                }

                return $entityValue;
            }
        }

        return $this;
    }
}