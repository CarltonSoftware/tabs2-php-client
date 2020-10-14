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
        // get the rooms configured for the property - these contain the defaults
        $propertyRooms = $booking->getProperty()->getRooms();
        if ($propertyRooms->count() == 0) {
            echo '<p>This property has no rooms configured.</p>';
            exit;
        }

        // get any configured by the guest
        $bookingRooms = $booking->getRooms();

        // merge the two collections
        $mergedRooms = $propertyRooms->map(function ($propertyRoom) use ($bookingRooms) {
            $bookingRoom = $bookingRooms->filter(function ($room) use ($propertyRoom) {
                return $room->getRoom()->getId() == $propertyRoom->getId();
            });
            if ($bookingRoom->count() > 0) {
                return [
                    'property_room' => $propertyRoom,
                    'roomtype_id' => $bookingRoom->first()->getId(),
                    'configured_room' => $bookingRoom->first()->getRoomtype()
                ];
            }

            return [
                'property_room' => $propertyRoom,
                'roomtype_id' => null,
                'configured_room' => $propertyRoom->getRoomtype()
            ];
        });

        echo sprintf(
            '<h5>%d rooms found:</h5><ol>',
            count($mergedRooms)
        );

        foreach ($mergedRooms as $room) {
            echo sprintf(
                '<li>%s<br>%s<br><ul>%s</ul></li>',
                $room['property_room']->getName(),
                $room['property_room']->getDescription(),
                implode('', $room['property_room']->getRoomtypes()->map(function ($roomType) use ($room,$id) {
                    // work out whether a BookingRoom needs adding/editing/deleting
                    if ($roomType->getRoomtype()->getId() == $room['property_room']->getRoomtype()->getId()) {
                        $params = 'op=delete&br='.$room['roomtype_id'];
                    } elseif ($room['roomtype_id']) {
                        $params = 'op=put&br='.$room['roomtype_id'].'&prt='.$roomType->getId();
                    } else {
                        $params = 'op=post&prt='.$roomType->getId();
                    }

                    return sprintf(
                        '<li>%s%s (Sleeps: %d)%s %s</li>',
                        $roomType->getRoomtype()->getId() == $room['configured_room']->getId() ? '<strong>' : '',
                        $roomType->getRoomtype()->getName(),
                        $roomType->getRoomtype()->getSleeps(),
                        $roomType->getRoomtype()->getId() == $room['configured_room']->getId() ? '</strong>' : '',
                        $roomType->getRoomtype()->getId() != $room['configured_room']->getId() ? ' <a href="set-room-configuration.php?id='.$id.'&'.$params.'">set</a>' : ''
                    );
                }))
            );
        }

        echo '</ol>';
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';
