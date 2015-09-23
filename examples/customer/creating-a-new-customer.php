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
    $customer = new \tabs\apiclient\actor\Customer();
    $customer->setTitle('Wing Commander')
        ->setFirstname('Joe')
        ->setSurname('Bloggs')
        ->setLanguage('English')
        ->create();

    $contactDetailPostal = new tabs\apiclient\actor\ContactDetailPostal();
    $contactDetailPostal->setAddress(
        array(
            'line1' => 'Buckingham Palace',
            'town' => 'London',
            'country' => array(
                'alpha2' => 'GB'
            )
        )
    );

    $customer->addContactdetail($contactDetailPostal);
    $contactDetailPostal->create();
    
    var_dump($customer);

} catch(Exception $e) {
    var_dump($e);
    echo $e->getMessage();
}