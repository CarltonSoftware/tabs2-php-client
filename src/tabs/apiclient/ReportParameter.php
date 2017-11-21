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
 * @method string          getName()                             Returns the name
 * @method ReportParameter setName(string $name)                 Sets the name
 * 
 * @method string          getDescription()                      Returns the description
 * @method ReportParameter setDescription(string $description)   Sets the description
 * 
 * @method string          getType()                             Returns the type
 * @method ReportParameter setType(string $type)                 Sets the type
 * 
 * @method string          getDefaultvalue()                     Returns the defaultvalue
 * @method ReportParameter setDefaultvalue(string $defaultvalue) Sets the defaultvalue
 * 
 * @method integer         getSortorder()                        Returns the sortorder
 * @method ReportParameter setSortorder(integer $sortorder)      Sets the sortorder
 * 
 * @method boolean         getRequired()                         Returns the required
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
}