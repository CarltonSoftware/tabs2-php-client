<?php

namespace tabs\apiclient\core;
use tabs\apiclient\Builder;

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
 * @method string         getSourcecode()                     Returns the sourcecode
 * @method Source         setSourcecode(string $sourcecode)   Sets the sourcecode
 * 
 * @method string         getDescription()                    Returns the description
 * @method Source         setDescription(string $description) Sets the description
 * 
 * @method SourceCategory getSourceCategory()                 Returns the sourcecategory
 */
class Source extends Builder
{
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
    protected $sourceCategory;
    
    /**
     * SourceMarketingBrand Collection
     * 
     * @var Collection
     */
    protected $sourceMarketingBrands;

    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->sourceMarketingBrands = \tabs\apiclient\Collection::factory(
            new SourceMarketingBrand,
            $this
        );
        parent::__construct($id);
    }
    
    /**
     * Set the source sourcecategory
     * 
     * @param array|stdClass|SourceCategory $sourcecategory SourceCategory
     * 
     * @return Source
     */
    public function setSourcecategory($sourcecategory)
    {
        $this->sourceCategory = SourceCategory::factory($sourcecategory);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'sourcecode' => $this->getSourcecode(),
            'description' => $this->getDescription(),
            'sourcecategory' => $this->getSourceCategory()->getId()
        );
    }
}