<?php

/**
 * @name Adding a promotion
 * 
 * This file documents how to add a promotional code onto a booking.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking($id);
        $b->get()
            ->setPromotioncode('FLASH20');
    $b->update();

    header('Location: index.php?id=' . $b->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';