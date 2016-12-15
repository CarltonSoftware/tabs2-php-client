<?php

namespace tabs\apiclient\core;
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
 * @method string getName()             Return the status name
 * @method Status setName(string $name) Set the name
 * 
 * @method boolean getAllowbooking() Return the allow booking
 * @method Status  setAllowbooking(boolean $bool) Set the allow booking
 * 
 * @method boolean getAllowoverride() Return the allow override
 * @method Status  setAllowoverride(boolean $bool) Set the allow override
 * 
 * @method integer getPriority() Return the priority
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
            'allowbooking' => $this->boolToStr($this->setAllowbooking()),
            'allowoverride' => $this->boolToStr($this->getAllowoverride()),
            'priority' => $this->getPriority()
        );
    }
}