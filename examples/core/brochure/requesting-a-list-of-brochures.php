<?php

/**
 * This file documents how to create a new brochure
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

$brochures = new \tabs\apiclient\collection\core\Brochure();
$brochures->fetch();

try {
    
    if ($id = filter_input(INPUT_GET, 'id')) {
        foreach ($brochures as $b) {
            if ($b->getId() == $id) {
                $requests = $b->getRequests();
                
                var_dump($requests->fetch());
            }
        }
    } else {
        foreach ($brochures as $b) {
            echo sprintf(
                '<p><a href="?id=%s">%s</a></p>',
                $b->getId(),
                $b->getName()
            );
        }
    }
    
} catch (Exception $ex) {
    var_dump($ex->getMessage());
}