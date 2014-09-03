<?php

/**
 * This file documents how to read a Customer object from the Plato API.
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
        $customer = \tabs\apiclient\actor\Customer::get($id);

//        echo sprintf('<p>Name: %s</p>', (string) $customer);
//        if (count($customer->getContactAdresses()) > 0) {
//            echo implode('<br>', $customer->getContactAdresses());
//            echo '<br>';
//        }

        var_dump($customer);
    } else {
        $customerCol = new \tabs\apiclient\actor\CustomerCollection();
        $customerCol->setLimit(filter_input(INPUT_GET, 'limit'))
            ->setPage(filter_input(INPUT_GET, 'page'))
            ->fetch();

        $pager = new tabs\apiclient\utility\Pager();
        $pager->setPagination($customerCol->getPagination());

        foreach ($customerCol->getElements() as $customer) {
            echo sprintf(
                '<p><a href="accessing-customer-information.php?id=%s">%s</a></p>',
                $customer->getId(),
                (string) $customer
            );
        }

        echo sprintf(
            '<p><a href="?page=%s&limit=%s">Previous</a>',
            $pager->getPrevPage(),
            $pager->getPagination()->getLimit()
        );
        
        echo ' | ';

        echo sprintf(
            '<a href="?page=%s&limit=%s">Next</a></p>',
            $pager->getNextPage(),
            $pager->getPagination()->getLimit()
        );
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}