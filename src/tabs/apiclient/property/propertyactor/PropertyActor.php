<?php

/**
 * Tabs Rest API Property Actor object.
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
 * Tabs Rest API Property Actor object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer       getId()            Returns the ID
 * @method PropertyActor setId(integer $id) Sets the ID
 * 
 * @method \DateTime     getFromdate()      Returns the fromdate
 * @method \DateTime     getTodate()        Returns the todate
 */
abstract class PropertyActor extends \tabs\apiclient\core\Builder
{
    /**
     * Actor object
     * 
     * @var \tabs\apiclient\actor\Actor
     */
    protected $actor;
    
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
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
    }
    
    /**
     * Returns the actor namespace path
     * 
     * @return string
     */
    public function getActorClass()
    {
        return '\\tabs\\apiclient\\actor\\' . $this->getClass();
    }
    
    /**
     * Set the actor linked with this property
     * 
     * @param string|\tabs\apiclient\actor\Actor $actor Actor object or Api 
     * route to actor
     * 
     * @return PropertyActor
     */
    public function setActor($actor)
    {
        if ($actor instanceof \tabs\apiclient\actor\Actor) {
            $this->actor = $actor;
        } else {
            $routes = explode('/', $actor);

            if (count($routes) >= 2) {
                $ref = $routes[count($routes) - 1];
                $class = $this->getActorClass();

                $this->actor = $class::get($ref);
            } else {
                throw new \RuntimeException('Not enough parameters passed to setActor');
            }
        }
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            $this->getClass() . 'id' => $this->getActor()->getId(),
            $this->getClass() . 'fromdate' => $this->getFromdate()->format('Y-m-d'),
            $this->getClass() . 'todate' => $this->getTodate()->format('Y-m-d')
        );
    }
}
