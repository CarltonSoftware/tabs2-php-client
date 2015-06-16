<?php

/**
 * Tabs Rest API Vatband object.
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

namespace tabs\apiclient\core;

/**
 * Tabs Rest API Vatband object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer getPercentage()             Returns the percentage
 * @method Vatrate setPercentage(integer $pct) Sets the percentage
 * 
 * @method \DateTime getFromdate()              Returns the fromdate
 * @method Vatrate   setFromdate(\DateTime $dt) Set the fromdate
 * 
 * @method \DateTime getTodate()              Returns the todate
 * @method Vatrate   setTodate(\DateTime $dt) Set the todate
 */
class Vatrate extends Builder
{
    /**
     * From date of the extra
     * 
     * @var \DateTime
     */
    protected $fromdate;
    
    /**
     * To date of the extra
     * 
     * @var \DateTime
     */
    protected $todate;
    
    /**
     * Percentage
     * 
     * @var string
     */
    protected $percentage = 0;
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setFromdate(new \DateTime());
        $this->setTodate(new \DateTime());
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getFromdate()->format('Y-m-d'),
            'percentage' => $this->getPercentage()
        );
    }
}