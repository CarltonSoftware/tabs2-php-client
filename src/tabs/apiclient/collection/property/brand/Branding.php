<?php

/**
 * Tabs Rest API Country collection object.
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

namespace tabs\apiclient\collection\property\brand;

/**
 * Tabs Rest API Branding collection object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Branding extends \tabs\apiclient\collection\Collection
{
    /**
     * Return an array of branding objects.  This object will need to be
     * instantiated and the method fetch will need to be called before this will
     * return any elements.
     *
     * @return \tabs\apiclient\property\brand\Branding[]
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
        return 'branding';
    }

    /**
     * @inheritDoc
     */
    public function getElementClass()
    {
        return '\tabs\apiclient\property\brand\Branding';
    }
}
