<?php

namespace tabs\apiclient\keytag;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Keyy object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Keyy setSerialnumber(string $var) Sets the serialnumber
 * 
 * @method Keyy setManufacturerortype(string $var) Sets the manufacturerortype
 * 
 * @method Keyy setDescription(string $var) Sets the description
 */
class Keyy extends Builder
{
    /**
     * Serialnumber
     *
     * @var string
     */
    protected $serialnumber;

    /**
     * Manufacturerortype
     *
     * @var string
     */
    protected $manufacturerortype;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'serialnumber' => $this->getSerialnumber(),
            'manufacturerortype' => $this->getManufacturerortype(),
            'description' => $this->getDescription(),
        );
    }

    /**
     * Returns the serialnumber
     *
     * @return string
     */
    public function getSerialnumber()
    {
        return $this->serialnumber;
    }

    /**
     * Returns the manufacturerortype
     *
     * @return string
     */
    public function getManufacturerortype()
    {
        return $this->manufacturerortype;
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
}