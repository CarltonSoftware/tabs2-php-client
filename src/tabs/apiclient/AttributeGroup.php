<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Attribute group object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string getName()             Returns the name
 * @method Group  setName(string $name) Sets the name
 */
class AttributeGroup extends Builder
{
    /**
     * Name
     * 
     * @var string
     */
    protected $name = '';
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName()
        );
    }
}