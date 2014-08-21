<?php

/**
 * This file documents how to create a Customer object from the Plato API.
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
    $customer = new \tabs\actor\Customer();
    $customer->setTitle('Mr')->setFirstname('Joe')->setSurname('Bloggs')->setLanguage('English')->create();
    
    $address = new tabs\actor\ContactAddress();
    $address->setAddress(
        \tabs\core\Address::factory(
            array(
                'line1' => 'Buckingham Palace',
                'town' => 'London',
                'country' => 'United Kingdom'
            )
        )
    );
    
    $customer->addContact($address);
    $address->create();
    
    var_dump($customer);
        
} catch(Exception $e) {
    echo $e->getMessage();
}