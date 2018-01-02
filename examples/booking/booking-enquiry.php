<?php

/**
 * @name Performing a booking enquiry
 * 
 * This file documents how to do a booking enquiry.  
 * 
 * You can also add adults, children, infants and pets to the enquiry (using the respective setter methods) to get a more specific price.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'fromdate') 
        && $pbi = filter_input(INPUT_GET, 'propertybrandingid')
    ) {
        $nights = filter_input(INPUT_GET, 'nights') ? filter_input(INPUT_GET, 'nights') : 7;
        $be = new tabs\apiclient\BookingEnquiry();
        $from = new \DateTime(filter_input(INPUT_GET, 'fromdate'));
        $to = clone $from;
        $to->add(new \DateInterval('P' . $nights . 'D'));
        // Specify the sales channel (optional)
        $sc = tabs\apiclient\Collection::factory(new \tabs\apiclient\SalesChannel());
        $sc->fetch();
        $bw = $sc->findBy(function($s) {
            return $s->getSaleschannel() === 'Brand Website';
        });
        $salesChannel = ($bw->count() === 1) ? $bw->first() : $sc->first();

        $be->setFromdate($from)
            ->setTodate($to)
            ->setPropertyBranding(array('id' => $pbi))
            ->setSaleschannel($salesChannel)
            ->get();

    if ($be->getBookingok() == true && $be->getWebbookingok() == true) {
        echo '<p>Basic price:  ' . $be->getBasicPrice() . ' ' . $be->getCurrency()->getCode() . '</p>';
        echo '<p>Included Extras price:  ' . $be->getIncludedExtrasPrice() . ' ' . $be->getCurrency()->getCode() . '</p>';
        echo '<p>Total price:  ' . $be->getTotalPrice() . ' ' . $be->getCurrency()->getCode() . '</p>';
        echo sprintf(
            '<p><a href="create-booking.php?fromdate=%s&propertybrandingid=%s&saleschannelid=%s">Create new booking</a></p>',
            $be->getFromdate()->format('Y-m-d'),
            $be->getPropertyBranding()->getId(),
            $be->getSaleschannel()->getId()
        );
    } else {
        echo (string) $be->getErrors()->first();
    }

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';