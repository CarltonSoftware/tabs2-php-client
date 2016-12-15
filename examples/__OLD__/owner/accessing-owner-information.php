<?php

/**
 * This file documents how to read an Owner object from the Plato API.
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2015 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    $owners = new \tabs\apiclient\collection\actor\Owner();
    $owners->fetch();

    echo sprintf('<h2>%u owners</h2>', $owners->getTotal());

    echo '<ul>';
    foreach ($owners as $owner) {
        echo sprintf(
            '<li><a href="?id=%u">%s</a></li>',
            $owner->getId(),
            $owner
        );
    }
    echo '</ul>';

    if ($id = filter_input(INPUT_GET, 'id')) {
        echo '<hr />';

        $owner = \tabs\apiclient\actor\Owner::get($id);
        echo sprintf('<h2>%s</h2>', $owner);

        $bookings = $owner->getBookings()->fetch();
        echo sprintf('<h3>%u bookings</h3>', $bookings->getTotal());
        ?>
        <table>
            <tr>
                <th>Ref</th>
                <th>From</th>
                <th>To</th>
            </tr>
            <?php
            foreach ($bookings as $booking) {
                echo sprintf(
                    '<tr><td><a href="../booking/accessing-booking-information.php?id=%u">%s</a></td>' .
                    '<td>%s</td><td>%s</td></tr>',
                    $booking->getId(),
                    $booking->getBookref(),
                    $booking->getFromdate(),
                    $booking->getTodate()
                );
            }
            ?>
        </table>

        <?php

    }

} catch(Exception $e) {
    echo $e->getMessage();
}
