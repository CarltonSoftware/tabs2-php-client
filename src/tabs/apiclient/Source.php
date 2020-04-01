<?php

namespace tabs\apiclient;
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
 * @method Source         setSourcecode(string $sourcecode)   Sets the sourcecode
 * 
 * @method Source         setDescription(string $description) Sets the description
 * 
 * 
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
    protected $sourcecategory;
    
    /**
     * SourceMarketingBrand Collection
     * 
     * @var Collection
     */
    protected $sourcemarketingbrands;

    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->sourcemarketingbrands = \tabs\apiclient\Collection::factory(
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
        $this->sourcecategory = SourceCategory::factory($sourcecategory);
        
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
            'sourcecategory' => $this->getSourcecategory()->getId()
        );
    }

    /**
     * Returns the sourcecode
     *
     * @return string
     */
    public function getSourcecode()
    {
        return $this->sourcecode;
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

    /**
     * Returns the sourcecategory
     *
     * @return SourceCategory
     */
    public function getSourcecategory()
    {
        return $this->sourcecategory;
    }

    /**
     * Returns the sourcemarketingbrands
     *
     * @return StaticCollection|SourceMarketingBrand[]
     */
    public function getSourcemarketingbrands()
    {
        return $this->sourcemarketingbrands;
    }
}