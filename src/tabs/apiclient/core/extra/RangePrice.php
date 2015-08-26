<?php

/**
 * Tabs Rest API Extra unit price object.
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

namespace tabs\apiclient\core\extra;

/**
 * Tabs Rest API Extra unit price object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method RangePriceUnit[] getRanges()  Return the price ranges
 * @method string           getBasedon() Get the based on price indentifier
 * 
 * @method RangePrice       setBasedon(string $basedon) Set the based on string
 */
class RangePrice extends Price
{
    /**
     * Price ranges
     * 
     * @var array
     */
    protected $ranges = array();
    
    /**
     * Percentage based on value.  Brochure or Basic
     * 
     * @var string
     */
    protected $basedon = 'Brochure';
    
    /**
     * Set the daily prices
     * 
     * @param array $prices Pricing
     * 
     * @return \tabs\apiclient\core\extra\RangePrice
     */
    public function setRanges(array $prices)
    {
        foreach ($prices as $p) {
            $rpu = RangePriceUnit::factory($p);
            $this->addPriceRange($rpu);
        }
        
        return $this;
    }
    
    /**
     * Add a daily price to the Price object
     * 
     * @param \tabs\apiclient\core\extra\RangePriceUnit $rpu Range price unit object
     * 
     * @return \tabs\apiclient\core\extra\RangePrice
     */
    public function addPriceRange(RangePriceUnit &$rpu)
    {
        $rpu->setParent($this);
        $this->ranges[md5($rpu->getLowvalue() . $rpu->getHighvalue())] = $rpu;
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $rps = array();
        foreach ($this->getRanges() as $rpu) {
            $rps[] = $rpu->toArray();
        }
        
        return array_merge(
            parent::toArray(),
            array(
                'pricetype' => 'Range',
                'ranges' => $rps,
                'basedon' => $this->getBasedon()
            )
        );
    }
}