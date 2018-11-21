<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Extra Group object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ExtraGroup setExtragroup(string $var) Sets the extra group
 * 
 * @method ExtraGroup setDescription(string $var) Sets the description
 */
class ExtraGroup extends Builder
{
    /**
     * Group
     *
     * @var string
     */
    protected $extragroup;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'extragroup' => $this->getExtragroup(),
            'description' => $this->getDescription()
        );
    }

    /**
     * Returns the extra group
     *
     * @return string
     */
    public function getExtragroup()
    {
        return $this->extragroup;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}