<?php

/**
 * Tabs Rest API Special offer object.
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

namespace tabs\apiclient\core\specialoffer;
use tabs\apiclient\core\PricingPeriod;
use tabs\apiclient\collection\core\BookingPeriod as BookingPeriodCollection;

/**
 * Tabs Rest API Special offer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \tabs\apiclient\core\pricing\PriceType getPricetype()    Return the discount pricetype
 * @method \tabs\apiclient\core\pricing\PriceType getForpricetype() Return the overwritten pricetype
 */
class PriceType extends Specialoffer
{
    /**
     * Price type applied
     * 
     * @var \tabs\apiclient\core\pricing\PriceType
     */
    protected $pricetype;
    
    /**
     * Price type overwritten
     * 
     * @var \tabs\apiclient\core\pricing\PriceType
     */
    protected $forpricetype;
    
    /**
     * Set the price type
     * 
     * @param \tabs\apiclient\core\pricing\PriceType $pt Price type
     * 
     * @return \tabs\apiclient\core\specialoffer\PriceType
     */
    public function setPricetype($pt)
    {
        $this->pricetype = \tabs\apiclient\core\pricing\PriceType::factory($pt);
        
        return $this;
    }
    
    /**
     * Set the for price type
     * 
     * @param \tabs\apiclient\core\pricing\PriceType $pt Price type
     * 
     * @return \tabs\apiclient\core\specialoffer\PriceType
     */
    public function setForpricetype($pt)
    {
        $this->forpricetype = \tabs\apiclient\core\pricing\PriceType::factory($pt);
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            parent::toArray(),
            array(
                'pricetypeid' => $this->getPricetype()->getId(),
                'forpricetypeid' => $this->getForpricetype()->getId(),
            )
        );
    }
}