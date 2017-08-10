# Viewing a document

In this example, we will view a document with the provided document id.

```php

try {

    if ($id = filter_input(INPUT_GET, 'id')) {
        
        $document = new \tabs\apiclient\Document($id);
        header('Content-Type: ' . $document->get()->getMimetype()->getName());
        echo $document->getFiledata();
        
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}

```
