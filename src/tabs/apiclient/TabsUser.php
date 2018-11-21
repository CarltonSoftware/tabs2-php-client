<?php

namespace tabs\apiclient;

/**
 * Tabs Rest TabsUser object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 */
class TabsUser extends Actor
{
    /**
     * tabsusername
     *
     * @var string
     */
    protected $tabsusername;
    
    /**
     * Default branding
     * 
     * @var \tabs\apiclient\Branding
     */
    protected $defaultbranding;
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * Set the default branding
     * 
     * @param array|\stdClass|\tabs\apiclient\Branding $branding Branding
     * 
     * @return \tabs\apiclient\TabsUser
     */
    public function setDefaultbranding($branding)
    {
        $this->defaultbranding = Branding::factory($branding);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = parent::toArray();
        
        if ($this->getDefaultbranding()) {
            $arr['defaultbrandingid'] = $this->getDefaultbranding()->getId();
        }
        
        return $arr;
    }

    /**
     * Returns the tabsusername
     *
     * @return integer
     */
    public function getTabsusername()
    {
        return $this->tabsusername;
    }

    /**
     * Returns the default branding
     *
     * @return \tabs\apiclient\Branding
     */
    public function getDefaultbranding()
    {
        return $this->defaultbranding;
    }
}