<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;

/**
 * Tabs Rest API ChangeDayTemplate object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ChangeDayRule setRuleorder(integer $var) Sets the ruleorder
 * 
 * @method ChangeDayRule setEverysaturday(integer $var) Sets the everysaturday
 * 
 * @method ChangeDayRule setEverysunday(integer $var) Sets the everysunday
 * 
 * @method ChangeDayRule setEverymonday(integer $var) Sets the everymonday
 * 
 * @method ChangeDayRule setEverytuesday(integer $var) Sets the everytuesday
 * 
 * @method ChangeDayRule setEverywednesday(integer $var) Sets the everywednesday
 * 
 * @method ChangeDayRule setEverythursday(integer $var) Sets the everythursday
 * 
 * @method ChangeDayRule setEveryfriday(integer $var) Sets the everyfriday
 * 
 * @method ChangeDayTemplate setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method ChangeDayTemplate setTodate(\DateTime $var) Sets the todate
 * 
 * @method ChangeDayRule setIsfromdate(boolean $var) Sets the isfromdate
 * 
 * @method ChangeDayRule setIsnotfromdate(boolean $var) Sets the isnotfromdate
 * 
 * @method ChangeDayRule setIstodate(boolean $var) Sets the istodate
 * 
 * @method ChangeDayRule setIsnottodate(boolean $var) Sets the isnottodate
 * 
 * @method ChangeDayRule setWithindays(integer $var) Sets the withindays
 * 
 * @method ChangeDayRule setUnlessholidayatleast(integer $var) Sets the unlessholidayatleast
 * 
 * @method ChangeDayRule setMinimumholiday(integer $var) Sets the minimumholiday
 * 
 * @method ChangeDayRule setShowonavailability(boolean $var) Sets the showonavailability
 * 
 * @method ChangeDayRule setDaysbeforeeaster(integer $var) Sets the daysbeforeeaster
 * 
 * @method ChangeDayRule setDaysaftereaster(integer $var) Sets the daysaftereaster
 * 
 * @method ChangeDayRule setIspriceanchor(boolean $var) Sets the ispriceanchor
 * 
 * @method ChangeDayRule setIsnotpriceanchor(boolean $var) Sets the isnotpriceanchor
 */
class ChangeDayRule extends Builder
{
    /**
     * Ruleorder
     *
     * @var integer
     */
    protected $ruleorder;    
    
    /**
     * Everysaturday
     *
     * @var boolean
     */
    protected $everysaturday;    
    
    /**
     * Everysunday
     *
     * @var boolean
     */
    protected $everysunday;    

    /**
     * Everymonday
     *
     * @var boolean
     */
    protected $everymonday;    

    /**
     * Everytuesday
     *
     * @var boolean
     */
    protected $everytuesday;    

    /**
     * Everywednesday
     *
     * @var boolean
     */
    protected $everywednesday;    

    /**
     * Everythursday
     *
     * @var boolean
     */
    protected $everythursday;    

    /**
     * Everyfriday
     *
     * @var boolean
     */
    protected $everyfriday;
    
    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;    
    
    /**
     * Isfromdate
     *
     * @var boolean
     */
    protected $isfromdate;    
    
    /**
     * Isnotfromdate
     *
     * @var boolean
     */
    protected $isnotfromdate;       

    /**
     * Istodate
     *
     * @var boolean
     */
    protected $istodate;    
    
    /**
     * Isnottodate
     *
     * @var boolean
     */
    protected $isnottodate;        

    /**
     * Withindays
     *
     * @var integer
     */
    protected $withindays;   
    
    /**
     * Unlessholidayatleast
     *
     * @var integer
     */
    protected $unlessholidayatleast;   
    
    /**
     * Minimumholiday
     *
     * @var integer
     */
    protected $minimumholiday;   
    
    /**
     * Showonavailability
     *
     * @var boolean
     */
    protected $showonavailability;   
    
    /**
     * Daysbeforeeaster
     *
     * @var integer
     */
    protected $daysbeforeeaster;   
    
    /**
     * Daysaftereaster
     *
     * @var integer
     */
    protected $daysaftereaster;
    
    /**
     * Ispriceanchor
     *
     * @var boolean
     */
    protected $ispriceanchor; 
    
