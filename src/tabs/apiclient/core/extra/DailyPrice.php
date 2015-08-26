<?php

/**
 * Tabs Rest API Extra daily price object.
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
 * Tabs Rest API Extra daily price object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method DailyPriceUnit[] getDailyprices() Return the dailyprices
 */
class DailyPrice extends Price
{
    /**
     * Daily prices
     * 
     * @var array
     */
    protected $dailyprices = array();
    
    /**
     * Set the daily prices
     * 
     * @param array $prices Pricing
     * 
     * @return \tabs\apiclient\core\extra\DailyPrice
     */
    public function setDailyprices(array $prices)
    {
        foreach ($prices as $p) {
            $dpu = DailyPriceUnit::factory($p);
            $this->addDailyprice($dpu);
        }
        
        return $this;
    }
    
    /**
     * Add a daily price to the Price object
     * 
     * @param \tabs\apiclient\core\extra\DailyPriceUnit $dpu Daily price object
     * 
     * @return \tabs\apiclient\core\extra\DailyPrice
     */
    public function addDailyprice(DailyPriceUnit &$dpu)
    {
        $dpu->setParent($this);
        $this->dailyprices[md5($dpu->getDays() . $dpu->getAdditional())] = $dpu;
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $dps = array();
        foreach ($this->getDailyprices() as $dp) {
            $dps[] = $dp->toArray();
        }
        
        return array_merge(
            parent::toArray(),
            array(
                'pricetype' => 'Daily',
                'dailyprices' => $dps
            )
        );
    }
}