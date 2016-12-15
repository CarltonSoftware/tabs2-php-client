<?php

if (!empty($collection)) {
    echo '<h4>' . $collection->getTotal() . ' ' . $collection->getElementClass()->getClass() . ' found</h4>';

    $pager = $collection->getPagination();

    echo '<ul>';
    foreach ($collection as $element) {
        echo sprintf(
            '<li><a href="?id=%s">%s</a></li>',
            $element->getId(),
            (string) $element
        );
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