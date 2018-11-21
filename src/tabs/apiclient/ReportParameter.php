<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API ReportParameter object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method ReportParameter setName(string $name)                 Sets the name
 * 
 * @method ReportParameter setDescription(string $description)   Sets the description
 * 
 * @method ReportParameter setType(string $type)                 Sets the type
 * 
 * @method ReportParameter setDefaultvalue(string $defaultvalue) Sets the defaultvalue
 * 
 * @method ReportParameter setSortorder(integer $sortorder)      Sets the sortorder
 * 
 * @method ReportParameter setRequired(boolean $required)        Sets the required
 */
class ReportParameter extends Builder
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
     * Type
     * 
     * @var string
     */
    protected $type;
    
    /**
     * Defaultvalue
     * 
     * @var string
     */
    protected $defaultvalue;    
    
    /**
     * Sortorder
     * 
     * @var integer
     */
    protected $sortorder;    

    /**
     * Required
     * 
     * @var boolean
     */
    protected $required;    

    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'type' => $this->getType(),
            'defaultvalue' => $this->getDefaultvalue(),
            'sortorder' => $this->getSortorder(),
            'required' => $this->getRequired(),
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
     * Returns the type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the defaultvalue
     *
     * @return string
     */
    public function getDefaultvalue()
    {
        return $this->defaultvalue;
    }

    /**
     * Returns the sortorder
     *
     * @return integer
     */
    public function getSortorder()
    {
        return $this->sortorder;
    }

    /**
     * Returns the required
     *
     * @return boolean
     */
    public function getRequired()
    {
        return $this->required;
    }
}