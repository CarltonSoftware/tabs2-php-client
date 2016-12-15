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
    $extras = new \tabs\apiclient\collection\core\extra\Extra();
    $extras->fetch();
    
    foreach ($extras as $extra) {
        if ($extra->getId() == $eid) {
            foreach ($extra->getBrandings() as $br) {
                if ($br->getId() == $bid) {
    
                    $currencies = new \tabs\apiclient\collection\core\Currency();
                    $currencies = $currencies->fetch()->getElements();
                    $currency = array_shift($currencies);
                    
                    $price = new tabs\apiclient\core\extra\UnitPrice();
                    $price->setCurrency($currency)
                        ->setFromdate(new \DateTime())
                        ->setTodate(new \DateTime('2029-12-31'))
                        ->setUnitprice(10)
                        ->setParent($br);
                    
                    //$price->create();
                    
                    
                    
                    $price2 = new tabs\apiclient\core\extra\DailyPrice();
                    $price2->setCurrency($currency)
                        ->setFromdate(new \DateTime())
                        ->setTodate(new \DateTime('2018-12-31'))
                        ->setParent($br);
        
                    for ($i = 1; $i <= 7; $i++) {
                        $dpu = new \tabs\apiclient\core\extra\DailyPriceUnit();
                        $dpu->setDays($i)
                            ->setAdditional(false)
                            ->setPrice(10 + $i);
                        $price2->addDailyprice($dpu);
                    }
                    
                    var_dump($price2->toArray());
                    
                    $price2->create();
                    
                    echo 'Created!';
                }
            }
        }
    }
}