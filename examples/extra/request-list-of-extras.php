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

try {
    echo '<h4>Extras</h4>';
    $extras = new \tabs\apiclient\collection\core\Extra();
    $extras->fetch();
    
    foreach ($extras as $extra) {
        echo '<p>' . (string) $extra;
        if ($extra->getBrandings()->getTotal() > 0) {
            echo '<ol>';
           
            foreach ($extra->getBrandings() as $br) {
                $br->getConfigurations()->fetch();
                
                echo sprintf(
                    '<li>%s<a href="delete-an-extra-brand.php?eid=%s&bid=%s">Delete brand</a><br>',
                    (string)$br,
                    $extra->getId(),
                    $br->getId()
                );
                
                $configurations = '';
                if ($br->getConfigurations()->getTotal() > 0) {
                    foreach ($br->getConfigurations() as $cnfg) {
                        $configurations .= sprintf(
                            '%s - %s <a href="remove-an-extra-brand-configuration.php?eid=%s&bid=%s&cid=%s">Delete</a><br>',    
                            (string) $cnfg,
                            (string) $cnfg->getVatband(),
                            $extra->getId(),
                            $br->getId(),
                            $cnfg->getId()
                        );
                    }
                } else {
                    $configurations .= sprintf(
                        ' <a href="add-a-new-extra-brand-configuration.php?eid=%s&bid=%s">Add configuration</a>',
                        $extra->getId(),
                        $br->getId()
                    );
                }
                
                $br->getPrices()->fetch();
                $pricings = implode('<br>', $br->getPrices()->getElements());
                
                echo sprintf(
                    '%s<br>%s</li>',
                    $configurations,
                    $pricings
                );
                
            }
            
            echo '</ol>';
        } else {
            echo sprintf(
                '<a href="add-a-new-extra-brand.php?eid=%s">Add brand</a>',
                $extra->getId()
            );
        }
        echo '</p>';
    }
} catch(Exception $e) {
    echo $e->getMessage();
    var_dump($history);
}