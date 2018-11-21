<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

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
 * @method Vatrate setPercentage(integer $pct) Sets the percentage
 * 
 * @method Vatrate   setFromdate(\DateTime $dt) Set the fromdate
 * 
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
    
    // ------------------ Public Functions --------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->setFromdate(new \DateTime());
        $this->setTodate(new \DateTime());
        
        parent::__construct($id);
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getFromdate()->format('Y-m-d'),
            'percentage' => $this->getPercentage()
        );
    }

    /**
     * Returns the percentage
     *
     * @return integer
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Returns the fromdate
     *
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the todate
     *
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }
}