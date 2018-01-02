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
 * @method string         getName()                            Returns the name
 * @method Report         setName(string $name)                Sets the name
 * 
 * @method string         getDescription()                     Returns the description
 * @method Report         setDescription(string $description)  Sets the description
 * 
 * @method string         getFilename()                        Returns the filename
 * @method Report         setFilename(string $filename)        Sets the filename
 * 
 * @method string         getCategory()                        Returns the category
 * @method Report         setCategory(string $category)        Sets the category
 * 
 * @method Collection|ReportParameter[] getParameters() Returns the parameters
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
}