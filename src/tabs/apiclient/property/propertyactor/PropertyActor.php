<?php

/**
 * Tabs Rest API Property Actor trait.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\property\propertyactor;

/**
 * Tabs Rest API Property Actor trait.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
trait PropertyActor
{
    /**
     * Start date of relationship
     * 
     * @var \DateTime
     */
    protected $fromdate;
    
    /**
     * Finish date of relationship
     * 
     * @var \DateTime
     */
    protected $todate;
    
    /**
     * Actor object
     * 
     * @var \tabs\apiclient\actor\Actor
     */
    protected $actor;

    /**
     * Set the fromdate
     * 
     * @param string|\DateTime $date Date time object/string
     * 
     * @return \tabs\apiclient\property\propertyactor\PropertyActor
     */
    public function setFromdate($date)
    {
        $this->fromdate = $this->getDateTime($date);
        
        return $this;
    }
    
    /**
     * Set the todate
     * 
     * @param string|\DateTime $date Date time object/string
     * 
     * @return \tabs\apiclient\property\propertyactor\PropertyActor
     */
    public function setTodate($date)
    {
        $this->todate = $this->getDateTime($date);
        
        return $this;
    }
    
    /**
     * Fetches and sets the actor object from the api
     * 
     * @param \tabs\apiclient\actor\Actor|string $actor Actor
     * 
     * @return \tabs\apiclient\property\propertyactor\PropertyActor
     */
    public function setActor($actor)
    {
        if (is_string($actor) && substr($actor, 0, 1) == '/') {
            $args = explode('/', $actor);
            $class = "\\tabs\\apiclient\\actor\\{$this->getClass()}";
            $ref = array_pop($args);
            $this->actor = $class::get($ref);
        } else {
            $this->actor = $actor;
        }
        
        return $this;
    }
    
    /**
     * Return the actor object
     * 
     * @return \tabs\apiclient\actor\Actor
     */
    public function getActor()
    {
        return $this->actor;
    }
    
    /**
     * Return the fromdate
     * 
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }
    
    /**
     * Return the todate
     * 
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $classslug = strtolower($this->getClass());
        return array(
            'id' => $this->getId(),
            $classslug . 'id' => $this->getActor()->getId(),
            $classslug . 'fromdate' => $this->getFromdate()->format('Y-m-d'),
            $classslug . 'todate' => $this->getTodate()->format('Y-m-d')
        );
    }
}
