# Adding an image to a property
In this example we're going to add an image to a property.

```php

try {

    if ($id = filter_input(INPUT_GET, 'id')) {

        $property = new \tabs\apiclient\Property($id);

        $propertyDoc = new \tabs\apiclient\property\Document();
        $property->getDocuments()->addElement($propertyDoc);
        $document = new \tabs\apiclient\Image();
        $document->setAlt('A property image')
            ->setDescription('This is a property image')
            ->setWeight(1)
            ->setPrivate(false)
            ->setFileLocation(dirname(__FILE__) . '/castle.jpg');

        $document->create();

        $propertyDoc->setDocument($document);
        $propertyDoc->create();

        header('Location: index.php?id=' . $property->getId());

    }
} catch(Exception $e) {
    echo $e->getMessage();
}

```
