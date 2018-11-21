<?php

namespace tabs\apiclient\actor;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ContactPreference object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ContactPreference setPriority(integer $var) Sets the priority
 * 
 * @method ContactPreference setDonotuse(boolean $var) Sets the donotuse
 */
class ContactPreference extends Builder
{
    /**
     * Branding
     *
     * @var \tabs\apiclient\Branding
     */
    protected $branding;

    /**
     * Rolereason
     *
     * @var \tabs\apiclient\RoleReason
     */
    protected $rolereason;

    /**
     * Priority
     *
     * @var integer
     */
    protected $priority;

    /**
     * Donotuse
     *
     * @var boolean
     */
    protected $donotuse;

    // -------------------- Public Functions -------------------- //

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->branding = new \tabs\apiclient\Branding();
    }    
    
    /**
     * Set the branding
     *
     * @param stdclass|array|\tabs\apiclient\Branding $branding The Branding
     *
     * @return ContactPreference
     */
    public function setBranding($branding)
    {
        $this->branding = \tabs\apiclient\Branding::factory($branding);

        return $this;
    }

    /**
     * Set the rolereason
     *
     * @param stdclass|array|\tabs\apiclient\RoleReason $rolereason The Rolereason
     *
     * @return ContactPreference
     */
    public function setRolereason($rolereason)
    {
        $this->rolereason = \tabs\apiclient\RoleReason::factory($rolereason);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'brandingid' => $this->getBranding()->getId(),
            'role' => $this->getRolereason()->getRole()->getName(),
            'reason' => $this->getRolereason()->getReason()->getName(),
            'priority' => $this->getPriority(),
            'donotuse' => $this->boolToStr($this->getDonotuse()),
            'contactdetailid' => $this->getParent()->getId()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function getCreateUrl()
    {
        $actor = $this->getParentActor();
        
        return $actor->getUpdateUrl() . '/contactpreference';
    }
    
    /**
     * @inheritDoc
     */
    public function getUpdateUrl()
    {
        return $this->getCreateUrl() . '/' . $this->getId();
    }

    /**
     * Returns the branding
     *
     * @return \tabs\apiclient\Branding
     */
    public function getBranding()
    {
        return $this->branding;
    }

    /**
     * Returns the rolereason
     *
     * @return \tabs\apiclient\RoleReason
     */
    public function getRolereason()
    {
        return $this->rolereason;
    }

    /**
     * Returns the priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Returns the donotuse
     *
     * @return boolean
     */
    public function getDonotuse()
    {
        return $this->donotuse;
    }
}