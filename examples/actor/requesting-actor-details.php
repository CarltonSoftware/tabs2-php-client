<?php

/**
 * This file documents how to request a lists of brochure requests;
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';



try {

    if ($id = filter_input(INPUT_GET, 'id')) {
        $customer = new tabs\apiclient\Customer($id);
        $customer->get();

        echo '<h3>Customer</h3>';
        echo sprintf('<p>%s</p>', htmlspecialchars((string) $customer));
        
        if ($customer->getBankaccounts()->count() > 0) {
            echo '<h3>Bank Accounts</h3>';
            echo implode('<br>', $customer->getBankaccounts()->getElements());
            echo '<br>';
        }

        echo '<h3>Notes</h3>';
        if ($customer->getNotes()->count() > 0) {
            foreach ($customer->getNotes() as $note) {                
                echo sprintf(
                    '<p>%s</p>',
                    $note->getNote()
                );
            }
        }
        echo sprintf(
            '<p><a href="add-note.php?id=%s">Add new note</a></p>',
            $customer->getId()
        );

        if ($customer->getDocuments()->count() > 0) {
            echo '<h3>Documents</h3>';
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

        if ($customer->getContactdetails()->count() > 0) {
            echo '<h3>Contact Details</h3>';
            
            $collection = $customer->getContactdetails();
            
            include __DIR__ . '/../collection.php';
        }
        echo sprintf(
            '<p><a href="add-email.php?id=%s">Add new email</a></p>',
            $customer->getId()
        );

//        $bookings = $customer->getBookings()->fetch();
//        if ($bookings->getTotal() > 0) {
//            ?>
            <h3>Bookings</h3>
            <table>
                <tr>
                    <th>Ref</th>
                    <th>Status</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
                <?php
//                foreach ($bookings as $booking) {
//                    echo sprintf(
//                        '<tr><td><a href="../booking/accessing-booking-information.php?id=%u">%s</a></td>' .
//                        '<td>%s</td><td>%s</td><td>%s</td></tr>',
//                        $booking->getId(),
//                        $booking->getBookref(),
//                        $booking->getStatus(),
//                        $booking->getFromdate(),
//                        $booking->getTodate()
//                    );
//                }
//            ?>
            </table>
            <?php
//        }

    } else {
        $collection = tabs\apiclient\Collection::factory(
            'customer',
            new \tabs\apiclient\Customer
        );
        
        $collection->setLimit(filter_input(INPUT_GET, 'limit'))
            ->setPage(filter_input(INPUT_GET, 'page'))
            ->fetch();

        include __DIR__ . '/../collection.php';
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';