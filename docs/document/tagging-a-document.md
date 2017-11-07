# Tagging a document

In this example, we will create a tag and add it to the supplied document.

```php

try {

    if ($id = filter_input(INPUT_GET, 'id')) {

        $tags = \tabs\apiclient\Collection::factory(new \tabs\apiclient\DocumentTag());
        $tags->fetch();

        $filteredTags = $tags->findBy(function($ele) {
            return $ele->getTag() === 'Example Tag';
        });

        if ($filteredTags->count() === 0) {
            $tag = new tabs\apiclient\DocumentTag();
            $tag->setTag('Example Tag')->create();
        } else {
            $tag = $filteredTags->first();
        }

        $document = new \tabs\apiclient\Document($id);
        $document->get();

        $dt = new \tabs\apiclient\document\Tag();
        $dt->setDocumenttag($tag);
        $document->getTags()->addElement($dt);
        $dt->create();

        $document->get();

        echo $document->getTags()->count();
        
    }
        
} catch(Exception $e) {
    echo $e->getMessage();
}

```
