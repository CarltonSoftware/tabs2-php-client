<?php

/**
 * @name Accessing owner data
 *
 * This file documents how to request owner data.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $owner = new tabs\apiclient\Owner($id);
        $owner->get();

        echo '<h3>Owner</h3>';
        echo sprintf('<p>%s</p>', htmlspecialchars((string) $owner));

        if ($owner->getBankaccounts()->count() > 0) {
            $collection = $owner->getBankaccounts();

            include __DIR__ . '/../collection.php';
        }

        echo '<h3>Notes</h3>';
        if ($owner->getNotes()->count() > 0) {
            foreach ($owner->getNotes() as $note) {
                echo sprintf(
                    '<p>%s</p>',
                    $note->getNote()
                );
            }
        }

        if ($owner->getContactdetails()->count() > 0) {
            echo '<h3>Contact Details</h3>';

            $collection = $owner->getContactdetails();

            include __DIR__ . '/../collection.php';
        }

        // Get owner contact permission
        $collection = $owner->getContactdetailpermissions();
        include __DIR__ . '/../collection.php';
        echo sprintf(
            '<p><a href="add-contact-permission.php?id=%s">Add contact permission</a></p>',
            $id
        );

        // Get the customer contacts
        $collection = tabs\apiclient\Collection::factory(
            new \tabs\apiclient\Contact
        );
        $collection->addFilter('recipientid', $owner->getId())
            ->addFilter('contactentitytype', 'Owner')
            ->fetch();
        include __DIR__ . '/../collection.php';

        if ($owner->getDocuments()->count() > 0) {
            echo '<h3>Documents</h3>';
            foreach ($owner->getDocuments()->getElements() as $doc) {
                echo sprintf(
                    '<p><a href="../document/viewing-a-document.php?id=%s">%s</a></p>',
                    $doc->getDocument()->getId(),
                    $doc->getDocument()->getName()
                );
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';
