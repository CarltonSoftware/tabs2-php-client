<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;
use tabs\apiclient\RoomType;

/**
 * Tabs Rest API BookingRoom object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Room setLastupdatedusing(string $var) Sets the lastupdatedusing
 *
 */

class Room extends Builder
{
    /**
     * @var \tabs\apiclient\property\Room
     */
    protected $room;

    /**
     * @var RoomType
     */
    protected $roomtype;

    /**
     * @var int
     */
    protected $roomroomtypeid;

    /**
     * @var DateTime
     */
    protected $lastupdated;

    /**
     * @var string
     */
    protected $lastupdatedusing;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->room = new \tabs\apiclient\property\Room();
        $this->roomtype = new RoomType();
        $this->roomroomtypeid = null;
        $this->lastupdated = new \DateTime();

        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        return $arr;
    }

    /**
     * @return \tabs\apiclient\property\Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @return RoomType
     */
    public function getRoomtype()
    {
        return $this->roomtype;
    }

    /**
     * @return DateTime
     */
    public function getLastupdated()
    {
        return $this->lastupdated;
    }

    /**
     * @return string
     */
    public function getLastupdatedusing()
    {
        return $this->lastupdatedusing;
    }

    /**
     * Set the room room type id
     */
    public function setRoomroomtypeid($id)
    {
        $this->roomroomtypeid = $id;

        return $this;
    }

    /**
     * Generic create/update array
     */
    private function _getArray()
    {
        $array = [];
        if ($this->roomroomtypeid) {
            $array['roomroomtypeid'] = $this->roomroomtypeid;
        }
        if ($this->lastupdatedusing) {
            $array['lastupdatedusing'] = $this->lastupdatedusing;
        }

        return $array;
    }

    /**
     * @inheritDoc
     */
    public function toCreateArray()
    {
        return $this->_getArray();
    }

    /**
     * @inheritDoc
     */
    public function toUpdateArray()
    {
        return $this->_getArray();
    }
}