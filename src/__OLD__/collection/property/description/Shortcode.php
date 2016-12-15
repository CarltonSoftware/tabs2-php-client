<?php

/**
 * Tabs Rest API Property description type shortcode object.
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

namespace tabs\apiclient\collection\property\description;

/**
 * Tabs Rest API Property description type shortcode object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Shortcode extends \tabs\apiclient\collection\Collection
{   
    /**
     * Return an array of description type shortcode objects.  This object will 
     * need to be instantiated and the method fetch will need to be called 
     * before this will return any elements.
     *
     * @return \tabs\apiclient\property\description\Shortcode[]
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
        return 'descriptiontypeshortcode';
    }

    /**
     * @inheritDoc
     */
    public function getElementClass()
    {
        return '\tabs\apiclient\property\description\Shortcode';
    }
}