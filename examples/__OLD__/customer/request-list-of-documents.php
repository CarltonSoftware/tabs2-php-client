<?php


// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

try {
    echo '<h4>All Documents</h4>';
    $docs = new \tabs\apiclient\collection\core\Document();

    $docs->fetch();

    foreach ($docs as $doc) {
        echo sprintf(
            '<p><a href="viewing-a-document.php?id=%s">%s</a></p>',
            $doc->getId(),
            (string) $doc
        );
    }

} catch(Exception $e) {
    echo $e->getMessage();
    var_dump($history);
}