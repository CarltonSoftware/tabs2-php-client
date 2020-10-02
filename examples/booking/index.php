<?php

/**
 * @name Accessing booking data
 *
 * This example details some of the basic properties on a booking.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
    $booking = new \tabs\apiclient\Booking($id);
    $booking->get();

    ?>
        <h2>Booking: <?php echo $booking->getId(); ?> <a href="<?php echo $booking->getTabs2Url(); ?>" target="_blank">view</a></h2>
        <p>From: <?php echo $booking->getFromdate()->format('Y-m-d'); ?></p>
        <p>To: <?php echo $booking->getTodate()->format('Y-m-d'); ?></p>
        <p>Booked: <?php echo $booking->getBookeddatetime()->format('Y-m-d H:i:s'); ?></p>
        <p>Property: <a href='../property?id=<?php echo $booking->getProperty()->getId(); ?>'><?php echo $booking->getProperty()->getName(); ?></a></p>
        <p>Status: <?php echo $booking->getStatus(); ?>
    <?php
        if (!$booking->isProvisional() && !$booking->isCancelled()) {
            ?>
        <p><a href="provisional-booking.php?id=<?php echo $booking->getId(); ?>">Create provisional booking</a></p>
            <?php
        }

        if (!$booking->isConfirmed() && $booking->isProvisional()) {
            ?>
        <p>Deposit amount: <?php echo $booking->getProvisionalbooking()->getDeposit(); ?></p>
        <p>Deposit due: <?php echo $booking->getProvisionalbooking()->getDepositduedate()->format('d F Y'); ?></p>
        <p><a href="confirm-booking.php?id=<?php echo $booking->getId(); ?>">Confirm booking</a></p>
            <?php
        }

        if (!$booking->isCancelled()) {
            ?>
        <p><a href="cancel-booking.php?id=<?php echo $booking->getId(); ?>">Cancel booking</a></p>
            <?php
        }

        if ($booking->getCustomers()->count() == 0) {
            ?>
        <p><a href="add-customer.php?id=<?php echo $booking->getId(); ?>">Add booking customer</a></p>
            <?php
        } else {
            ?>
        <p>Customer: <a href='../actor?id=<?php echo $booking->getCustomers()->first()->getCustomer()->getId(); ?>'>
            <?php echo $booking->getCustomers()->first()->getCustomer()->getFullname(); ?></a>
        </p>
            <?php
        }

        if ($booking->getGuests()->count() == 0) {
            ?>
        <p><a href="add-guests.php?id=<?php echo $booking->getId(); ?>">Add booking guest</a></p>
            <?php
        } else {
            $collection = $booking->getGuests();
            include __DIR__ . '/../collection.php';
        }

        if ($booking->getProperty()->getMaximumpets() >= 2) {
            ?>
        <p><a href="adding-pets.php?id=<?php echo $booking->getId(); ?>">Add 2 pets to this booking</a></p>
            <?php
        }

        ?>
            <p><a href="add-promotion.php?id=<?php echo $booking->getId(); ?>">Add a promotional code</a></p>
        <?php

        ?>
        <p>Total paid: £<?php echo $booking->getTotalPaid(); ?></p>
        <?php
        if ($booking->getTotalOutstanding() > 0 && $booking->getCustomers()->count() > 0) {
            ?>
        <p><a href="create-sagepayment.php?id=<?php echo $booking->getId(); ?>">Add Payment</a></p>
            <?php
        }

        echo '<h5>Price</h5>';
        echo '<p>Brochure: £' . $booking->getBrochurePrice() . '</p>';
        echo '<p>Party saving: £' . $booking->getPartySizeSaving() . '</p>';
        echo '<p>Promotional code saving: £' . $booking->getPromotionCodeSaving() . '</p>';
        echo '<p>Special offer saving: £' . $booking->getSpecialOfferSaving() . '</p>';

        $extras = $booking->getExtras()->findBy(function($ele) {
            return !$ele->getConfiguration()->isIncluded();
        });
        if ($extras->count() > 0) {
            foreach ($extras as $extra) {
                echo sprintf(
                    '<p>%s: %s x £%s <a href="remove-extra.php?id=%s&beid=%s">Remove</a></p>',
                    $extra->getExtra()->getDescription(),
                    $extra->getQuantity(),
                    $extra->getUnitprice(),
                    $booking->getId(),
                    $extra->getId()
                );
            }
        }
        echo '<p>Total: £' . $booking->getTotalPrice() . '</p>';

        if ($booking->getSecuritydeposit()) {
            echo sprintf(
                '<p>Security deposit: £%s <a href="remove-sd.php?id=%s&bsid=%s">Remove</a></p>',
                $booking->getSecuritydeposit()->getAmount(),
                $booking->getId(),
                $booking->getSecuritydeposit()->getId(),
                $booking->getId()
            );
        } else if ($booking->getProperty()->getSecuritydeposits()->count() > 0) {
            foreach ($booking->getProperty()->getSecuritydeposits() as $psd) {
                echo sprintf(
                    '<p><a href="add-sd.php?id=%s&psdid=%s">Add %s security deposit</a></p>',
                    $booking->getId(),
                    $psd->getId(),
                    $psd->getDescription()
                );
            }
        }

        // Get the booking notes
        $notes = $booking->getNotes();
        if ($notes->count() > 0) {
            echo '<h5>Notes</h5>';
            echo implode('', $notes->map(function($bn) use ($booking) {
                return '<p>' . $bn->getNote()->getSubject() . '</p><ul>'
                    . implode('', $bn->getNote()->getNotetexts()->map(function($nt) {
                        return '<li>' . (string) $nt . '</li>';
                    })) . '</ul>'
                    . '<p><a href="add-a-booking-note-text.php?bid=' . $booking->getId() . '&bnid=' . $bn->getId() . '">Add reply</a></p>'
                ;
            }));
            echo '<p><a href="add-a-booking-note.php?id=' . $booking->getId() . '">Add a booking note</a></p>';
        }

        // Vehicles
        $collection = $booking->getVehicles();
        include __DIR__ . '/../collection.php';

        // Rooms
        $collection = $booking->getRooms();
        include __DIR__ . '/../collection.php';

        // Get the branding extras and output list of available
        $extras = $booking->getBranding()->getExtras();
        if ($extras->count() > 0) {
            echo '<h5>Available extras</h5>';
            foreach ($extras as $extra) {
                echo sprintf(
                    '<p>%s <a href="add-extra.php?id=%s&eid=%s">Add</a></p>',
                    $extra->getExtra()->getDescription(),
                    $booking->getId(),
                    $extra->getExtra()->getId()
                );
            }
        }
} else {

    $collection = tabs\apiclient\Collection::factory(
        'booking',
        new \tabs\apiclient\Booking
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