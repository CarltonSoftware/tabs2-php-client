<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Sourcecategory object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string         getSourcecategory()                       Returns the sourcecategory
 * @method SourceCategory setSourcecategory(string $sourcecategory) Sets the sourcecategory
 */
class SourceCategory extends Builder
{
    /**
     * Sourcecategory
     * 
     * @var string
     */
    protected $sourcecategory;
        
    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'sourcecategory' => $this->getSourcecategory(),
        );
    }
}