<?php

/**
 * Tabs Rest API property actor object actor collection object.
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

namespace tabs\apiclient\collection\propertyactor;

/**
 * Tabs Rest API property actor object actor collection object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
abstract class PropertyActor extends \tabs\apiclient\collection\Collection
{
    /**
     * Return a property actor if one is active in this current date range
     * 
     * @return boolean|\tabs\apiclient\property\propertyactor\PropertyActor
     */
    public function getCurrent()
    {
        foreach ($this->getElements() as $actor) {
            if ($actor->getFromdate()->getTimestamp() <= time() 
                && $actor->getTodate()->getTimestamp() >= time()
            ) {
                return $actor;
            }
        }
        
        return false;
    }
}