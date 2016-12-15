<?php

/**
 * This file documents how to read PotentialDuplicate objects from the Plato API.
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
    $potentialDuplicates = new \tabs\apiclient\collection\actor\PotentialDuplicate();

    foreach ($potentialDuplicates->fetch() as $duplicate) {
        echo sprintf(
            '<p><a href="accessing-customer-information.php?id=%u">%s</a> and <a href="accessing-customer-information.php?id=%u">%s</a></p>',
            $duplicate->getActor1()->getId(),
            (string) $duplicate->getActor1(),
            $duplicate->getActor2()->getId(),
            (string) $duplicate->getActor2()
        );
    }


} catch(Exception $e) {
    echo $e->getMessage();
}
