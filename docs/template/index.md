# Tabs2 templates
Tabs2 has a templating system which you can use to send emails or generate pdfs which include booking/customer data. 

The templating system uses twig and you can see what fields are available to use with the Template::getFields method.

Each template governs what the data can be accesses (via its type), who the recipient can be (via the template target source).

Templates are generated from contact methods listed below.

This example will list what templates are available in the system.

```php

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


```

* [Using a template](contactmethod.html)