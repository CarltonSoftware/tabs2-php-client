<?php

/**
 * @name Tabs2 templates
 * 
 * Tabs2 has a templating system which you can use to send emails or generate pdfs which include booking/customer data. 
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {

    $tmpl = new \tabs\apiclient\Template($id);
    $tmpl->get();

    echo '<h3>' . $tmpl->getTemplatename() . ' template.</h3>';
    echo sprintf(
        '<p>This template can send %s information to %ss.</p>',
        $tmpl->getTemplatetargetsource()->getTemplatesource()->getTemplatesource(),
        $tmpl->getTemplatetargetsource()->getTemplatetarget()->getTemplatetarget()
    );

    // Get what fields are available
    $tmpl->getFields();

    // Get the contact methods
    if ($tmpl->getContactmethods()->count() > 0) {
        echo '<h4>' . $tmpl->getContactmethods()->count() . ' contact methods found.</h4>';
        foreach ($tmpl->getContactmethods() as $tmplcm) {
            echo sprintf(
                '<p><a href="contactmethod.php?id=%s&tid=%s">%s</a></p>',
                $tmplcm->getId(),
                $tmplcm->getParent()->getId(),
                $tmplcm->getContactmethodtype()->getMethod()
            );
        }
    }

} else {
    $collection = tabs\apiclient\Collection::factory(
        'template',
        new \tabs\apiclient\Template
    );
    $collection->setLimit(filter_input(INPUT_GET, 'limit'))
        ->setPage(filter_input(INPUT_GET, 'page'))
        ->fetch();

    include __DIR__ . '/../collection.php';
}
} catch (Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';