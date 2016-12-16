<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API DescriptionType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string   getName() Returns the name
 * @method Grouping setName(string $var) Sets the name
 * 
 * @method Grouping getParentgrouping() Get the parent grouping
 */
class Grouping extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Parent
     *
     * @var Grouping
     */
    protected $parentgrouping;
    
    /**
     * Grouping values
     * 
     * @var Collection|GroupingValue[]
     */
    protected $groupingvalue;

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->groupingvalue = \tabs\apiclient\Collection::factory(
            'value',
            new GroupingValue,
            $this
        );
        
        parent::__construct($id);
    }
    
    /**
     * Set the parent grouping
     * 
     * @param array|stdClass|Grouping $grp Parent grouping
     * 
     * @return Grouping
     */
    public function setParentgrouping($grp)
    {
        $this->parentgrouping = self::factory($grp);
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'name' => $this->getName()
        );
        
        if ($this->getParentgrouping()) {
            $arr['parentgroupingid'] = $this->getParentgrouping()->getId();
        }
        
        return $arr;
    }
}