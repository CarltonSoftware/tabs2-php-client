<?php

/**
 * This file documents how to create a new booking
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2013 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
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
        
        // Create a new potential booking
        // You could also create a provisional booking too.
        $potentialBooking = new \tabs\apiclient\PotentialBooking();
        $potentialBooking->setType('Enquiry');
        $b->setPotentialbooking($potentialBooking);
        
        $webbooking = new tabs\apiclient\WebBooking();
        $b->setWebbooking($webbooking);
        
        $b->create();
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';