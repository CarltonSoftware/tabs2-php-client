<?php

/**
 * @name Requesting a brochure
 * 
 * This example demonstrates how to log a contact to a customer
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {

    // Get a customer.  We'll need the customers email address to send the
    // Contact too.
    $customer = new \tabs\apiclient\Customer($id);
    $customer->get();

    // In order to send the contact we'll need a ContactDetail from.
    // In this example we'll use the WhoAmi method to get the tabsuser
    // in the active connection.
    $me = \tabs\apiclient\client\Client::getClient()->whoami();
    $email = $me->getContactdetails()->findBy(function($cd) {
        return $cd instanceof \tabs\apiclient\actor\ContactDetailOther
            && $cd->getContactmethodtype() === 'Email';
    })->first();

    // We need to get the ContactType and ContactMethodType entities in
    // order to send a contact so in this example we'll get the collections
    // and choose the first one ContactType and Email in ContactMethodType
    $contactTypes = \tabs\apiclient\Collection::factory(
        new \tabs\apiclient\ContactType()
    );
    $contactTypes->fetch();

    $contactMethodTypes = \tabs\apiclient\Collection::factory(
        new \tabs\apiclient\ContactMethodType()
    );
    $contactMethodTypes->fetch();


    // Create a new contact entity and set the properties for the contact
    $contact = new \tabs\apiclient\Contact();
    $contact->setSender(
        $email
    )->setContent(
        'This is a test contact entry.  Any text can go here.  HTML is allowed too.'
    )->setSubject(
        'Hello from TABS'
    )->setContacttype(
        $contactTypes->first()
    )->setContactmethodtype(
        $contactMethodTypes->findBy(function($ele) {
            return $ele->getMethod() === 'Email';
        })->first()
    );

    $contact->create();

    // Create the 'from' contact entity
    $from = new \tabs\apiclient\contact\Entity();
    $from->setParent($contact);
    $from->setEntity($me->getId())
        ->setContactentitytype($me->getClass())
        ->setFunction('from')
        ->setContactdetail($email);
    $from->create();

    // Create the recipient contacts
    foreach ($customer->getContactdetails() as $cd) {
        if ($cd instanceof tabs\apiclient\actor\ContactDetailOther
            && $cd->getContactmethodtype() === 'Email'
        ) {
            $contactEntity = new \tabs\apiclient\contact\Entity();
            $contactEntity->setParent($contact);
            $contactEntity->setEntity($customer->getId())
                ->setContactentitytype('Customer')
                ->setFunction('to')
                ->setContactdetail($cd)
                ->setPerformsend(false) // Setting this to true will also email 
                                        // the contact to the recipient email 
                                        // addresses.
                ->create();
        }
    }

    header('Location: index.php?id=' . $customer->getId());
    exit();

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';