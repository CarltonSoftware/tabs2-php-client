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
            echo (string) $property->getBrandings()->first()->getCalendar(new \DateTime('first day of next month'));
        
            if ($property->getMarketingbrands()->count() > 0) {
                ?>
        <p>Marketing Brand: <?php echo $property->getMarketingbrands()->first()->getMarketingbrand()->getName(); ?></p>
                <?php
                
                if ($property->getMarketingbrands()->first()->getBrochures()->count() > 0) {
                    $collection = $property->getMarketingbrands()->first()->getBrochures();
                    include __DIR__ . '/../collection.php';
                    
                    $collection = $property->getMarketingbrands()->first()->getDescriptions();
                    include __DIR__ . '/../collection.php';
                }
            }
        
            if ($property->getDocuments()->count() > 0) {
                $collection = $property->getDocuments();
                include __DIR__ . '/../collection.php';
            }
        ?>
            <p><a href="add-document.php?id=<?php echo $property->getId(); ?>">Add a document</a></p>
            <p><a href="add-image.php?id=<?php echo $property->getId(); ?>">Add an image</a></p>
        <?php
        
            $collection = $property->getNotes();
            include __DIR__ . '/../collection.php';
        ?>
            <p><a href="add-note.php?id=<?php echo $property->getId(); ?>">Add a note</a></p>
        <?php
        
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
        $collection->getPagination()->addFilter('sleeps', 4);
        $collection->fetch();

        include __DIR__ . '/../collection.php';
    }

} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';