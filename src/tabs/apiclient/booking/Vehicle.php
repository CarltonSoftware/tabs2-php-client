<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;

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

class Vehicle extends Builder 
{
    /**
     * @var \tabs\apiclient\Vehicle
     */
    protected $vehicle;

    /**
     * @var \tabs\apiclient\Vehicle
     */
    protected $vehicleid;

        // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->vehicle = new \tabs\apiclient\Vehicle();
        $this->vehicleid = $id;
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
     * @return \tabs\apiclient\Vehicle
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * @return Array
     */
    public function getData()
    {
        $data = [];
        
        $data['bookingvehicleid'] = $this->getId();
        $data['vehicle'] = [];

        if($this->vehicle->getMake()) {
            $data['vehicle']['make'] = $this->vehicle->getMake();
        }

        if($this->vehicle->getModel()) {
            $data['vehicle']['model'] = $this->vehicle->getModel();
        }

        if($this->vehicle->getRegistration()) {
            $data['vehicle']['registration'] = $this->vehicle->getRegistration();
        }

        if($this->vehicle->getId()) {
            $data['vehicle']['vehicleid'] = $this->vehicle->getId();
        }

        return $data;

    }

    
}