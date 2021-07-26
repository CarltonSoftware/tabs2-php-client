<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Property Link object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Target setType(string $var) Sets the type
 */
class LinkedProperty extends Builder
{
    /**
     * @var \tabs\apiclient\Property
     */
    protected $parentproperty;

    /**
     * @var \tabs\apiclient\Property
     */
    protected $childproperty;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var boolean
     */
    protected $appliesondate;

    /**
     * @var \tabs\apiclient\Collection|\tabs\apiclient\property\link\HolidayPeriod[]
     */
    protected $holidayperiods;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->holidayperiods = \tabs\apiclient\Collection::factory(
            'holidayperiod',
            new link\HolidayPeriod(),
            $this
        );

        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'parentpropertyid' => $this->getParentpropertylink()->getId(),
            'childpropertyid' => $this->getChildpropertylink()->getId(),
            'type' => $this->getType()
        );
    }

    /**
     * @param \tabs\apiclient\Property $property Property
     *
     * @return $this
     */
    public function setParentproperty($property)
    {
        $this->parentproperty = \tabs\apiclient\Property::factory($property);

        return $this;
    }

    /**
     * @param \tabs\apiclient\Property $property Property
     *
     * @return $this
     */
    public function setChildproperty($property)
    {
        $this->childproperty = \tabs\apiclient\Property::factory($property);

        return $this;
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
    public function getAppliesondate()
    {
        return $this->appliesondate;
    }

    /**
     * @return \tabs\apiclient\Property
     */
    public function getParentpropertylink()
    {
        return $this->parentproperty;
    }

    /**
     * @return \tabs\apiclient\Property
     */
    public function getChildpropertylink()
    {
        return $this->childproperty;
    }

    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'link';
    }
}