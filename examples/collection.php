<?php

if (!function_exists('getParentLink')) {
    function getParentLink($object, &$links = array())
    {
        if ($object->getParent()) {
            getParentLink($object->getParent(), $links);
        }
        
        $links[] = $object->getClass();
        $links[] = $object->getId();

        return $links;
    }
}

if (!empty($collection)) {
    echo '<h4>' . $collection->getTotal() . ' ' . $collection->getElementClass()->getClass() . ' found</h4>';

    $pager = $collection->getPagination();

    echo '<ul>';
    foreach ($collection as $element) {
        $text = (string) $element;
        $classes = array(
            str_replace('\\', '_', $element->getFullClass()) . '-' . $element->getId()
        );
        
        if (in_array($element->getClass(), array('Property', 'Template'))) {
            echo sprintf(
                '<li><a href="?id=%s">%s</a></li>',
                $element->getId(),
                stristr($text, '<title>') ? htmlentities($text) : $text
            );
        } else if ($element instanceof tabs\apiclient\Actor) {
            echo sprintf(
                '<li><a href="?id=%s">%s</a></li>',
                $element->getId(),
                stristr($text, '<title>') ? htmlentities($text) : $text
            );
        } else if ($element instanceof tabs\apiclient\SpecialOffer) {
            echo sprintf(
                '<li><a href="specialoffer/viewing-special-offer-data.php?id=%s">%s</a></li>',
                $element->getId(),
                $element->getDescription()
            );
        } else if ($element instanceof tabs\apiclient\Booking) {
            echo sprintf(
                '<li><a href="?id=%s">%s</a></li>',
                $element->getId(),
                $text
            );
        } else if ($element instanceof tabs\apiclient\actor\Document 
            || ($element instanceof tabs\apiclient\property\Document && !$element->getDocument() instanceof \tabs\apiclient\Image)
            || $element instanceof tabs\apiclient\booking\Document
        ) {
            echo sprintf(
                '<li><a href="../document/viewing-a-document.php?id=%s">%s</a><a href="../document/tagging-a-document.php?id=%s">Tag this document</a></li>',
                $element->getDocument()->getId(),
                $element->getDocument()->getName(),
                $element->getDocument()->getId() 
            );
        }else if ($element instanceof tabs\apiclient\property\Document 
            && $element->getDocument() instanceof \tabs\apiclient\Image
        ) {
            echo sprintf(
                '<li><a href="../document/viewing-an-image.php?id=%s">%s</a></li>',
                $element->getDocument()->getId(),
                (string) $element->getDocument()
            );
        } else {
            echo sprintf(
                '<li><a href="exploreelement/%s?map=%s">%s</a></li>',
                implode('/', $classes),
                implode(':', getParentLink($element)),
                stristr($text, '<title>') ? htmlentities($text) : $text
            );
        }
    }
    echo '</ul>';
    
    if ($pager->getMaxPages() > 1) {
        echo sprintf(
            '<p><a href="?page=%s&limit=%s"2>&larr; Previous</a>',
            $pager->getPrevPage(),
            $pager->getLimit()
        );

        echo ' &nbsp; | &nbsp; ';

        echo sprintf(
            '<a href="?page=%s&limit=%s">Next &rarr;</a></p>',
            $pager->getNextPage(),
            $pager->getLimit()
        );
    }
}