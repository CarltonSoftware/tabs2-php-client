<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;
use tabs\apiclient\extra\branding\Configuration;

/**
 * Tabs Rest API OwnerPaymentSummary object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method OwnerPaymentSummary setOwnerincome(float $var) Sets the ownerincome
 * 
 * @method OwnerPaymentSummary setAgencyincome(float $var) Sets the agencyincome
 * 
 * @method OwnerPaymentSummary setAgencyvat(float $var) Sets the agencyvat
 * 
 */
class OwnerPaymentSummary extends Builder
{
    /**
     * Ownerincome
     *
     * @var float
     */
    protected $ownerincome;    
    
    /**
     * Ownerincometotal
     *
     * @var float
     */
    protected $ownerincometotal;        
    
    /**
     * Agencyincome
     *
     * @var float
     */
    protected $agencyincome;    
    
    /**
     * Agencyincometotal
     *
     * @var float
     */
    protected $agencyincometotal;      
    
    /**
     * Agencyvat
     *
     * @var float
     */
    protected $agencyvat;
    
    /**
     * Agencyvattotal
     *
     * @var float
     */
    protected $agencyvattotal;    

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'ownerincome' => $this->getOwnerincome(),
            'ownerincometotal' => $this->getOwnerincometotal(),
            'agencyincome' => $this->getAgencyincome(),
            'agencyincometotal' => $this->getAgencyincometotal(),
            'agencyvat' => $this->getAgencyvat(),
            'agencyvattotal' => $this->getAgencyvattotal(),
        );
        
        return $arr;
    }

    /**
     * Returns the ownerincome
     *
     * @return float
     */
    public function getOwnerincome()
    {
        return $this->ownerincome;
    }

    /**
     * Returns the agencyincome
     *
     * @return float
     */
    public function getAgencyincome()
    {
        return $this->agencyincome;
    }

    /**
     * Returns the agencyvat
     *
     * @return float
     */
    public function getAgencyvat()
    {
        return $this->agencyvat;
    }
}