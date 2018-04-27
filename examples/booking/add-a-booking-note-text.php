<?php

/**
 * @name Adding a booking note text
 * 
 * This file documents how to add a reply to an existing booking note text.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if (filter_input(INPUT_GET, 'bid')) {
        $bn = new tabs\apiclient\note\BookingNote(filter_input(INPUT_GET, 'bnid'));
        $bn->get();
    // Populate the note
    $bn->getNote()->addNotetext('Reply to ' . $bn->getNote()->getSubject());

    header('Location: index.php?id=' . filter_input(INPUT_GET, 'bid'));
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';