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
 * @method string getSerialnumber() Returns the serialnumber
 * @method Keyy setSerialnumber(string $var) Sets the serialnumber
 * 
 * @method string getManufacturerortype() Returns the manufacturerortype
 * @method Keyy setManufacturerortype(string $var) Sets the manufacturerortype
 * 
 * @method string getDescription() Returns the description
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
}