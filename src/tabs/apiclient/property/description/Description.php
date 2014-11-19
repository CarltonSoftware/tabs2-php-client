<?php

/**
 * Tabs Rest API Property Description object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\property\description;
use tabs\apiclient\property\brand\MarketingBrand as PropertyMarketingBrand;

/**
 * Tabs Rest API Property Brand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer     getId()            Returns the description id
 * @method Description setId(integer $id) Set the description id
 * 
 * @method string      getDescription()             Returns the description
 * @method Description setDescription(string $desc) Set the description
 * 
 * @method Type getDescriptiontype() Return the description type
 * 
 * @method Description setMarketingbrand(string|MarketingBrand $brand) Set the marketing brand
 */
class Description extends \tabs\apiclient\core\Builder
{
    /**
     * Description id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Description type
     * 
     * @var Type
     */
    protected $descriptiontype;
    
    /**
     * Description string
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * Description marketing brand
     * 
     * @var \tabs\apiclient\property\brand\MarketingBrand
     */
    protected $marketingbrand;

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Set the description type
     * 
     * @param Type|array|stdClass $type Description type object or array
     * 
     * @return \tabs\apiclient\property\description\Description
     */
    public function setDescriptiontype($type)
    {
        $type = Type::factory($type);
        $type->setParent($this);
        $this->descriptiontype = $type;
        
        return $this;
    }
    
    /**
     * Get the marketing brand
     * 
     * @return \tabs\apiclient\property\brand\MarketingBrand
     */
    public function getMarketingbrand()
    {
        if (is_string($this->marketingbrand)) {
            $prop = $this->getParentProperty();
            $this->marketingbrand = PropertyMarketingBrand::_get(
                $this->marketingbrand
            );
            $this->marketingbrand->setParent($prop);
        }
        
        return $this->marketingbrand;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'propertymarketingbrandid' => $this->getMarketingbrand()->getId(),
            'descriptiontype' => $this->getDescriptiontype()->getName(),
            'description' => $this->getDescription()
        );
    }
}