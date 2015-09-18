<?php

/**
 * Tabs Rest API Special offer collection object.
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

namespace tabs\apiclient\collection\core\specialoffer;

/**
 * Tabs Rest API Special offer collection object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Specialoffer extends \tabs\apiclient\collection\Collection
{
    /**
     * Return an array of Special offer objects.  This object will need to be
     * instantiated and the method fetch will need to be called before this will
     * return any elements.
     *
     * @return \tabs\apiclient\core\specialoffer\Specialoffer[]
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @inheritDoc
     */
    public function getRoute()
    {
        return 'specialoffer';
    }

    /**
     * @inheritDoc
     */
    public function getElementClass()
    {
        return '\tabs\apiclient\core\specialoffer\Specialoffer';
    }
    
    /**
     * @inheritDoc
     */
    public function discriminator()
    {
        return 'type';
    }
    
    /**
     * @inheritDoc
     */
    public function discriminatorMap()
    {
        return array(
            'Amount' => '\tabs\apiclient\core\specialoffer\SetDiscount',
            'Fixed' => '\tabs\apiclient\core\specialoffer\Fixedprice',
            'Percentage' => '\tabs\apiclient\core\specialoffer\Percentage',
            'PriceType' => '\tabs\apiclient\core\specialoffer\PriceType'
        );
    }
}
