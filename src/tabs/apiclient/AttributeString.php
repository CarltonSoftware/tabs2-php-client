<?php

namespace tabs\apiclient;

use tabs\apiclient\attribute\Option;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API String Attribute object.
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
class AttributeString extends Attribute
{
    /**
     * Options for the string attribute
     * 
     * @var Collection|Option[]
     */
    protected $options;

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->type = 'String';
        $this->options = Collection::factory('option', new Option(), $this);
        
        parent::__construct($id);
    }

    /**
     * Get all the options for this attribute
     *
     * @return Collection|Option[]
     */
    public function getOptions()
    {
        return $this->options;
    }
}