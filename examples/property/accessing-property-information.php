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
    $properties->setLimit(filter_input(INPUT_GET, 'limit'))
            ->setPage(filter_input(INPUT_GET, 'page'))
            ->fetch();

    echo '<h2>' . $properties->getTotal() . ' properties</h2>';

    $pager = $properties->getPagination();

    echo '<ul>';
    foreach ($properties->getElements() as $property) {
        echo sprintf(
            '<li><a href="accessing-property-information.php?id=%s">%s</a></li>',
            $property->getId(),
            $property->getName()
        );
    }
    echo '</ul>';

    echo sprintf(
        '<p><a href="?page=%s&limit=%s"2>&larr; Previous</a>',
        $pager->getPrevPage(),
        $pager->getLimit()
    );

    echo ' &nbsp; | &nbsp; ';

    echo sprintf(
        '<a href="?page=%s&limit=%s">Next &rarr;</a></p>',
        $pager->getNextPage(),
        $pager->getLimit()
    );

    ?>

    <?php
    if ($id = filter_input(INPUT_GET, 'id')) {

        $property = \tabs\apiclient\property\Property::get($id);
        ?>

        <hr />

        <h2><?= $property->getName(); ?></h2>

        <p><?= $property->getAddress(); ?></p>
        <p>Sleeps <?= $property->getSleeps(); ?></p>
        <p><?= $property->getBedrooms(); ?> bedrooms</p>

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

        <h3>Keyholders</h3>
        <ul>
        <?php
        foreach ($property->getKeyholders()->fetch() as $actor) {
            echo sprintf('<li>%s</li>', (string) $actor->getActor());
        }
        ?>
        </ul>

        <h3>Attributes</h3>

        <table>
            <tr>
                <th>Attribute</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th>Value</th>
            </tr>
            <?php
            foreach ($property->getAttributes()->fetch() as $propertyAttribute) {
                $attribute = $propertyAttribute->getAttribute();
                echo sprintf(
                    '<tr><td>%s</td><th>%s</th><td>%s</td><td>%s</td><td>%s</td></tr>',
                    $attribute,
                    $attribute->getName(),
                    $attribute->getDescription(),
                    $attribute->getType(),
                    $propertyAttribute->getValue()
                );
            }
            ?>
        </table>

        <h3>Bookings</h3>

        <table>
            <tr>
                <th>Ref</th>
                <th>Status</th>
                <th>Customer</th>
                <th>From</th>
                <th>To</th>
                <th>Balance</th>
            </tr>
            <?php
            $bookings = $property->getBookings()->fetch();
            foreach ($bookings as $booking) {
                echo sprintf(
                    '<tr><td><a href="../booking/accessing-booking-information.php?id=%u">%s</a></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
                    $booking->getId(),
                    $booking->getBookref(),
                    $booking->getStatus(),
                    '',
                    $booking->getFromdate(),
                    $booking->getTodate(),
                    ''
                );
            }
            ?>
        </table>

        <h3>Descriptions</h3>
        <?php
        $descriptions = $property->getDescriptions()->fetch();
        foreach ($descriptions as $description) {
            echo sprintf('<h4>%s</h4>', $description->getDescriptiontype()->getName());
            echo $description->getDescription();
        }

    }

} catch(Exception $e) {
    echo $e->getMessage();
}