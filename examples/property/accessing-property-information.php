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

    $properties = new \tabs\apiclient\collection\property\Property();
    $properties->fetch();

    ?>

    <h2>All properties</h2>

    <ul>
    <?php
    foreach ($properties as $property) {
        echo sprintf('<li>%s</li>', $property->getName());
    }
    ?>
    </ul>

    <?php
    $property = \tabs\apiclient\property\Property::get(1);
    ?>

    <h2><?= $property->getName(); ?></h2>

    <h3>Cleaners</h3>
    <ul>
    <?php
    foreach ($property->getCleaners()->fetch() as $cleaner) {
        echo sprintf('<li>%s</li>', (string) $cleaner->getCleaner());
    }
    ?>
    </ul>

    <h3>Owners</h3>
    <ul>
    <?php
    foreach ($property->getOwners()->fetch() as $owner) {
        echo sprintf('<li>%s</li>', (string) $owner->getActor());
    }
    ?>
    </ul>

    <?php

} catch(Exception $e) {
    echo $e->getMessage();
}