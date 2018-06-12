<?php

/**
 * @name Recording a customer enquiry
 * 
 * Sometimes you may wish to record if a customer enquires about a property or certain dates. This example demonstrates how to log this.
 */

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
        ->setInfants(1)
        ->setPets(0);
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

    // Add property with id of 1
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

require_once __DIR__ . '/../finally.php';