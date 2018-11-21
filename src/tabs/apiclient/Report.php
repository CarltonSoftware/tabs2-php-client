<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;
use tabs\apiclient\ReportParameter;

/**
 * Tabs Rest API Report object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Report         setName(string $name)                Sets the name
 * 
 * @method Report         setDescription(string $description)  Sets the description
 * 
 * @method Report         setFilename(string $filename)        Sets the filename
 * 
 * @method Report         setCategory(string $category)        Sets the category
 * 
 */
class Report extends Builder
{
    /**
     * Name
     * 
     * @var string
     */
    protected $name;
        
    /**
     * Description
     * 
     * @var string
     */
    protected $description;
    
    /**
     * Filename
     * 
     * @var string
     */
    protected $filename;
    
    /**
     * Category
     * 
     * @var string
     */
    protected $category;    
    
    /**
     * Parameters
     *
     * @var StaticCollection|\tabs\apiclient\ReportParameter[]
     */
    protected $parameters;    

    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->parameters = StaticCollection::factory(
            'parameter',
            new ReportParameter(),
            $this
        );

        parent::__construct($id);
    }    
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'filename' => $this->getFilename(),
            'category' => $this->getCategory(),
        );
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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
     * Returns the filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Returns the category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Returns the parameters
     *
     * @return Collection|ReportParameter[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}