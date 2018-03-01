<?php

/**
 * @name Find applicable property special offers
 * 
 * Special offers are linked to a properties branding.  In this example we'll get 
the property primary branding and get the special offers for that property branding.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {
        $property = new \tabs\apiclient\Property($id);
        $property->get();
        echo implode("\n", $property->getPrimarypropertybranding()->getSpecialoffers()->map(function($sp) {
            return $sp->getDescription();
        }));
}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';