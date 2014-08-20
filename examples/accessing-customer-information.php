<?php

/**
 * This file documents how to create a Customer object from the Plato API
 *
 * PHP Version 5.5
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
    
    
//    $customer = \tabs\actor\Customer::get(1);
//    
//    echo sprintf('<p>Tabs Code: %s</p>', $customer->getTabscode());
//    echo sprintf('<p>Name: %s %s</p>', $customer->getTitle(), $customer->getSurname());
//    
//    var_dump($customer);
        
} catch(Exception $e) {
    echo $e->getMessage();
}