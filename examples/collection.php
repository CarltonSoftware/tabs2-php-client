<?php

if (!function_exists('getParentLink')) {
    function getParentLink($object, &$links = array())
    {
        if ($object->getParent()) {
            getParentLink($object->getParent(), $links);
        }

        $links[] = $object->getFullClass() . '-' . $object->getId();

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
        } elseif ($element instanceof tabs\apiclient\Actor) {
            echo sprintf(
                '<li><a href="?id=%s">%s</a></li>',
                $element->getId(),
                stristr($text, '<title>') ? htmlentities($text) : $text
            );
        } elseif ($element instanceof tabs\apiclient\Booking) {
            echo sprintf(
                '<li><a href="%s?id=%s">%s</a></li>',
                getBaseUrl() . '/../../booking/index.php',
                $element->getId(),
                $text
            );
        } elseif ($element instanceof tabs\apiclient\SpecialOffer) {
            echo sprintf(
                '<li><a href="specialoffer/viewing-special-offer-data.php?id=%s">%s</a></li>',
                $element->getId(),
                $element->getDescription()
            );
        } elseif ($element instanceof tabs\apiclient\Booking) {
            echo sprintf(
                '<li><a href="?id=%s">%s</a></li>',
                $element->getId(),
                $text
            );
        } elseif ($element instanceof tabs\apiclient\actor\Document
            || ($element instanceof tabs\apiclient\property\Document && !$element->getDocument() instanceof \tabs\apiclient\Image)
            || $element instanceof tabs\apiclient\booking\Document
        ) {
            echo sprintf(
                '<li><a href="../document/viewing-a-document.php?id=%s">%s</a><a href="../document/tagging-a-document.php?id=%s">Tag this document</a></li>',
                $element->getDocument()->getId(),
                $element->getDocument()->getName(),
                $element->getDocument()->getId()
            );
        } elseif ($element instanceof tabs\apiclient\property\Document
            && $element->getDocument() instanceof \tabs\apiclient\Image
        ) {
            echo sprintf(
                '<li><a href="../document/viewing-an-image.php?id=%s">%s</a></li>',
                $element->getDocument()->getId(),
                (string) $element->getDocument()
            );
        } elseif ($element instanceof tabs\apiclient\EventType) {
            echo sprintf(
                '<li>%s - %s</li>',
                $element->getId(),
                $element->getEventtype()
            );
        } elseif ($element instanceof tabs\apiclient\EventLog) {
            echo sprintf(
                '<li>%s - %s</li>',
                $element->getType(),
                $element->getEventtype()->eventtype
            );
        } elseif ($element instanceof tabs\apiclient\property\ParkingPermit) {
            echo sprintf(
                '<li>%s - %s<br>%s</li>',
                $element->getLocation(),
                $element->getLocationofpermit(),
                implode('<br>', $element->getHolidayperiods()->map(function ($h) {
                    return sprintf(
                        '%s-%s (%d)',
                        $h->fromdate->format('Y-m-d'),
                        $h->todate->format('Y-m-d'),
                        $h->samedateseveryyear
                    );
                }))
            );
        } elseif ($element instanceof tabs\apiclient\property\Room) {
            echo sprintf(
                '<li>%s - %s<br />%s</li>',
                $element->getName(),
                $element->getDescription(),
                implode('<br>', $element->getRoomtypes()->map(function($r)use($element) {
                    return sprintf(
                        '%s%s (Sleeps: %d) - %s%s',
                        $r->getRoomtype()->getId() == $element->getRoomtype()->getId() ? '<strong>' : '',
                        $r->getRoomtype()->getName(),
                        $r->getRoomtype()->getSleeps(),
                        $r->getRoomtype()->getDescription(),
                        $r->getRoomtype()->getId() == $element->getRoomtype()->getId() ? '</strong>' : ''
                    );
                }))
            );
        } elseif ($element instanceof tabs\apiclient\booking\Vehicle) {
            echo sprintf(
                '<li>%s: %s %s %s</li>',
                $element->getVehicle()->getRegistration(),
                $element->getVehicle()->getColour(),
                $element->getVehicle()->getMake(),
                $element->getVehicle()->getModel()
            );
        } elseif ($element instanceof tabs\apiclient\booking\Room) {
            echo sprintf(
                '<li>%s<br />%s (Sleeps: %d)</li>',
                $element->getRoom()->getName(),
                $element->getRoomType()->getName(),
                $element->getRoomType()->getSleeps()
            );
        } elseif ($element instanceof tabs\apiclient\actor\Permission) {
            echo sprintf(
                '<li>%s - %s<br />%s - %s</li>',
                $element->getMarketingbrand()->getName(),
                $element->getContactdetail()->getValue(),
                $element->getGranted() ? 'GRANTED' : 'NOT GRANTED',
                $element->getGranteddatetime()->format('Y-m-d')
            );
        } else {
            echo sprintf(
                '<li><a href="../exploreelement/?q=%s">%s</a></li>',
                implode(':', getParentLink($element)),
                stristr($text, '<title>') ? htmlentities($text) : $text
            );
        }
    }
    echo '</ul>';

    if ($pager->getMaxPages() > 1) {
        $params = filter_input_array(INPUT_GET);
        $params['page'] = $pager->getPrevPage();
        $params['limit'] = $pager->getLimit();
        echo sprintf(
            '<p><a href="?%s">&larr; Previous</a>',
            http_build_query($params)
        );

        echo ' &nbsp; | &nbsp; ';

        $params['page'] = $pager->getNextPage();
        echo sprintf(
            '<a href="?%s">Next &rarr;</a></p>',
            http_build_query($params)
        );
    }
}
