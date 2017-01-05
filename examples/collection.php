<?php

if (!empty($collection)) {
    echo '<h4>' . $collection->getTotal() . ' ' . $collection->getElementClass()->getClass() . ' found</h4>';

    $pager = $collection->getPagination();

    echo '<ul>';
    foreach ($collection as $element) {
        $text = (string) $element;
        $classes = array(
            str_replace('\\', '_', $element->getFullClass()) . '-' . $element->getId()
        );
        
        if (in_array($element->getClass(), array('Property', 'Booking'))) {
            echo sprintf(
                '<li><a href="/platoclient/%s/?id=%s">%s</a></li>',
                strtolower($element->getClass()),
                $element->getId(),
                stristr($text, '<title>') ? htmlentities($text) : $text
            );
        } else if ($element instanceof tabs\apiclient\Actor) {
            echo sprintf(
                '<li><a href="/platoclient/actor/?id=%s">%s</a></li>',
                $element->getId(),
                stristr($text, '<title>') ? htmlentities($text) : $text
            );
        } else {
            echo sprintf(
                '<li><a href="/platoclient/exploreelement/%s">%s</a></li>',
                implode('/', $classes),
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