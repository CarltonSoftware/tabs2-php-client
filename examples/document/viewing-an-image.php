<?php

/**
 * @name Viewing a image
 * 
 * In this example, we will view an image with the provided image id.
 */

require_once __DIR__ . '/../creating-a-new-connection.php';

try {
if ($id = filter_input(INPUT_GET, 'id')) {

    $image = new \tabs\apiclient\Image($id);
    $image->get();

    if (filter_input(INPUT_GET, 'raw') == 'true') {
        header('Content-Type: ' . $image->getMimetype()->getName());
        echo $image->getFiledata();
        die();
    }


    echo '<p>Filename: ' . $image->getFilename() . '</p>';
    echo '<p>Name: ' . $image->getName() . '</p>';
    echo '<p>Description: ' . $image->getDescription() . '</p>';
    echo '<p>Alt: ' . $image->getAlt() . '</p>';
    echo '<p>Height: ' . $image->getHeight() . '</p>';
    echo '<p>Width: ' . $image->getWidth() . '</p>';
    echo '<p>Weight: ' . $image->getWeight() . '</p>';
    echo '<p>Private: ' . ($image->getPrivate() ? 'Yes' : 'No') . '</p>';
    echo '<p>Mimetype: ' . $image->getMimetype()->getName() . '</p>';
    echo '<p>Images direct from api: </p>';
    echo '<p><img src="' . $image->getFullPublicImageUrl() . '"></p>';
    echo '<p><img src="' . $image->getFullPublicImageUrl('width', 400, 200) . '"></p>';
    echo '<p><img src="' . $image->getFullPublicImageUrl('height', 400, 200) . '"></p>';
    echo '<p><img src="' . $image->getFullPublicImageUrl('original') . '"></p>';

}
} catch(Exception $e) {
    echo $e->getMessage();
}

require_once __DIR__ . '/../finally.php';