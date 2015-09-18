<?php

/**
 * This file documents how to list special offers
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
require_once __DIR__ . '/../../creating-a-new-connection.php';

$offers = new \tabs\apiclient\collection\core\specialoffer\Specialoffer();
$offers->fetch();

try {
    
    if ($id = filter_input(INPUT_GET, 'id')) {
        foreach ($offers as $o) {
            if ($o->getId() == $id) {
                ?>
<ul>
    <li>Active: <?php echo $o->boolToStr($o->isActive()); ?></li>
    <li>Pricing period: <?php echo $o->getPricingperiod()->getPricingperiod(); ?></li>
    <li>Description: <?php echo $o->getDescription(); ?></li>
    <li>MinHL: <?php echo $o->getMinimumholidaylength(); ?></li>
    <li>MaxHL: <?php echo $o->getMaximumholidaylength(); ?></li>
</ul>

                <?php
                
                $bookingPeriods = $o->getBookingperiods();
                if ($bookingPeriods->getTotal() > 0) {
                    ?>
<h3>Booking periods</h3>
                    <?php
                    foreach ($bookingPeriods as $bp) {
                        echo sprintf(
                            '<p>%s to %s</p>',
                            $bp->getFromdate()->format('d-m-Y'),
                            $bp->getTodate()->format('d-m-Y')
                        );
                    }
                }
                
                $holPeriods = $o->getHolidayperiods();
                if ($holPeriods->getTotal() > 0) {
                    ?>
<h3>Holiday periods</h3>
                    <?php
                    foreach ($holPeriods as $bp) {
                        echo sprintf(
                            '<p>%s to %s</p>',
                            $bp->getFromdate()->format('d-m-Y'),
                            $bp->getTodate()->format('d-m-Y')
                        );
                    }
                }
                
                $brandings = $o->getBrandings()->fetch();
                if ($brandings->getTotal() > 0) {
                    ?>
<h3>Applicable brands</h3>
                    <?php
                    foreach ($brandings as $b) {
                        echo sprintf(
                            '<p>%s</p>',
                            (string) $b->getBranding()
                        );
                    }
                }
            }
        }
    } else {
        foreach ($offers as $o) {
            echo sprintf(
                '<p><a href="?id=%s">%s</a></p>',
                $o->getId(),
                $o->getDescription()
            );
            
            echo sprintf(
                '<ul>'
                . '<li><a href="add-a-booking-period.php?id=%s">Add booking period</a></li>'
                . '<li><a href="add-a-holiday-period.php?id=%s">Add holiday period</a></li>'
                . '</ul>',
                $o->getId(),
                $o->getId()
            );
        }
    }
    
} catch (Exception $ex) {
    var_dump($ex->getMessage());
}