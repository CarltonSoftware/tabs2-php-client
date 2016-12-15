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
) {
    $extras = new \tabs\apiclient\collection\core\Extra();
    $extras->fetch();
    
    foreach ($extras as $extra) {
        if ($extra->getId() == $eid) {
            foreach ($extra->getBrandings() as $br) {
                if ($br->getId() == $bid) {
                    
                    $vatbands = new tabs\apiclient\collection\core\Vatband();
                    $vatbands->fetch();
                    $vatband = array_filter($vatbands->getElements(), function($ele) {
                        return $ele->getVatband() == 'Standard';
                    });
                    
                    $vatband = array_shift($vatband);
                    
                    $cnfg = new tabs\apiclient\core\extra\BrandExtraConfiguration();
                    $cnfg->setFromdate(new \DateTime())
                        ->setTodate(new \DateTime('2029-12-31'))
                        ->setVatband($vatband)
                        ->setParent($br)
                        ->create();
                    
                    echo 'created!';
                }
            }
        }
    }
}