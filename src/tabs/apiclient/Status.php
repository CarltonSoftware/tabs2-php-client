<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Status object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Status setName(string $name) Set the name
 * 
 * @method Status  setAllowbooking(boolean $bool) Set the allow booking
 * 
 * @method Status  setAllowoverride(boolean $bool) Set the allow override
 * 
 * @method Status  setPriority(integer $int) Set the priority
 */
class Status extends Builder
{
    /**
     * Name
     * 
     * @var string
     */
    protected $name;
    
    /**
     * Allow booking bool
     * 
     * @var boolean
     */
    protected $allowbooking = false;
    
    /**
     * Allow override bool
     * 
     * @var boolean
     */
    protected $allowoverride = false;
    
    /**
     * Priority
     * 
     * @var boolean
     */
    protected $priority = 0;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'allowbooking' => $this->boolToStr($this->getAllowbooking()),
            'allowoverride' => $this->boolToStr($this->getAllowoverride()),
            'priority' => $this->getPriority()
        );
    }

    /**
     * Return the status name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Return the allow booking
     *
     * @return boolean
     */
    public function getAllowbooking()
    {
        return $this->allowbooking;
    }

    /**
     * Return the allow override
     *
     * @return boolean
     */
    public function getAllowoverride()
    {
        return $this->allowoverride;
    }

    /**
     * Return the priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }
}