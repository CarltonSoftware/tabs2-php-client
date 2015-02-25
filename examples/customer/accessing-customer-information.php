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

        echo '<h3>Customer</h3>';
        echo sprintf('<p>%s</p>', (string) $customer);
        if (count($customer->getContactAddresses()) > 0) {
            echo '<h3>Contact Addresses</h3>';
            echo implode('<br>', $customer->getContactAddresses());
            echo '<br>';
        }
        if (count($customer->getEmailAddresses()) > 0) {
            echo '<h3>Email Addresses</h3>';
            echo implode('<br>', $customer->getEmailAddresses());
            echo '<br>';
        }
        if (count($customer->getPhoneNumbers()) > 0) {
            echo '<h3>Phone Numbers</h3>';
            echo implode('<br>', $customer->getPhoneNumbers());
            echo '<br>';
        }
        if (count($customer->getBankaccounts()->getElements()) > 0) {
            echo '<h3>Bank Accounts</h3>';
            echo implode('<br>', $customer->getBankaccounts()->getElements());
            echo '<br>';
        }
        if (count($customer->getNotes()->getElements()) > 0) {
            echo '<h3>Notes</h3>';
            echo implode('<br>', $customer->getNotes()->getElements());
            echo '<br>';
        }

    } else {
        $customerCol = new \tabs\apiclient\collection\actor\Customer();
        $customerCol->setLimit(filter_input(INPUT_GET, 'limit'))
            ->setPage(filter_input(INPUT_GET, 'page'))
            ->fetch();

        echo '<h2>' . $customerCol->getTotal() . ' found</h2>';
        
        $pager = $customerCol->getPagination();
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
            $pager->getLimit()
        );
        
        echo ' | ';

        echo sprintf(
            '<a href="?page=%s&limit=%s">Next</a></p>',
            $pager->getNextPage(),
            $pager->getLimit()
        );
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}