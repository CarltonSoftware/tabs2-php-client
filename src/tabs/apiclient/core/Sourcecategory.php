<?php

/**
 * Tabs Rest API Sourcecategory object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;

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
 * @method integer        getId()                                   Returns the id
 * @method Sourcecategory setId(integer $id)                        Sets the id
 * 
 * @method string         getSourcecategory()                       Returns the sourcecategory
 * @method Sourcecategory setSourcecategory(string $sourcecategory) Sets the sourcecategory
 */
class Sourcecategory extends Builder
{
    /**
     * Id
     * 
     * @var integer
     */
    protected $id;
    
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
            'id' => $this->getId(),
            'sourcecategory' => $this->getSourcecategory(),
        );
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString() {
        return (string) $this->getId();
    }
}