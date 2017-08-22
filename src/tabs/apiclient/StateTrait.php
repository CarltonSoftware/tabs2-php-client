<?php

namespace tabs\apiclient;
    
/**
 * Dormant state
 * 
 * @var integer
 */
const TABS2_APICLIENT_STATE_DORMANT = 0;

/**
 * Edited state
 * 
 * @var integer
 */
const TABS2_APICLIENT_STATE_EDITED = 1;

/**
 * Fetched state
 * 
 * @var integer
 */
const TABS2_APICLIENT_STATE_FETCHED = 2;

/**
 * Path overridden state
 * 
 * @var integer
 */
const TABS2_APICLIENT_PATH_OVERRIDDEN = 3;

/**
 * Tabs Rest State Trait object.
 *
 * Provides helper methods for managing state in objects
 *
 * PHP Version 5.5
 *
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */
trait StateTrait
{   
    /**
     * Object states
     * 
     * @var array
     */
    protected $states = array(
        TABS2_APICLIENT_STATE_DORMANT => true,
        TABS2_APICLIENT_STATE_EDITED => false,
        TABS2_APICLIENT_STATE_FETCHED => false,
        TABS2_APICLIENT_PATH_OVERRIDDEN => false
    );
    
    // ------------------------- Protected Functions ------------------------ //
    
    /**
     * Set the state
     * 
     * @param integer $state State
     * 
     * @return \tabs\apiclient\Base
     */
    public function setState($state)
    {
        $this->states[$state] = true;
        
        return $this;
    }

    /**
     * Check if the object has been edited
     * 
     * @return boolean
     */
    public function isEdited()
    {
        return $this->states[TABS2_APICLIENT_STATE_EDITED] == true;
    }
    
    /**
     * Set the edited bool
     * 
     * @param boolean $bool Edited Boolean
     * 
     * @return \tabs\apiclient\Collection
     */
    public function setEdited($bool)
    {
        $this->states[TABS2_APICLIENT_STATE_EDITED] = $bool;
        
        return $this;
    }

    /**
     * Check if the object has been fetched
     * 
     * @return boolean
     */
    public function isFetched()
    {
        return $this->states[TABS2_APICLIENT_STATE_FETCHED] == true;
    }
    
    /**
     * Set the fetched bool
     * 
     * @param boolean $bool State Boolean
     * 
     * @return \tabs\apiclient\Collection
     */
    public function setFetched($bool)
    {
        $this->states[TABS2_APICLIENT_STATE_FETCHED] = $bool;
        
        return $this;
    }
    
    /**
     * Set the fetched bool
     * 
     * @param boolean $bool State Boolean
     * 
     * @return \tabs\apiclient\Collection
     */
    public function setPathOverridden($bool)
    {
        $this->states[TABS2_APICLIENT_PATH_OVERRIDDEN] = $bool;
        
        return $this;
    }
    
    /**
     * Check the path overridden state
     * 
     * @return boolean
     */
    public function isPathOverridden()
    {
        return $this->states[TABS2_APICLIENT_PATH_OVERRIDDEN];
    }
}