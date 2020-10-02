<?php

namespace tabs\apiclient\property\room;

use tabs\apiclient\Builder;
use tabs\apiclient\Room;
use tabs\apiclient\RoomType;

/**
 * Tabs Rest API Image object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class PropertyRoomType extends Builder
{
    /**
     * Room
     *
     * @var Room
     */
    protected $room;

    /**
     * Roomtype
     *
     * @var RoomType
     */
    protected $roomtype;

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->roomtype = new RoomType();

        parent::__construct($id);
    }

    /**
     * Returns the room
     *
     * @return Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Returns the roomtype
     *
     * @return RoomType
     */
    public function getRoomtype()
    {
        return $this->roomtype;
    }
}