    /**
     * Isnotpriceanchor
     *
     * @var boolean
     */
    protected $isnotpriceanchor;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();           
        
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'ruleorder' => $this->getRuleorder(),
            'everysaturday' => $this->getEverysaturday(),
            'everysunday' => $this->getEverysunday(),
            'everymonday' => $this->getEverymonday(),
            'everytuesday' => $this->getEverytuesday(),
            'everywednesday' => $this->getEverywednesday(),
            'everythursday' => $this->getEverythursday(),
            'everyfriday' => $this->getEveryfriday(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'isfromdate' => $this->getIsfromdate(),
            'isnotfromdate' => $this->getIsnotfromdate(),
            'istodate' => $this->getIstodate(),
            'isnottodate' => $this->getIsnottodate(),
            'withindays' => $this->getWithindays(),
            'unlessholidayatleast' => $this->getUnlessholidayatleast(),
            'minimumholiday' => $this->getMinimumholiday(),
            'showonavailability' => $this->getShowonavailability(),
            'daysbeforeeaster' => $this->getDaysbeforeeaster(),
            'daysaftereaster' => $this->getDaysaftereaster(),
            'ispriceanchor' => $this->getIspriceanchor(),
            'isnotpriceanchor' => $this->getIsnotpriceanchor(),
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'rule';
    }    

    /**
     * Returns the ruleorder
     *
     * @return integer
     */
    public function getRuleorder()
    {
        return $this->ruleorder;
    }

    /**
     * Returns the everysaturday
     *
     * @return integer
     */
    public function getEverysaturday()
    {
        return $this->everysaturday;
    }

    /**
     * Returns the everysunday
     *
     * @return integer
     */
    public function getEverysunday()
    {
        return $this->everysunday;
    }

    /**
     * Returns the everymonday
     *
     * @return integer
     */
    public function getEverymonday()
    {
        return $this->everymonday;
    }

    /**
     * Returns the everytuesday
     *
     * @return integer
     */
    public function getEverytuesday()
    {
        return $this->everytuesday;
    }

    /**
     * Returns the everywednesday
     *
     * @return integer
     */
    public function getEverywednesday()
    {
        return $this->everywednesday;
    }

    /**
     * Returns the everythursday
     *
     * @return integer
     */
    public function getEverythursday()
    {
        return $this->everythursday;
    }

    /**
     * Returns the everyfriday
     *
     * @return integer
     */
    public function getEveryfriday()
    {
        return $this->everyfriday;
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

    /**
     * Returns the isfromdate
     *
     * @return boolean
     */
    public function getIsfromdate()
    {
        return $this->isfromdate;
    }

    /**
     * Returns the isnotfromdate
     *
     * @return boolean
     */
    public function getIsnotfromdate()
    {
        return $this->isnotfromdate;
    }

    /**
     * Returns the istodate
     *
     * @return boolean
     */
    public function getIstodate()
    {
        return $this->istodate;
    }

    /**
     * Returns the isnottodate
     *
     * @return boolean
     */
    public function getIsnottodate()
    {
        return $this->isnottodate;
    }

    /**
     * Returns the withindays
     *
     * @return integer
     */
    public function getWithindays()
    {
        return $this->withindays;
    }

    /**
     * Returns the unlessholidayatleast
     *
     * @return integer
     */
    public function getUnlessholidayatleast()
    {
        return $this->unlessholidayatleast;
    }

    /**
     * Returns the minimumholiday
     *
     * @return integer
     */
    public function getMinimumholiday()
    {
        return $this->minimumholiday;
    }

    /**
     * Returns the showonavailability
     *
     * @return boolean
     */
    public function getShowonavailability()
    {
        return $this->showonavailability;
    }

    /**
     * Returns the daysbeforeeaster
     *
     * @return integer
     */
    public function getDaysbeforeeaster()
    {
        return $this->daysbeforeeaster;
    }

    /**
     * Returns the daysaftereaster
     *
     * @return integer
     */
    public function getDaysaftereaster()
    {
        return $this->daysaftereaster;
    }

    /**
     * Returns the ispriceanchor
     *
     * @return boolean
     */
    public function getIspriceanchor()
    {
        return $this->ispriceanchor;
    }

    /**
     * Returns the isnotpriceanchor
     *
     * @return boolean
     */
    public function getIsnotpriceanchor()
    {
        return $this->isnotpriceanchor;
    }
}