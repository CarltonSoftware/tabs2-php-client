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
 * Tabs Rest API Keyholder Actor object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Keyholder
{
    use PropertyActor;
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
    }
    
    /**
     * Set the fromdate
     * 
     * @param string|\DateTime $date Date time object/string
     * 
     * @return \tabs\apiclient\property\propertyactor\Cleaner
     */
    public function setKeyholderfromdate($date)
    {
        return $this->setFromdate($date);
    }
    
    /**
     * Set the todate
     * 
     * @param string|\DateTime $date Date time object/string
     * 
     * @return \tabs\apiclient\property\propertyactor\Cleaner
     */
    public function setKeyholdertodate($date)
    {
        return $this->setTodate($date);
    }
}