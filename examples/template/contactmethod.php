<?php

/**
 * @name Using templates
 * 
 * Each template has multiple contact methods associated with them. 
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    if ($id = filter_input(INPUT_GET, 'id')) {

        $tmpl = new \tabs\apiclient\Template(filter_input(INPUT_GET, 'tid'));
        $tmplcm = new \tabs\apiclient\template\ContactMethod($id);
        $tmplcm->setParent($tmpl);
        $tmplcm->get();

        echo '<h3>' . $tmplcm->getContactmethodtype()->getMethod() . ' contact method</h3>';

        if ($tmplcm->getElements()->count() > 0) {
            echo '<h4>' . $tmplcm->getElements()->count() . ' elements found</h4>';
        }

        if ($tmplcm->getParent()->get()->getTemplatetargetsource()->getTemplatetarget()->getTemplatetarget() == 'Customer') {

            // Get most recent confirmed customer booking
            $collection = tabs\apiclient\Collection::factory(
                'booking',
                new \tabs\apiclient\Booking
            )->addFilter(
                'confirmedbooking',
                true
            )->addFilter(
                'cancelledbooking',
                false
            )->addFilter(
                'transferredbooking',
                false
            )->addFilter(
                'type',
                'Customer'
            )->setLimit(1);
            $collection->getPagination()->addParameter('orderBy', 'id_desc');
            $collection->fetch();

            if ($collection->count() === 1) {
                echo '<h4>Template output</h4>';
                echo implode('', $tmplcm->html($collection->first()->getId())['elementArray']);
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';