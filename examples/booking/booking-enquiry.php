<?php

/**
 * This file documents how to read a Booking objects from the Plato API.
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
        $be = new tabs\apiclient\BookingEnquiry();
        $from = new \DateTime(filter_input(INPUT_GET, 'fromdate'));
        $to = clone $from;
        $to->add(new \DateInterval('P' . $nights . 'D'));
        $be->setFromdate($from)
            ->setTodate($to)
            ->setPropertyBranding(array('id' => $pbi));
        $be->get();
        
        if ($be->getBookingok() == true && $be->getWebbookingok() == true) {
            echo '<p>Basic price:  ' . $be->getBasicPrice() . ' ' . $be->getCurrency()->getCode() . '</p>';
            echo '<p>Included Extras price:  ' . $be->getIncludedExtrasPrice() . ' ' . $be->getCurrency()->getCode() . '</p>';
            echo '<p>Total price:  ' . $be->getTotalPrice() . ' ' . $be->getCurrency()->getCode() . '</p>';
        } else {
            echo (string) $be->getErrors()->first();
        }
        
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';