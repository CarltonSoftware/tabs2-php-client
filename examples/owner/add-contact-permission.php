<?php

/**
 * @name Add contact detail permission to an owner
 *
 * This file documents how to add a contact detail permission record to an owner.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $owner = new tabs\apiclient\Owner($id);
        $owner->get();

        echo '<h3>Owner</h3>';
        echo sprintf('<p>%s</p>', htmlspecialchars((string) $owner));

        // grab contact details and filter to find emails
        $contactDetails = $owner->getContactdetails()->filter(function($cd) {
            return $cd->getType() == 'C' && $cd->getContactmethodtype() == 'Email';
        });

        // create new contact detail permission
        $me = tabs\apiclient\client\Client::getClient()->whoami();

        $permission = new \tabs\apiclient\actor\Permission();
        $permission->setParent($owner);
        $permission->setContactdetail($contactDetails->first());
        $permission->setMarketingbrand(new \tabs\apiclient\Marketingbrand(6));
        $permission->setGrantedbyactor($me);
        $permission->create();

        echo sprintf(
            '<p>Contact detail permission added for %s</p>',
            $contactDetails->first()->getValue()
        );
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';