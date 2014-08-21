<?php

/**
 * This file documents how to request a json schema from the api.  This is
 * useful in case you wish to check validation on particular endpoints.
 *
 * PHP Version 5.4
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2013 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once 'creating-a-new-connection.php';

try {
    
    $schema = \tabs\utility\Utility::getJsonSchema('customer_create');
    
    var_dump($schema);
        
} catch(Exception $e) {
    echo $e->getMessage();
}