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
 * @method float getLowvalue()  Return the low value of the range
 * @method float getHighvalue() Return the hight value of the range
 * 
 * @method RangePriceUnit setLowvalue(float $val)  Set the low value of the range
 * @method RangePriceUnit setHighvalue(float $val) Set the high value of the range
 */
class RangePriceUnit extends DailyPrice
{
    /**
     * Low price of the range
     * 
     * @var float
     */
    protected $lowvalue = 0;
    
    /**
     * High price of the range
     * 
     * @var float
     */
    protected $highvalue = 99999;


    /**
     * Return the range prices
     * 
     * @return array
     */
    public function getPrices()
    {
        return $this->getDailyprices();
    }
    
    /**
     * Set the range prices
     * 
     * @param array $prices Prices array
     * 
     * @return RangePrice
     */
    public function setPrices(array $prices)
    {
        return $this->setDailyprices($prices);
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = parent::toArray();
        $arr['prices'] = $arr['dailyprices'];
        
        unset($arr['dailyprices']);
        unset($arr['basedon']);
        
        $arr['lowvalue'] = $this->getLowvalue();
        $arr['highvalue'] = $this->getHighvalue();
        
        return $arr;
    }
}