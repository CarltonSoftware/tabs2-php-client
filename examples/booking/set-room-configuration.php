<?php

/**
 * @name Reading the room configuration from a booking
 *
 * This file documents how to retrieve the room configuration requested by the guest on a booking
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $booking = new tabs\apiclient\Booking($id);
        $booking->get(); ?>
        <h2>Booking: <?php echo $booking->getId(); ?> <a href="<?php echo $booking->getTabs2Url(); ?>" target="_blank">view</a></h2>
<?php
        if ($op = filter_input(INPUT_GET, 'op')) {
            switch ($op) {
                // add a new booking room to override the default room type
                case 'post':
                    $bookingRoom = new \tabs\apiclient\booking\Room();
                    $bookingRoom->setRoomroomtypeid(filter_input(INPUT_GET, 'prt'));
                    $bookingRoom->setParent($booking);
                    $bookingRoom->setLastupdatedusing('client');
                    $bookingRoom->create();
                    echo '<p>Booking room added</p>';
                    break;

                // update the booking room to a new room type
                case 'put':
                    $bookingRoom = new \tabs\apiclient\booking\Room(filter_input(INPUT_GET, 'br'));
                    $bookingRoom->setRoomroomtypeid(filter_input(INPUT_GET, 'prt'));
                    $bookingRoom->setParent($booking);
                    $bookingRoom->setLastupdatedusing('client');
                    $bookingRoom->update();
                    echo '<p>Booking room updated</p>';
                    break;

                // remove the booking room to use the default room type
                case 'delete':
                    $bookingRoom = new \tabs\apiclient\booking\Room(filter_input(INPUT_GET, 'br'));
                    $bookingRoom->setParent($booking);
                    $bookingRoom->delete();
                    echo '<p>Booking room deleted, default room type now used</p>';
                    break;
            }
        }
    }

    echo sprintf(
        '<hr /><a href="room-configuration.php?id=%s">back</a>',
        $id
    );

} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';
