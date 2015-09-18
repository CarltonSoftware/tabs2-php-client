<?php

/**
 * This file documents how to request a lists of information from the utility
 * endpoint in the Plato API.
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
    
    if ($id = filter_input(INPUT_GET, 'id')) {
        foreach ($properties as $p) {
            if ($p->getId() == $id) {
                ?>
<ul>
    <li>Name: <?php echo $p->getName(); ?></li>
    <li>Sleeps: <?php echo $p->getSleeps(); ?></li>
    <li>Bedrooms: <?php echo $p->getBedrooms(); ?></li>
    <li>Address: <?php echo (string) $p->getAddress(); ?></li>
</ul>
                <?php
            }
        }
    } else {
        echo '<ul>';
        foreach ($properties as $prop) {
            echo sprintf(
                '<li><a href="?id=%s">%s</a> - Sleeps: %s Bedrooms: %s <br>%s</li>',
                $prop->getId(),
                $prop->getName(),
                $prop->getSleeps(),
                $prop->getBedrooms(),
                (string) $prop->getAddress()
            );
        }
        echo '</ul>';
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}