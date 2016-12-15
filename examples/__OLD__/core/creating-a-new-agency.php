<?php
/**
 * This file documents how to create an Agency object from the Plato API.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {

    if ($agencyName = filter_input(INPUT_POST, 'name')) {

        $agency = new \tabs\apiclient\actor\Agency();

        $agency->setCompanyname($agencyName)
            ->create();

        var_dump($agency);

        echo 'Successfully added agency, probably (<a href="../core/requesting-list-of-agencies.php">go and check</a>)';

    // } else {
        // echo 'No'
    }

} catch(Exception $e) {
    echo $e->getMessage();
}