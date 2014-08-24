<?php

/**
 * Collection Interface
 *
 * PHP Version 5.4
 *
 * @category  Interface
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\core;

/**
 * Collection Interface
 *
 * @category  Interface
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
interface CollectionInterface
{
    /**
     * Return the elements of the collection
     * 
     * @return array
     */
    public function getElements();
    
    /**
     * Return the route which will provide the collection information
     * 
     * @return string
     */
    public function getRoute();
}
