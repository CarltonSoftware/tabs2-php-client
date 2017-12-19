<?php

/**
 * @name Creating a booking
 * 
 * This file documents how to create a new booking.
 * 
 * Its useful for customer bookings to have a potential booking type associated with them.  In this example the type is Enquiry.
 * 
 * You can get a list of potential booking types from the [common data in the api](../core).
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'fromdate') 
        && $pbi = filter_input(INPUT_GET, 'propertybrandingid')
    ) {
        $nights = filter_input(INPUT_GET, 'nights') ? filter_input(INPUT_GET, 'nights') : 7;
        $b = new tabs\apiclient\Booking();
        $from = new \DateTime(filter_input(INPUT_GET, 'fromdate'));
        $to = clone $from;
        $to->add(new \DateInterval('P' . $nights . 'D'));
        $b->setFromdate($from)
            ->setTodate($to)
            ->setPropertyBranding(array('id' => $pbi))
            ->setAdults(1)
            ->setPets(0);
    if (filter_input(INPUT_GET, 'saleschannelid')) {
        $sc = new \tabs\apiclient\SalesChannel(
            filter_input(INPUT_GET, 'saleschannelid')
        );
        $b->setSaleschannel(
            $sc->get()
        );
    }

    // Create a new potential booking
    // You could also create a provisional booking too.
    $potentialBooking = new \tabs\apiclient\PotentialBooking();
    $potentialBooking->setType('Enquiry');
    $b->setPotentialbooking($potentialBooking);

    $webbooking = new tabs\apiclient\WebBooking();
    $b->setWebbooking($webbooking);

    // You can also create a single note when creating the booking
    $note = new \tabs\apiclient\Note();

    // Create a note type
    $noteType = new tabs\apiclient\Notetype();
    $noteType->setDescription('A normal bog standard note.')
        ->setType('normal');

    // Get an actor who created the note
    $me = tabs\apiclient\client\Client::getClient()->whoami();

    // Alternatively, the tabsuser with id 1 will be system that you can use by
    // using $system = new Tabsuser(1);
    // This would negate the need to call this endpoint saving you an
    // api request

    // Populate the note
    $note->setSubject('Adipiscing rhubarb')
        ->setCreatedby($me)
        ->setNotetype($noteType)
        ->addNotetext('Lorem ipsum dolor sit amet');

    $b->addNote($note);

    $b->create();

    header('Location: index.php?id=' . $b->getId());
    exit();
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';