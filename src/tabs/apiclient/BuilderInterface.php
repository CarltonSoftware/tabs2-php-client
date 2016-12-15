<?php

/**
 * Tabs Rest Crud Interface
 *
 * PHP Version 5.5
 *
 * @category  Interface
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient;

/**
 * Tabs Rest Crud Interface
 *
 * @category  Interface
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
interface BuilderInterface
{
    /**
     * Peform a post request
     * 
     * @return $this
     */
    public function create();
    
    /**
     * Peform an update request
     * 
     * @return $this
     */
    public function update();
    
    /**
     * Peform a delete request
     * 
     * @return $this
     */
    public function delete();
    
    /**
     * Array representation of the object
     * 
     * @return array
     */
    public function toArray();
    
    /**
     * Return a string of the url used for create/updates
     * 
     * @return string
     */
    public function getUrlStub();
}
