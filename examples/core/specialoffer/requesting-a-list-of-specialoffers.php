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

$offers = new \tabs\apiclient\collection\core\specialoffer\Specialoffer();
$offers->fetch();

try {
    
    if ($id = filter_input(INPUT_GET, 'id')) {
        foreach ($offers as $o) {
            if ($o->getId() == $id) {
                var_dump($o);
                var_dump($o->getBookingperiods()->getElements());
            }
        }
    } else {
        foreach ($offers as $o) {
            echo sprintf(
                '<p><a href="?id=%s">%s</a></p>',
                $o->getId(),
                $o->getDescription()
            );
        }
    }
    
} catch (Exception $ex) {
    var_dump($ex->getMessage());
}