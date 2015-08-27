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

$brochure = new \tabs\apiclient\core\Brochure();
$brochure->setName('Test')
    ->setYear(date('Y'))
    ->setOrderfromdate(new \DateTime())
    ->setOrdertodate(new \Datetime())
    ->setAvailablefromdate(new \Datetime())
    ->setWeight(2)
    ->setCost(2.99);

$marketingBrands = new \tabs\apiclient\collection\brand\MarketingBrand();
$marketingBrands->fetch();
$aMb = $marketingBrands->current();

$brochure->setMarketingbrand($aMb);

try {
    $brochure->create();
    echo 'Brochure created!';
} catch (Exception $ex) {
    var_dump($ex->getErrors());
}