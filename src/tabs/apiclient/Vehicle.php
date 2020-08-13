<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 *  Tabs Rest Vehicle object.
 * 
 * @category Tabs_Client
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
     *  @var string
     */
    protected $make;

    /**
    *  @var string
    */
    protected $model;

    /**
    * @var string 
    */
    protected $registration;

    /**
    * @var string 
    */
    protected $colour;

    /**
    * @var string 
    */
    protected $comments;

    // -------------------- Public Functions -------------------- //

    /**
    * @inheritDoc
    */

    public function __construct($id = null)
    {
        $this->make = "";
        $this->model = "";
        $this->registration = "";
        $this->colour = "";
        $this->comments = "";

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return string
     */
    public function getRegistration()
    {
        return $this->registration;
    }

    /**
     * @return string
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
    * @inheritDoc
    */
    public function toArray()
    {
        $arr = $this->__toArray();

        return $arr;
    }

}