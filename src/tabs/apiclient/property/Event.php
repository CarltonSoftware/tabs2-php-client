<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PropertyEvent object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Event setName(string $var) Sets the name
 * @method Event setDescription(string $var) Sets the description
 * @method Event setStartdatetime(\DateTime $var) Sets the startdatetime
 * @method Event setEnddatetime(\DateTime $var) Sets the enddatetime
 * @method Event setDonotcommunicatetocustomer(boolean $var) Sets the donotcommunicatetocustomer
 * @method Event setMovable(boolean $var) Sets the movable
 * @method Event setPropertyeventcategory(\tabs\apiclient\PropertyEventCategory $var) Sets the propertyeventcategory
 */
class Event extends Builder
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
     * Start datetime
     *
     * @var \DateTime
     */
    protected $startdatetime;

    /**
     * End datetime
     *
     * @var \DateTime
     */
    protected $enddatetime;

    /**
     * Do not communicate to customer
     *
     * @var boolean
     */
    protected $donotcommunicatetocustomer;

    /**
     * Movable
     *
     * @var boolean
     */
    protected $movable;

    /**
     * Property Event Category
     *
     * @var \tabs\apiclient\PropertyEventCategory
     */
    protected $propertyeventcategory;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->startdatetime = new \DateTime();
        $this->enddatetime = new \DateTime();
        $this->propertyeventcategory = new \tabs\apiclient\PropertyEventCategory();

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
     * @return \DateTime
     */
    public function getStartdatetime()
    {
        return $this->startdatetime;
    }

    /**
     * @return \DateTime
     */
    public function getEnddatetime()
    {
        return $this->enddatetime;
    }

    /**
     * @return boolean
     */
    public function getDonotcommunicatetocustomer()
    {
        return $this->donotcommunicatetocustomer;
    }

    /**
     * @return boolean
     */
    public function getMovable()
    {
        return $this->movable;
    }

    /**
     * @return \tabs\apiclient\PropertyEventCategory
     */
    public function getPropertyeventcategory()
    {
        return $this->propertyeventcategory;
    }
}
