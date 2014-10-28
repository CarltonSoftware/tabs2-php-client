<?php

/**
 * Tabs Rest API Keyholder Property Actor object.
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
 * Tabs Rest API property Keyholder Actor object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer  getId()            Returns the ID
 * @method PropertyActor setId(integer $id) Sets the ID
 */
class Cleaner extends PropertyActor
{
    /**
     * Set the cleaner
     * 
     * @param string|\tabs\apiclient\actor\Actor $actor Actor object or Api 
     * route to actor
     * 
     * @return Owner
     */
    public function setCleaner($actor)
    {
        return $this->setActor($actor);
    }

    /**
     * Set the fromdate
     * 
     * @param string|\DateTime $date Date time object/string
     * 
     * @return \tabs\apiclient\property\propertyactor\Cleaner
     */
    public function setCleanerfromdate($date)
    {
        $this->fromdate = new \DateTime($date);
        
        return $this;
    }
    
    /**
     * Set the todate
     * 
     * @param string|\DateTime $date Date time object/string
     * 
     * @return \tabs\apiclient\property\propertyactor\Cleaner
     */
    public function setCleanertodate($date)
    {
        $this->todate = new \DateTime($date);
        
        return $this;
    }
}