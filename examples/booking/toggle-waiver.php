<?php

/**
 * This file documents how to toggle a security deposit on a booking. It will
 * be useful if your trying to simulate security deposit waivers.
 *
 * PHP Version 5.5
 * 
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if (filter_input(INPUT_GET, 'id')) {
        $b = new tabs\apiclient\Booking(filter_input(INPUT_GET, 'id'));
        $b->get();
        
        if ($b->getSecuritydeposits()->count() == 1) {
            $b->getSecuritydeposits()->first()->delete();
        } else if ($b->getProperty()->getSecuritydeposits()->count() > 0) {
            foreach ($b->getProperty()->getSecuritydeposits() as $psd) {
                $bs = new \tabs\apiclient\booking\SecurityDeposit();
                $bs->setParent($b);
                $bs->setAmount($psd->getAmount());
                
                $from = clone $b->getBookeddatetime();
                if ($psd->getDaysduein() > 0) {
                    $from->modify('+' . $psd->getDaysduein() . ' days');
                }
                
                $to = clone $from;
                if ($psd->getDaysdueout() > 0) {
                    $to->modify('+' . $psd->getDaysdueout() . ' days');
                }
                
                $bs->setDueindate($from);
                $bs->setDueoutdate($to);
                $bs->create();
            }
        }
        
        header('Location: index.php?id=' . $b->getId());
        exit();
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';