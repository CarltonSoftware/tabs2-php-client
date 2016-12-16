<?php

namespace tabs\apiclient\pricetype;

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
 * @method \tabs\apiclient\SalesChannel getSaleschannel() Returns the saleschannel
 * @method \DateTime getFromdate() Returns the fromdate
 * @method Branding setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method Branding setTodate(\DateTime $var) Sets the todate
 * 
 * @method integer getDecimalplaces() Returns the decimalplaces
 * @method Branding setDecimalplaces(integer $var) Sets the decimalplaces
 * 
 * @method integer getPercentage() Returns the percentage
 * @method Branding setPercentage(integer $var) Sets the percentage
 * 
 * @method Branding getBasepricetypebranding() Returns the basepricetypebranding
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
     * Saleschannel
     *
     * @var \tabs\apiclient\SalesChannel
     */
    protected $saleschannel;

    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;

    /**
     * Decimalplaces
     *
     * @var integer
     */
    protected $decimalplaces;

    /**
     * Percentage
     *
     * @var integer
     */
    protected $percentage;

    /**
     * Basepricetypebranding
     *
     * @var Branding
     */
    protected $basepricetypebranding;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        
        parent::__construct($id);
    }

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
     * Set the saleschannel
     *
     * @param stdclass|array|\tabs\apiclient\SalesChannel $saleschannel The Saleschannel
     *
     * @return Branding
     */
    public function setSaleschannel($saleschannel)
    {
        $this->saleschannel = \tabs\apiclient\SalesChannel::factory($saleschannel);

        return $this;
    }

    /**
     * Set the basepricetypebranding
     *
     * @param stdclass|array|Branding $basepricetypebranding The Basepricetypebranding
     *
     * @return Branding
     */
    public function setBasepricetypebranding($basepricetypebranding)
    {
        $this->basepricetypebranding = self::factory($basepricetypebranding);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'branding' => $this->getBranding(),
            'saleschannel' => $this->getSaleschannel(),
            'fromdate' => $this->getFromdate(),
            'todate' => $this->getTodate(),
            'decimalplaces' => $this->getDecimalplaces()
        );
        
        $arr['type'] = $this->getType();
        if ($this->getPercentage()) {
            $arr['percentage'] = $this->getPercentage();
            
            if ($this->getBasepricetypebranding()) {
                $arr['pricetypebrandingfixedid'] = $this->getBasepricetypebranding()->getId();
            }
        }
        
        return $arr;
    }
    
    /**
     * Return the type
     * 
     * @return string
     */
    public function getType()
    {
        return ($this->getPercentage()) ? 'Percentage' : 'Fixed';
    }
}