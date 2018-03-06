<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;
use tabs\apiclient\ChangeDayRule;

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
 * @method string getType() Returns the type
 * @method ChangeDayTemplate setType(string $var) Sets the type
 * 
 * @method string getName() Returns the name
 * @method ChangeDayTemplate setName(string $var) Sets the name
 * 
 * @method string getDescription() Returns the description
 * @method ChangeDayTemplate setDescription(string $var) Sets the description
 * 
 * @method \tabs\apiclient\ChangeDayTemplate getParent() Returns the parent ChangeDayTemplate
 * 
 * @method \DateTime getFromdate() Returns the fromdate
 * @method ChangeDayTemplate setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method ChangeDayTemplate setTodate(\DateTime $var) Sets the todate
 * 
* @method Collection|ChangeDayRule[] getChangedayrules Returns the change day rules
 */
class ChangeDayTemplate extends Base
{
    /**
     * Type
     *
     * @var string
     */
    protected $type;    
    
    /**
     * Name
     *
     * @var string
     */
    protected $name;    

    /**
     * Description
     *
     * @var string
     */
    protected $description;  
    
    /**
     * Parent ChangeDayTemplate
     *
     * @var \tabs\apiclient\ChangeDayTemplate
     */
    protected $parent;    
    
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
     * Collection of change day rules
     * 
     * @var Collection|ChangeDayRule[]
     */
    protected $changedayrules; 

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        
        $this->changedayrules = Collection::factory(
            'rule', 
            new ChangeDayRule(), 
            $this
        );           
        
        parent::__construct($id);
    }
    
    /**
     * Set the parent ChangeDayTemplate
     *
     * @param stdclass|array|\tabs\apiclient\ChangeDayTemplate $parent The parent ChangeDayTemplate
     *
     * @return \tabs\apiclient\ChangeDayTemplate
     */
    public function setParent(&$parent)
    {
        if (is_string($parent) && stristr($parent, 'changedaytemplate')) {
            $this->parent = \tabs\apiclient\ChangeDayTemplate::factory($parent);
        } else {
            $this->parent = $parent;
        }
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'type' => $this->getType(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d')
        );
    }
}