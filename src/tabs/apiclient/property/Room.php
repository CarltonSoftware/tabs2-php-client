<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\RoomType;

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
 * @method RoomType getRoomtype() Returns the roomtype
 * @method integer getQuantity() Returns the quantity
 * @method Room setQuantity(integer $var) Sets the quantity
 * 
 * @method string getDescription() Returns the description
 * @method Room setDescription(string $var) Sets the description
 */
class Room extends Builder
{
    /**
     * Roomtype
     *
     * @var RoomType
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

    // -------------------- Public Functions -------------------- //

    /**
     * Set the roomtype
     *
     * @param stdclass|array|RoomType $roomtype The Roomtype
     *
     * @return Room
     */
    public function setRoomtype($roomtype)
    {
        $this->roomtype = RoomType::factory($roomtype);

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
        );
    }
}