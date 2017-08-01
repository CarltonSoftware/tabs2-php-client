<?php

/**
 * This file documents how to add a new phone number to a customer with the Plato API.
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
require_once __DIR__ . '/../creating-a-new-connection.php';

try {

    if ($id = filter_input(INPUT_GET, 'id')) {
        
        $customer = new tabs\apiclient\Customer($id);
        $customer->get();
        $customer->setPhonenumber('447795500123');
        
        header('Location: index.php?id=' . $customer->getId());
        
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}