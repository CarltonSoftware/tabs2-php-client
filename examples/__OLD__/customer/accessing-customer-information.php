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
        echo sprintf('<p>%s</p>', htmlspecialchars((string) $customer));
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

        echo '<h3>Notes</h3>';
        if (count($customer->getNotes()->getElements()) > 0) {
            echo implode('<br />', $customer->getNotes()->getElements());
            echo '<br>';
        }
        echo sprintf(
            '<p><a href="add-note.php?customer=%s">Add new note</a></p>',
            $customer->getId()
        );

        echo '<h3>Documents</h3>';
        if (count($customer->getDocuments()->getElements()) > 0) {
            foreach ($customer->getDocuments()->getElements() as $doc) {                
                echo sprintf(
                    '<p><a href="viewing-a-document.php?id=%s">%s</a></p>',
                    $doc->getDocument()->getId(),
                    $doc->getDocument()->getName()
                );
            }
        }
        echo sprintf(
            '<p><a href="add-document.php?id=%s">Add new document</a></p>',
            $customer->getId()
        );

        $bookings = $customer->getBookings()->fetch();
        if ($bookings->getTotal() > 0) {
            ?>
            <h3>Bookings</h3>
            <table>
                <tr>
                    <th>Ref</th>
                    <th>Status</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
                <?php
                foreach ($bookings as $booking) {
                    echo sprintf(
                        '<tr><td><a href="../booking/accessing-booking-information.php?id=%u">%s</a></td>' .
                        '<td>%s</td><td>%s</td><td>%s</td></tr>',
                        $booking->getId(),
                        $booking->getBookref(),
                        $booking->getStatus(),
                        $booking->getFromdate(),
                        $booking->getTodate()
                    );
                }
            ?>
            </table>
            <?php
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
                htmlspecialchars((string) $customer)
            );
        }

        echo sprintf(
            '<p><a href="?page=%s&limit=%s"2>&larr; Previous</a>',
            $pager->getPrevPage(),
            $pager->getLimit()
        );

        echo ' &nbsp; | &nbsp; ';

        echo sprintf(
            '<a href="?page=%s&limit=%s">Next &rarr;</a></p>',
            $pager->getNextPage(),
            $pager->getLimit()
        );
    }

} catch(Exception $e) {
    echo $e->getMessage();
}