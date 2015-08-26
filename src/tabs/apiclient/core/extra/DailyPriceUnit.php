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
 * @method integer getDays()       Return the number of days applicable
 * @method boolean getAdditional() Return whether additional days are applicable
 * @method float   getPrice()      Return the price
 * 
 * @method DailyPriceUnit setDays(integer $days)             Set the number of days
 * @method DailyPriceUnit setAdditional(boolean $additional) Set additional days
 * @method DailyPriceUnit setPrice(float $price)             Set the price
 */
class DailyPriceUnit extends \tabs\apiclient\core\Base
{
    /**
     * Number of days this price applies to
     * 
     * @var integer
     */
    protected $days = 7;
    
    /**
     * Bool to flag if the config is to be used in the additional days
     * 
     * @var boolean
     */
    protected $additional = false;
    
    /**
     * Extra price
     * 
     * @var float
     */
    protected $price = 0;
    
    /**
     * ToArray func
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'days' => $this->getDays(),
            'additional' => $this->boolToStr($this->getDays()),
            'price' => $this->getPrice()
        );
    }
}