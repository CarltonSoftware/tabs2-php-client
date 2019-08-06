<?php

namespace tabs\apiclient\property\marketingbrand;

use tabs\apiclient\Builder;
use tabs\apiclient\Grouping;

/**
 * Tabs Rest API GroupingValue object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class GroupingValue extends Builder
{
    /**
     * Grouping
     *
     * @var Grouping
     */
    protected $grouping;

    /**
     * @var number
     */

    protected $weight;

    /**
     * Groupingvalue
     *
     * @var \tabs\apiclient\GroupingValue
     */
    protected $groupingvalue;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the grouping
     *
     * @param stdclass|array|Grouping $grouping The Grouping
     *
     * @return GroupingValue
     */
    public function setGrouping($grouping)
    {
        $this->grouping = Grouping::factory($grouping);

        return $this;
    }

    /**
     * Set the groupingvalue
     *
     * @param stdclass|array|\tabs\apiclient\GroupingValue $groupingvalue The Groupingvalue
     *
     * @return GroupingValue
     */
    public function setGroupingvalue($groupingvalue)
    {
        $this->groupingvalue = \tabs\apiclient\GroupingValue::factory($groupingvalue);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'groupingvalueid' => $this->getGroupingvalue()->getId()
        );
    }

    /**
     * Returns the grouping
     *
     * @return Grouping
     */
    public function getGrouping()
    {
        return $this->grouping;
    }

    /**
     * Returns the groupingvalue
     *
     * @return \tabs\apiclient\GroupingValue
     */
    public function getGroupingvalue()
    {
        return $this->groupingvalue;
    }
}