<?php

/**
 * Tabs Rest API Booking Brand object.
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

namespace tabs\apiclient\brand;

/**
 * Tabs Rest API Branding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Branding getBranding() Return the branding object
 */
class ElementBranding extends \tabs\apiclient\core\Builder
{
    /**
     * The branding
     * 
     * @var Branding
     */
    protected $branding;
    
    /**
     * Set the branding
     * 
     * @param array|stdClass|Branding $brd Branding
     * 
     * @return \tabs\apiclient\brand\ElementBranding
     */
    public function setBranding($brd)
    {
        $brand = Branding::factory($brd);
        $this->branding = $brand->setParent($this);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'brandingid' => $this->getBranding()->getId()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'branding';
    }
}