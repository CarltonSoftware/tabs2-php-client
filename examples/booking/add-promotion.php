<?php

/**
 * @name Adding a promotion
 *
 * This file documents how to add a promotional code onto a booking.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if (($id = filter_input(INPUT_GET, 'id')) && ($code = strtoupper(filter_input(INPUT_GET, 'code')))) {
        $b = new tabs\apiclient\Booking($id);
        $b->get();
        $b->setPromotioncode($code);
        $b->update();

        echo '<p>Promocode ' . $code . ' added to booking ' . $b->getId() . '</p>';

        echo '<p><a href="index.php?id=' . $b->getId() . '">view booking</a></p>';
    }
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';