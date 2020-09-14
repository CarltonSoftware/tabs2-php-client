<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\property\parkingpermit\HolidayPeriod;

/**
 * Tabs Rest API ParkingPermit object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ParkingPermit setPropertyid(int $var) Sets the propertyid
 * @method ParkingPermit setLocation(string $var) Sets the location
 * @method ParkingPermit setOwneroragencyrequirement(string $var) Sets the owneroragencyrequirement
 * @method ParkingPermit setMaximumvehicles(integer $var) Sets the maximumvehicles
 * @method ParkingPermit setComments(string $var) Sets the comments
 * @method ParkingPermit setLocationofpermit(string $var) Sets the locationofpermit
 *
 * @method Collection|HolidayPeriod[] getHolidayperiods() Returns the parking permits holiday periods as a collection
 */
class ParkingPermit extends Builder
{
    /**
     * Location
     *
     * @var string
     */
    protected $location;

    /**
     * Owner or agency requirement
     *
     * @var string
     */
    protected $owneroragencyrequirement;

    /**
     * Maximum vehicles
     *
     * @var integer
     */
    protected $maximumvehicles;

    /**
     * Comments
     *
     * @var string
     */
    protected $comments;

    /**
     * Location of permit
     *
     * @var string
     */
    protected $locationofpermit;

    /**
     * Holiday periods
     *
     * @var Collection|HolidayPeriod[]
     */
    protected $holidayperiods;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
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
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getOwneroragencyrequirement()
    {
        return $this->owneroragencyrequirement;
    }

    /**
     * @return integer
     */
    public function getMaximumvehicles()
    {
        return $this->maximumvehicles;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @return string
     */
    public function getLocationofpermit()
    {
        return $this->locationofpermit;
    }
}
