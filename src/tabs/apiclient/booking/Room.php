<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;
use tabs\apiclient\RoomType;

/**
 * Tabs Rest API Vehicle object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
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

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->room = new \tabs\apiclient\property\Room();
        $this->roomtype = new RoomType();

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
}