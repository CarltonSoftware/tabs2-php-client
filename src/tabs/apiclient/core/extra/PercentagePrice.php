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
 * @method float  getPercentage() Get the percentage
 * @method string getBasedon()    Get the based on price indentifier
 * 
 * @method PercentagePrice setPercentage(integer $percentage) Set the percentage
 * @method PercentagePrice setBasedon(string $basedon)        Set the based on string
 */
class PercentagePrice extends Price
{
    /**
     * Percentage base
     * 
     * @var float
     */
    protected $percentage = 100;
    
    /**
     * Percentage based on value.  Brochure or Basic
     * 
     * @var string
     */
    protected $basedon = 'Brochure';
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array_merge(
            parent::toArray(),
            array(
                'pricetype' => 'Percentage',
                'percentage' => $this->getPercentage(),
                'basedon' => $this->getBasedon()
            )
        );
    }
}