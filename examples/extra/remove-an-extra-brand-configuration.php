<?php

/**
 * This file documents how to read an Extra object from the Plato API.
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

if ($eid = filter_input(INPUT_GET, 'eid') 
    && $bid = filter_input(INPUT_GET, 'bid') 
    && $cid = filter_input(INPUT_GET, 'cid')
) {
    $extras = new \tabs\apiclient\collection\core\extra\Extra();
    $extras->fetch();
    
    foreach ($extras as $extra) {
        if ($extra->getId() == $eid) {
            foreach ($extra->getBrandings() as $br) {
                if ($br->getId() == $bid) {
                    foreach ($br->getConfigurations()->fetch() as $cnfg) {
                        if ($cnfg->getId() == $cid) {
                            $cnfg->delete();
                            echo 'Deleted!';
                        }
                    }
                }
            }
        }
    }
}