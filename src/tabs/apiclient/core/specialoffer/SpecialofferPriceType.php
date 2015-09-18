<?php

/**
 * Tabs Rest API Special offer price type object.
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

/**
 * Tabs Rest API Special offer price type object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method \tabs\apiclient\core\PriceType getPricetype() Return the discount pricetype
 */
class SpecialofferPriceType extends Specialoffer
{
    /**
     * Price type applied
     * 
     * @var \tabs\apiclient\core\PriceType
     */
    protected $pricetype;
    
    /**
     * Set the price type
     * 
     * @param \tabs\apiclient\core\PriceType $pt Price type
     * 
     * @return \tabs\apiclient\core\specialoffer\PriceType
     */
    public function setPricetype($pt)
    {
        $this->pricetype = \tabs\apiclient\core\PriceType::factory($pt);
        
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
                'pricetypeid' => $this->getPricetype()->getId()
            )
        );
    }
}