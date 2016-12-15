<?php

/**
 * This file documents how to add a booking period
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
                
                $hp = new tabs\apiclient\core\specialoffer\HolidayPeriod();
                $hp->setFromdate(new \DateTime())
                    ->setTodate(new \DateTime())
                    ->setDonotsplit(true);
                
                $o->addHolidayperiod($hp);
                $hp->create();
                
                echo 'Created!';
            }
        }
    }
    
} catch (Exception $ex) {
    var_dump($ex->getMessage());
}