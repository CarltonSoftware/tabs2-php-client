<?php

namespace tabs\apiclient\extra;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Branding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\Branding getBranding() Returns the branding
 * 
 * @method boolean getPetextrabranding() Returns the pet extra branding setting
 * @method Branding setPetextrabranding(boolean $bool) Set the pet extra branding setting
 */
class Branding extends Builder
{
    /**
     * Branding
     *
     * @var \tabs\apiclient\Branding
     */
    protected $branding;
    
    /**
     * Pet extra branding
     * 
     * @var boolean
     */
    protected $petextrabranding = false;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the branding
     *
     * @param stdclass|array|\tabs\apiclient\Branding $branding The Branding
     *
     * @return Branding
     */
    public function setBranding($branding)
    {
        $this->branding = \tabs\apiclient\Branding::factory($branding);

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
}