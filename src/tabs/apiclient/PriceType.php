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
 * @method string getPricetype() Returns the pricetype
 * @method PriceType setPricetype(string $var) Sets the pricetype
 * 
 * @method string getDescription() Returns the description
 * @method PriceType setDescription(string $var) Sets the description
 * 
 * @method string getPricingperiod() Returns the pricingperiod
 * @method PriceType setPricingperiod(string $var) Sets the pricingperiod
 * 
 * @method integer getPeriods() Returns the periods
 * @method PriceType setPeriods(integer $var) Sets the periods
 * 
 * @method boolean getAdditional() Returns the additional
 * @method PriceType setAdditional(boolean $var) Sets the additional
 * 
 * @method Collection|\tabs\apiclient\pricetype\Branding[] getBrandings() Get the PriceType Brandings
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
}