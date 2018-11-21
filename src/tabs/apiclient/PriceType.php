<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PriceType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PriceType setPricetype(string $var) Sets the pricetype
 * 
 * @method PriceType setDescription(string $var) Sets the description
 * 
 * @method PriceType setPricingperiod(string $var) Sets the pricingperiod
 * 
 * @method PriceType setPeriods(integer $var) Sets the periods
 * 
 * @method PriceType setAdditional(boolean $var) Sets the additional
 * 
 */
class PriceType extends Builder
{
    /**
     * Pricetype
     *
     * @var string
     */
    protected $pricetype;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Pricingperiod
     *
     * @var string
     */
    protected $pricingperiod;

    /**
     * Periods
     *
     * @var integer
     */
    protected $periods;

    /**
     * Additional
     *
     * @var boolean
     */
    protected $additional;
    
    /**
     * Price Type Brandings
     * 
     * @var Collection|Branding[]
     */
    protected $brandings;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->brandings = Collection::factory(
            'branding',
            new \tabs\apiclient\pricetype\Branding,
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'pricetype' => $this->getPricetype(),
            'description' => $this->getDescription(),
            'pricingperiod' => $this->getPricingperiod(),
            'periods' => $this->getPeriods(),
            'additional' => $this->getAdditional()
        );
    }

    /**
     * Returns the pricetype
     *
     * @return string
     */
    public function getPricetype()
    {
        return $this->pricetype;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the pricingperiod
     *
     * @return string
     */
    public function getPricingperiod()
    {
        return $this->pricingperiod;
    }

    /**
     * Returns the periods
     *
     * @return integer
     */
    public function getPeriods()
    {
        return $this->periods;
    }

    /**
     * Returns the additional
     *
     * @return boolean
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    /**
     * Get the PriceType Brandings
     *
     * @return Collection|\tabs\apiclient\pricetype\Branding[]
     */
    public function getBrandings()
    {
        return $this->brandings;
    }
}