<?php

/**
 * Tabs Rest API Extra object.
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
use tabs\apiclient\core\extra\Branding as ExtraBranding;
use tabs\apiclient\collection\core\extra\Branding as ExtraBrandingCollection;

/**
 * Tabs Rest API Extra object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method integer getId()            Returns the ID
 * @method Extra   setId(integer $id) Sets the ID
 * 
 * @method string  getExtracode()                  Returns the extracode
 * @method Extra   setExtracode(string $extracode) Sets the extracode 
 * 
 * @method string  getExtratype()                  Returns the extratype
 * @method Extra   setExtratype(string $extratype) Sets the extratype
 * 
 * @method string  getDescription()             Returns the description
 * @method Extra   setDescription(string $desc) Sets the description
 * 
 * @method ExtraBrandingCollection getBrandings() Returns an ExtraBranding collection
 */
class Extra extends \tabs\apiclient\core\Builder
{
    /**
     * ID
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Code of Extra
     * 
     * @var string
     */
    protected $extracode = '';
    
    /**
     * Extra Type
     * 
     * @var string
     */
    protected $extratype = '';
    
    /**
     * Description
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * ExtraBranding Collection
     * 
     * @var ExtraBrandingCollection 
     */
    protected $brandings;
    
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {   
        $this->brandings = new ExtraBrandingCollection();
        $this->brandings->setElementParent($this);
    }
    
    /**
     * Add an extra branding
     *
     * @param ExtraBranding $extraBranding ExtraBranding object
     *
     * @return Extra
     */
    public function addBranding(ExtraBranding &$extraBranding)
    {
        $extraBranding->setParent($this);
        $this->brandings->addElement($extraBranding);

        return $this;
    }
    
    /**
     * Add a branding object to the extra.  This creates a new extrabranding
     * object.
     * 
     * @param \tabs\apiclient\brand\Branding $brand Existing branding object
     *
     * @return Extra
     */
    public function addNewBranding(\tabs\apiclient\brand\Branding $brand)
    {
        if (!$this->hasBrand($brand)) {
            $eb = new ExtraBranding();
            $eb->setBranding($brand);
            $this->addBranding($eb);
            $eb->create();
        }
        
        return $this;
    }
    
    /**
     * Check if an extra has a brand applied to it already
     * 
     * @param \tabs\apiclient\brand\Branding $brand Branding
     * 
     * @return boolean
     */
    public function hasBrand(\tabs\apiclient\brand\Branding $brand)
    {
        foreach ($this->getBrandings() as $eb) {
            if ($eb->getBranding() === $brand) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Set the extra branding objects
     *
     * @param ExtraBranding $extraBrandings ExtraBranding array
     *
     * @return Extra
     */
    public function setBrandings($extraBrandings)
    {
        foreach ($extraBrandings as $eb) {
            $extraBranding = ExtraBranding::factory($eb);
            $this->addBranding($extraBranding);
        }

        return $this;
    }
    
    /**
     * Return the core branding objects for the extra
     * 
     * @return \tabs\apiclient\brand\Branding[]
     */
    public function getCoreBrandings()
    {
        $brandings = array();
        foreach ($this->getBrandings() as $extraBranding) {
            $brandings[] = $extraBranding->getBranding();
        }
        
        return $brandings;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'extracode' => $this->getExtracode(),
            'extratype' => $this->getExtratype(),
            'description' => $this->getDescription()
        );
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString() 
    {
        $extracode = $this->getExtracode();
        $extratype = $this->getExtratype();
        $description = $this->getDescription();
        
        return sprintf('%s %s: %s', $extracode, $extratype, $description);
    }
}