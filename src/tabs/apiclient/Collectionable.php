<?php

namespace tabs\apiclient;

/**
 * Interface to say if an element is collectionable or not.
 *
 * PHP Version 5.5
 *
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */
interface Collectionable {
    public function getCreateUrl();
}