<?php

namespace tabs\apiclient\property\room;

use tabs\apiclient\Builder;

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
class RoomType extends Builder
{
    /**
     * Roomtype
     *
     * @var \tabs\apiclient\RoomType
     */
    protected $roomtype;

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->roomtype = new \tabs\apiclient\RoomType();

        parent::__construct($id);
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
}