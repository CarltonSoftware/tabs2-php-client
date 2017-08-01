<?php

/**
 * This file documents how to add an enquiry to a customer.
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

    if ($id = filter_input(INPUT_GET, 'id')) {
        
        $customer = new tabs\apiclient\Customer($id);
        $customer->get();
        $marketingBrands = \tabs\apiclient\Collection::factory(
            'marketingbrand',
            new \tabs\apiclient\MarketingBrand()
        );
        $marketingBrands->fetch();
        
        $enq = new tabs\apiclient\actor\Enquiry();
        $enq->setAdults(2)
            ->setChildren(1)
            ->setInfants(1);
        $enq->setMarketingbrand($marketingBrands->first());
        $customer->getEnquiries()->addElement($enq);
        $enq->create();
        
        // Add dates
        $dates = new tabs\apiclient\actor\enquiry\Dates();
        $from = new \DateTime('+2 weeks');
        $to = clone $from;
        $to->add(new \DateInterval('P7D'));
        $dates->setFromdate($from)
            ->setTodate($to);
        $enq->getDates()->addElement($dates);
        $dates->create();
        
        // Add property
        $enqProperty = new tabs\apiclient\actor\enquiry\Property();
        $property = new \tabs\apiclient\Property(1);
        $enqProperty->setProperty($property);
        $enq->getProperties()->addElement($enqProperty);
        $enqProperty->create();
        
        header('Location: index.php?id=' . $customer->getId());
        
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}