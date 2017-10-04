<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Branding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\Branding getBranding() Returns the branding object
 * @method string getDescription() Returns the description string
 * @method Branding setDescription(string $var) Sets the description
 * 
 * @method boolean getActive() Returns the active boolean
 * @method Branding setActive(boolean $var) Sets the active
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
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Active
     *
     * @var boolean
     */
    protected $active = false;

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
        $arr = $this->__toArray();

        if ($this->getBranding()) {
            $arr['brandingid'] = $this->getBranding()->getId();
        }

        return $arr;
    }
}