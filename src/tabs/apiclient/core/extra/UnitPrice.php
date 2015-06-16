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
 * @method float getUnitprice()             Return the cost per unit
 * @method float setUnitprice(float $price) Set the cost per unit
 */
class UnitPrice extends Price
{
    /**
     * Unit price
     * 
     * @var float
     */
    protected $unitprice = 0;
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            parent::toArray(),
            array(
                'pricetype' => 'Unit',
                'unitprice' => $this->getUnitprice()
            )
        );
    }
}