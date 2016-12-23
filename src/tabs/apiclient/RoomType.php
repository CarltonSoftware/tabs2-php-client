<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API RoomType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getName() Returns the name
 * @method RoomType setName(string $var) Sets the name
 * 
 * @method integer getSleeps() Returns the sleeps
 * @method RoomType setSleeps(integer $var) Sets the sleeps
 * 
 * @method string getDescription() Returns the description
 * @method RoomType setDescription(string $var) Sets the description
 */
class RoomType extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Sleeps
     *
     * @var integer
     */
    protected $sleeps;

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
            'name' => $this->getName(),
            'sleeps' => $this->getSleeps(),
            'description' => $this->getDescription(),
        );
    }
}