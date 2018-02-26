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
 * @method integer getRuleorder() Returns the ruleorder
 * @method ChangeDayRule setRuleorder(integer $var) Sets the ruleorder
 * 
 * @method integer getEverysaturday() Returns the everysaturday
 * @method ChangeDayRule setEverysaturday(integer $var) Sets the everysaturday
 * 
 * @method integer getEverysunday() Returns the everysunday
 * @method ChangeDayRule setEverysunday(integer $var) Sets the everysunday
 * 
 * @method integer getEverymonday() Returns the everymonday
 * @method ChangeDayRule setEverymonday(integer $var) Sets the everymonday
 * 
 * @method integer getEverytuesday() Returns the everytuesday
 * @method ChangeDayRule setEverytuesday(integer $var) Sets the everytuesday
 * 
 * @method integer getEverywednesday() Returns the everywednesday
 * @method ChangeDayRule setEverywednesday(integer $var) Sets the everywednesday
 * 
 * @method integer getEverythursday() Returns the everythursday
 * @method ChangeDayRule setEverythursday(integer $var) Sets the everythursday
 * 
 * @method integer getEveryfriday() Returns the everyfriday
 * @method ChangeDayRule setEveryfriday(integer $var) Sets the everyfriday
 * 
 * @method \DateTime getFromdate() Returns the fromdate
 * @method ChangeDayTemplate setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method ChangeDayTemplate setTodate(\DateTime $var) Sets the todate
 * 
 * @method boolean getIsfromdate() Returns the isfromdate
 * @method ChangeDayRule setIsfromdate(boolean $var) Sets the isfromdate
 * 
 * @method boolean getIsnotfromdate() Returns the isnotfromdate
 * @method ChangeDayRule setIsnotfromdate(boolean $var) Sets the isnotfromdate
 * 
 * @method boolean getIstodate() Returns the istodate
 * @method ChangeDayRule setIstodate(boolean $var) Sets the istodate
 * 
 * @method boolean getIsnottodate() Returns the isnottodate
 * @method ChangeDayRule setIsnottodate(boolean $var) Sets the isnottodate
 * 
 * @method integer getWithindays() Returns the withindays
 * @method ChangeDayRule setWithindays(integer $var) Sets the withindays
 * 
 * @method integer getUnlessholidayatleast() Returns the unlessholidayatleast
 * @method ChangeDayRule setUnlessholidayatleast(integer $var) Sets the unlessholidayatleast
 * 
 * @method integer getMinimumholiday() Returns the minimumholiday
 * @method ChangeDayRule setMinimumholiday(integer $var) Sets the minimumholiday
 * 
 * @method boolean getShowonavailability() Returns the showonavailability
 * @method ChangeDayRule setShowonavailability(boolean $var) Sets the showonavailability
 * 
 * @method integer getDaysbeforeeaster() Returns the daysbeforeeaster
 * @method ChangeDayRule setDaysbeforeeaster(integer $var) Sets the daysbeforeeaster
 * 
 * @method integer getDaysaftereaster() Returns the daysaftereaster
 * @method ChangeDayRule setDaysaftereaster(integer $var) Sets the daysaftereaster
 * 
 * @method boolean getIspriceanchor() Returns the ispriceanchor
 * @method ChangeDayRule setIspriceanchor(boolean $var) Sets the ispriceanchor
 * 
 * @method boolean getIsnotpriceanchor() Returns the isnotpriceanchor
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
}