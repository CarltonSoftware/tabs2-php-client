<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API Property Room object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Room setQuantity(integer $var) Sets the quantity
 * @method Room setDescription(string $var) Sets the description
 * @method Room setName(string $var) Sets the name
 */
class Room extends Builder
{
    /**
     * Roomtype
     *
     * @var \tabs\apiclient\RoomType
     */
    protected $roomtype;

    /**
     * Quantity
     *
     * @var integer
     */
    protected $quantity;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Roomtypes
     *
     * @var Collection|\tabs\apiclient\property\room\RoomType[]
     */
    protected $roomtypes;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->roomtypes = Collection::factory(
            '',
            new \tabs\apiclient\property\room\RoomType,
            $this
        );

        parent::__construct($id);
    }

    /**
     * Set the roomtype
     *
     * @param stdclass|array|RoomType $roomtype The Roomtype
     *
     * @return Room
     */
    public function setRoomtype($roomtype)
    {
        $this->roomtype = \tabs\apiclient\RoomType::factory($roomtype);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'roomtypeid' => $this->getRoomtype()->getId(),
            'quantity' => $this->getQuantity(),
            'description' => $this->getDescription(),
            'name' => $this->getName(),
        );
    }

    /**
     * Returns the roomtype
     *
     * @return \tabs\apiclient\RoomType
     */
    public function getRoomtype()
    {
        return $this->roomtype;
    }

    /**
     * Returns the quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the room types
     *
     * @return Collection|\tabs\apiclient\property\room\RoomType[]
     */
    public function getRoomtypes()
    {
        return $this->roomtypes;
    }
}