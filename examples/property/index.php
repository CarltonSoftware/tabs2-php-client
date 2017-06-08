<?php

/**
 * This file documents how to read a Property object from the Plato API.
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
    if ($id = filter_input(INPUT_GET, 'id')) {

        $property = new \tabs\apiclient\Property($id);
        $property->get();
        ?>

        <h2><?php echo $property->getName(); ?></h2>
        <p><?php echo $property->getAddress(); ?></p>
        <p>Sleeps <?php echo $property->getSleeps(); ?></p>
        <p><?php echo $property->getBedrooms(); ?> bedrooms</p>
        
        <?php
        
            echo (string) $property->getBrandings()->first()->getCalendar();
            $today = new \DateTime(
                filter_input(INPUT_GET, 'fromdate') ? filter_input(INPUT_GET, 'fromdate') : 'first day of next month'
            );
            $cal = $property->getBrandings()->first()->getCalendar(
                $today,
                array(
                    'cal_cell_content' => '<a href="booking-enquiry?=fromdate={id}">{content}</a>'
                )
            );
            $cal->setProcessDay(function($cell, $day) use ($property) {
                if ($day && $day->getDaysavailable() > 0) {
                    $cell = str_replace(
                        '{content}',
                        sprintf(
                            '<a href="../booking/booking-enquiry.php?fromdate=%s&propertybrandingid=%s">%s</a>',
                            $day->getDate()->format('Y-m-d'),
                            $property->getBrandings()->first()->getId(),
                            $day->getDate()->format('j')
                        ),
                        $cell
                    );
                }
                
                return $cell;
            });
            echo (string) $cal;
            $next = new \DateTime($cal->getTargetMonth()->format('Y-m-d'));
            $next->add(new \DateInterval('P1M'));
            
            echo sprintf(
                '<p><a href="?id=%s&fromdate=%s">Next</a></p>',
                $property->getId(),
                $next->format('Y-m-d')
            );
        
            if ($property->getBrandings()->first() 
                && $marketingBrand = $property->getBrandings()->first()->getMarketingBrand()
                && !filter_input(INPUT_GET, 'fromdate')
            ) {
                ?>
        <p>Marketing Brand: <?php echo $marketingBrand->getMarketingbrand()->getName(); ?></p>
                <?php
                
                $collection = $marketingBrand->getBrochures();
                include __DIR__ . '/../collection.php';

                $collection = $marketingBrand->getDescriptions();
                include __DIR__ . '/../collection.php';

                $collection = $marketingBrand->getGroupingvalues();
                include __DIR__ . '/../collection.php';
            }
        
            if ($property->getDocuments()->count() > 0) {
                ?><p>Documents limited to 2</p><?php
                $collection = $property->getDocuments()->findBy(function($ele) {
                    return $ele->getDocument() instanceof tabs\apiclient\Image && !$ele->getDocument()->isPrivate();
                })->slice(0, 2);
                include __DIR__ . '/../collection.php';
            }
        ?>
            <p><a href="add-document.php?id=<?php echo $property->getId(); ?>">Add a document</a></p>
            <p><a href="add-image.php?id=<?php echo $property->getId(); ?>">Add an image</a></p>
        <?php
            if (!filter_input(INPUT_GET, 'fromdate')) {
                $collection = $property->getNotes();
                include __DIR__ . '/../collection.php';
            }
        ?>
            <p><a href="add-note.php?id=<?php echo $property->getId(); ?>">Add a note</a></p>
        <?php
        
            if (!filter_input(INPUT_GET, 'fromdate')) {
                $collection = $property->getInspections();
                include __DIR__ . '/../collection.php';

                $collection = $property->getPrimarypropertybranding()->getPrices();
                include __DIR__ . '/../collection.php';

                $collection = $property->getAttributes();
                include __DIR__ . '/../collection.php';

                $collection = $property->getBrandings()->first()->getAvailableDays();
                include __DIR__ . '/../collection.php';

                $collection = $property->getSuppliers();
                include __DIR__ . '/../collection.php';

                $collection = $property->getTargets();
                include __DIR__ . '/../collection.php';

                $collection = $property->getRooms();
                include __DIR__ . '/../collection.php';
            }
        
    } else {

        $collection = tabs\apiclient\Collection::factory(
            'property',
            new \tabs\apiclient\Property
        );
        $collection->setLimit(filter_input(INPUT_GET, 'limit'))
            ->setPage(filter_input(INPUT_GET, 'page'))
            ->fetch();

        include __DIR__ . '/../collection.php';
        
        // Search for properties sleeping 4 people
        $collection = tabs\apiclient\Collection::factory(
            'property',
            new \tabs\apiclient\Property
        );
        $collection->setLimit(filter_input(INPUT_GET, 'limit'))
            ->setPage(filter_input(INPUT_GET, 'page'));
        $collection->addFilter('sleeps', 4);
        $collection->fetch();

        include __DIR__ . '/../collection.php';
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';