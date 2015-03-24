<?php

/**
 * Tabs Rest API Source object.
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
 * Tabs Rest API Source object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer        getId()                             Returns the id
 * @method Source         setId(integer $id)                  Sets the id
 * 
 * @method string         getSourcecode()                     Returns the sourcecode
 * @method Source         setSourcecode(string $sourcecode)   Sets the sourcecode
 * 
 * @method string         getDescription()                    Returns the description
 * @method Source         setDescription(string $description) Sets the description
 * 
 * @method Sourcecategory getSourcecategory()                 Returns the sourcecategory
 */
class Source extends Builder
{
    /**
     * Id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Sourcecode
     * 
     * @var string
     */
    protected $sourcecode;
        
    /**
     * Description
     * 
     * @var string
     */
    protected $description;
    
    /**
     * Sourcecategory
     * 
     * @var Sourcecategory
     */
    protected $sourcecategory;
    
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Set the source sourcecategory
     * 
     * @param array|stdClass|Sourcecategory $sourcecategory Sourcecategory
     * 
     * @return \tabs\apiclient\core\Source
     */
    public function setSourcecategory($sourcecategory)
    {
        $this->sourcecategory = Sourcecategory::factory($sourcecategory);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'sourcecode' => $this->getSourcecode(),
            'description' => $this->getDescription(),
            'sourcecategory' => $this->getSourcecategory()->toArray(),
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